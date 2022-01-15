<?php

namespace App\Http\Controllers;

use App\Models\model_galleries;
use App\Models\User;
use App\Models\user_detail;
use App\Models\live_model;
use App\Models\comment;
use App\Models\model_videoshop;
use App\Models\view;
use App\Models\like;
use App\Models\token_transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use File;

class AccountModelController extends Controller
{
    public function getAccountDetails()
    {     
        $comments=[];
        $comment_user_names=[];
        if (!isset(Auth::user()->id)) {

            return view('includes.templates.error');
        } 
        
        elseif (isset(Auth::user()->id) && Auth::user()->user_role == 'model') {

            $image_path = [];
            $user_id = User::find(Auth::user()->id)->id;
            $model_id= $user_id;
            $AccountDetails = User::select('*')
                ->where('users.id', $user_id)
                ->join('user_details', 'user_details.user_id', 'users.id')
                ->get();

            $AccountModelGalleries = model_galleries::select('image_path','id')
                ->where('model_id', $user_id)
                ->get();
            
            $video_id = live_model::select('live_models.id')
                ->where('user_id', $user_id)
                ->where('active_status', 1)
                ->get();
            
            if (!isset($video_id[0])) {
                $video = '';
            }
            else {
                $video = $video_id[0]->id;
            }

            $commentData = comment::select('*')
                ->where('comments.model_id', $model_id)
                ->where('comments.live_video_id', $video)
                ->join('user_details', 'user_details.user_id', 'comments.user_id')
                ->get(); 
    
               
            $path = config('env_variables.upload_path') . 'Model_Gallery';

            for ($i = 0; $i < count($AccountModelGalleries); $i++) {
                $image_path[$i] = $path . '/' . $AccountModelGalleries[$i]->image_path . '&' .$AccountModelGalleries[$i]->id;
            }
            
            if (!isset($AccountDetails[0]) && empty($AccountDetails[0])) {
                $AccountDetails[0] = '';
            }

            $total_tokens = token_transaction::where('user_id', $user_id)->sum('tokens');

            return view('includes.templates.model.account-model', [
                'accountDetails' => $AccountDetails[0],
                'image_path' => $image_path,
                'commentData'=> $commentData,
                'total_tokens' => $total_tokens
            ]);
        }
    }

    public function addInVideoShop() {
        if (!isset(Auth::user()->id)) {
            return view('includes.templates.error');
        }
        else {
            
            $model_id = User::find(Auth::user()->id)->id;

            $countData_views = view::select('views.id')
                ->where('views.model_id', $model_id)
                ->where('video_type', 'video_shop')
                ->get();

            $countViewsData = count($countData_views);

            $countData_like = like::where('user_id', Auth::user()->id)
                ->where('likes.model_id', $model_id)
                ->where('video_type', 'video_shop')
                ->get();

            $countLikesData = count($countData_like);
            
            $model_videos = model_videoshop::select('model_videoshops.id', 'video_title', 'model_id', 'name', 'video_url')
                ->where('model_id', $model_id)
                ->join('users', 'users.id', 'model_id')
                ->get();

            $model_info = user_detail::select('user_id')
                ->where('user_details.user_id', $model_id)
                ->get();
           
            return view('includes.templates.pages.page-your-videoshop-1', [
                'model_videos' => $model_videos,
                'countViewsData'=>$countViewsData,
                'countLikesData'=> $countLikesData,
                'model_info'=>$model_info[0],

            ]);
        }
    }

    public function saveVideo(Request $request) {

        $token = substr(str_shuffle("0123456789"), 0, 8);
        $model_id = User::find(Auth::user()->id)->id;

        $fileNameToStore = '';
        $validation = Validator::make($request->all(), [
            'video_file' => 'required|mimes:mp4'
        ]);
        //max:900000 // 900mb
        if ($validation->validate()) {

            $path = public_path() . '/uploads/Model_VideoShop';
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }

            $extension = $request->file('video_file')->getClientOriginalExtension();
            $filename = 'Model_' . $model_id . '_' . $token;
            $fileNameToStore = $filename  . '.' . $extension;

            $request->file('video_file')->move(public_path('uploads/Model_VideoShop'), $fileNameToStore);

            $model_videoshop = new model_videoshop();
            $model_videoshop->model_id = $model_id;
            $model_videoshop->video_title = $request->title;
            $model_videoshop->video_url = 'Model_VideoShop/' . $fileNameToStore;
            $model_videoshop->video_category = $request->category;
            $model_videoshop->price_tier = $request->price;
            $model_videoshop->video_quality = $request->video_quality;
            $model_videoshop->video_description = $request->description;
            $model_videoshop->save();
        }
        
        else {
            return response()->json([
            'message' => $validation->errors()->all(),
            ]);
        }

        return response()->json(['success' => 'yes']);
    }

    public function deleteVideo(Request $request) {

        $deleted_id = model_videoshop::where([
            'id' => $request->video_id,
            'model_id' => $request->model_id
            ])
        ->delete();

        File::delete(public_path() . $request->video_path);

        return response()->json(['success' => 'yes']);
    }
}
