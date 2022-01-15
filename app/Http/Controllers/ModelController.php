<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\user_detail;
use App\Models\model_document;
use Illuminate\Support\Facades\Hash;
use Session;
use Validator;
use File;
use Mail;
class ModelController extends Controller
{

    public function showModelPage1()
    {
        return view('includes.templates.model.be-a-model-1');
    }

    public function showModelPage2()
    {
        if (Session::has('user')) {
            Session::flush('user');
        }
        if (Session::has('user_detail')) {
            Session::flush('user_detail');
        }
        if (Session::has('page')) {
            Session::flush('page');
        }
        return view('includes.templates.model.be-a-model-2');
    }

    public function saveData2(Request $request)
    {
        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->user_role = "model";
        $request->session()->put('user', $user);

        return response()->json(['success' => 'yes']);
    }

    public function showModelPage3(Request $request)
    {
        if (Session::has('user')) {
            return view('includes.templates.model.be-a-model-3');
        }
        else {
            return view('includes.templates.model.be-a-model-1');
        }
    }

    public function saveData3_1(Request $request)
    {

        if (Session::has('user')) {
            $user = $request->session()->get('user');
            $user->name = $request->name;

            $user_detail = new user_detail();
            $user_detail->camera_man_name = $request->camera_name;
            $user_detail->birthday = $request->birthday;
            $user_detail->gender = $request->gender;
            $user_detail->country = $request->country;
            $user_detail->nationality = $request->nationality;
            $user_detail->ethnicy = $request->ethnicy;

            $request->session()->put('user_detail', $user_detail);
            $request->session()->put('page', '3_1');

            return response()->json(['success' => 'yes']);
        }
    }

    public function showModelPage3_2()
    {
        if (Session::has('user_detail')) {
            if (Session::has('page')) {
                $page = Session::get('page');
                if ($page == '3_1') {
                    return view('includes.templates.model.be-a-model-3-2');
                }
            }
        }
        else {
            if (Session::has('user')) {
                return view('includes.templates.model.be-a-model-3');
            }
            else {
                return view('includes.templates.model.be-a-model-1');
            }
        }
    }

    public function saveData3_2(Request $request)
    {

        if (Session::has('user')) {
            $detail = $request->session()->get('user_detail');

            $detail->eye_color = $request->eyeColor;
            $detail->hair_color = $request->hairColor;
            $detail->hair_length = $request->hairLength;
            $detail->figure = $request->figure;
            $detail->sexual_preference = $request->sexualPreference;
            $detail->chest_size = $request->chestSize;

            $request->session()->put('user_detail', $detail);
            $request->session()->put('page', '3_2');

            return response()->json(['success' => 'yes']);
        }
    }

    public function showModelPage4()
    { 

        if (Session::has('user_detail')) {
            if (Session::has('page')) {
                $page = Session::get('page');
                if ($page == '3_2') {
                    return view('includes.templates.model.be-a-model-4');
                }
                elseif ($page == '3_1') {
                    return view('includes.templates.model.be-a-model-3-2');
                }
            }
        }
        else {
            if (Session::has('user')) {
                return view('includes.templates.model.be-a-model-3');
            }
            else {
                return view('includes.templates.model.be-a-model-1');
            }
        }
    }

    public function saveData4(Request $request)
    {
        $token = substr(str_shuffle("0123456789"), 0, 4);

        $fileNameToStore = '';
        $validation = Validator::make($request->all(), [
            'document_file' => 'required|mimes:pdf,docx,jpeg,jpg|max:5000'
        ]);
        if ($validation->passes()) {
            
            
            
            $user = $request->session()->get('user');
            $user->save();
    
            $detail = $request->session()->get('user_detail');
            $detail->user_id = $user->id;
    
            $username = explode(' ', $user->name);
            $detail->user_name = $username[0] . $token;
            $detail->save();
    
            $model_document = new model_document();
            $model_document->model_id = $user->id;
            $model_document->type_of_document = $request->type_of_document;
            $model_document->id_number = $request->id_number;
            $model_document->expiry_date = $request->expiry_date;

            $path = public_path() . '/uploads/Model_Documents';
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }

            $extension = $request->file('document_file')->getClientOriginalExtension();
            $filename = str_replace(" ","_", $user->name);
            $fileNameToStore = $filename . '_' . $user->id . '.' . $extension;

            $request->file('document_file')->move(public_path('uploads/Model_Documents'), $fileNameToStore);
        }
        
        else {
            return response()->json([
            'message'   => $validation->errors()->all(),
            ]);
        }
        
        $model_document->file_url = $fileNameToStore;
        $model_document->save();

        $request->session()->put('page', '4');
        //send mail
        
       $data=['name'=>$user->name,'data'=>'Welcome to unlock your fanticies'];
       $user['to']=$user->email;
       Mail::send('includes.templates.mail.signup',$data,function($messages) use ($user){
          
          $messages->to($user['to']);
           $messages->subject('Support');
      });
        return response()->json(['success' => 'yes']);
    }

    public function showModelPage5()
    {
        if (Session::has('user_detail') && Session::has('user')) {
            if (Session::has('page')) {
                $page = Session::get('page');
                if ($page == '4') {
                    Session::flush('user');
                    Session::flush('user_detail');
                    Session::flush('page');
                    return view('includes.templates.model.be-a-model-5');
                }
            }
        }
        else {
            return view('includes.templates.model.be-a-model-1');
        }
    }
}
