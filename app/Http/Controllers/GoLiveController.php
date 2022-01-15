<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\live_model;
use App\Models\User;
use Validator;
use File;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class GoLiveController extends Controller
{
    // public function liveVideoStatus(Request $request) {
    //     if (isset(Auth::user()->id)) {
    //         $user_id = User::find(Auth::user()->id)->id;

    //         $exist = live_model::where('user_id', $user_id)->exists();

    //         if ($exist) {
    //             $live_model = live_model::where('user_id', $user_id)
    //                 ->update([
    //                     'active_status' => $request->status,
    //                     'meeting_url' => $request->meeting_url
    //                 ]);
    //         }
    //         else {
    //             $live_model = new live_model();
    //             $live_model->user_id = $user_id;
    //             $live_model->active_status = $request->status;
    //             $live_model->meeting_url = $request->meeting_url;
    //             $live_model->save();
    //         }

    //         return response()->json(['success' => 'yes']); 
    //     }
    //     else {
    //         return response()->json(['success' => 'no']); 
    //     }
    // }
    public function liveVideoStatus(Request $request) {
       
            $user_id = $request->user_id;
            $cover_img_url = '';

            $exist = live_model::where('user_id', $user_id)->exists();
            $cover_img_url = $this->saveLiveVideoCoverScreenshot($request);

            // if ($exist) {
                
            //     $live_model = live_model::where('user_id', $user_id)
            //         ->update([
            //             'active_status' => $request->status,
            //             'meeting_url' => $request->meeting_url,
            //             'cover_img_url' => $cover_img_url,
            //             'start_show_time' => Carbon::now()
            //         ]);
               
            // }
            // else {
            
                $cover_img_url = $this->saveLiveVideoCoverScreenshot($request);
                $live_model = new live_model();
                $live_model->user_id = $user_id;
                $live_model->active_status = $request->status;
                $live_model->meeting_url = $request->meeting_url;
                $live_model->cover_img_url = $cover_img_url;
                $live_model->start_show_time = Carbon::now();
                $live_model->save();
                
                
                 $request->session()->put('live_stream_id', $live_model->id);
                // $request->session()->put('live_video_id', $live_model->id);
            // }

            return response()->json(['success' => 'yes']); 
    
    }
 public function saveLiveVideoCoverScreenshot(Request $request)
   {

    $token = substr(str_shuffle("0123456789"), 0, 7);
    $fileNameToStore = 'cover_img_'.$token;

    $cover_img = $request->cover_img;
    $cover_img = str_replace('data:image/png;base64,', '', $cover_img);
    $cover_img = str_replace(' ', '+', $cover_img);
    $data = base64_decode($cover_img);

    $path = public_path() . '/uploads/Live_Video_Screenshots';
        if (!File::exists($path)) {
            File::makeDirectory($path, $mode = 0777, true, true);
        }
    $extension = 'png';
    $fileNameToStore = $fileNameToStore . '_' . $request->user_id. '.' . $extension;
    $success = file_put_contents(public_path('uploads/Live_Video_Screenshots/'.$fileNameToStore), $data);
    
    // $token = substr(str_shuffle("0123456789"), 0, 4);

    // $fileNameToStore = '';
    // $validation = Validator::make($request->all(), [
    //     'document_file' => 'required|mimes:png,jpg,jpeg|max:5000'
    // ]);
    // if ($validation->passes()) {

    //     $path = public_path() . '/uploads/Live_Video_Screenshots';
    //     if (!File::exists($path)) {
    //         File::makeDirectory($path, $mode = 0777, true, true);
    //     }

    //     $extension = $request->file('cover_img')->getClientOriginalExtension();
    //     $filename = str_replace(" ","_", $token);
    //     $fileNameToStore = $filename . '_' . $request->user_id. '.' . $extension;

    //     $request->file('cover_img')->move(public_path('uploads/Live_Video_Screenshots'), $fileNameToStore);
    // }
    
    // else {
    //     return response()->json([
    //     'message'   => $validation->errors()->all(),
    //     ]);
    // }
    return $fileNameToStore;
   }
   
   public function updatemodeltime(Request $request)
   {
       if($request->status == 'yes')
        {
            
             $user_id = User::find(Auth::user()->id)->id;
             $live_model = live_model::where('user_id', $user_id)
                    ->update([
                        // 'active_status' => 0,
                      'updated_at' => Carbon::now(),
                    ]);
                    return response()->json(['success' => 'yes']); 
        //     if (isset(Auth::user()->id)) {
        //     $user_id = User::find(Auth::user()->id)->id;

        //     $exist = live_model::where('user_id', $user_id)->exists();

        //     if ($exist) {
        //         $live_model = live_model::where('user_id', $user_id)
        //             ->update([
        //               'updated_at' => $datetime->format('Y-m-d H:i:s'),
        //             ]);
        //             return response()->json(['success' => 'yes']); 
        //     }

            
        //   }
        }
   }
    public function endLiveVideo(Request $request)
    {
        //dd($request->status);
        
        
        if (isset(Auth::user()->id)) {
            $user_id = User::find(Auth::user()->id)->id;

            $exist = live_model::where('user_id', $user_id)->exists();

            if ($exist) {
                $live_model = live_model::where('user_id', $user_id)
                    ->update([
                        'active_status' => 0,
                        'meeting_url' => NULL
                    ]);
              $get_live_video_id = $request->session()->get('live_video_id'); 
              //dd($get_live_video_id);
              
            //   DB::table('likes')->where('model_id', $user_id)
            // ->where('video_type','live')
            // ->delete();
            
            //  DB::table('views')->where('model_id', $user_id)
            // ->where('video_type','live')
            // ->delete();
            
                    return response()->json(['success' => 'yes']); 
            }

            
        }
        else {
            return response()->json(['success' => 'no']); 
        }
        
    }
    public function checkModelAlreadyInShow(Request $request)
    {
        //dd($request->model_id);
      $exist = live_model::where('user_id', $request->model_id)
       ->where('active_status', '1')
      ->exists(); 
         if ($exist) {
           $live_model = live_model::where('user_id', $request->model_id)
                    ->where('active_status', '1')
                    ->update([
                        'active_status' => 0,
                        'meeting_url' => NULL
                    ]);
         }
      return response()->json(['success' => 'yes']);   
    }
}
