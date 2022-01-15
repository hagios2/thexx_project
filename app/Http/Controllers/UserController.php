<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\user_detail;
use App\Models\favorite_model;
use App\Models\token_rate;
use App\Models\token_package;
use App\Models\token_transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use Mail;

class UserController extends Controller
{
    public function saveUserData(Request $request)
    {
        //  @for reference
        // $validated = $request->validate([
        //     'userPassword' => 'min:6|required_with:userPasswordConfirmation|same:userPasswordConfirmation',
        //     'userEmail' => 'email:rfc,dns'
        //     'userName' => 'required'
        // ]);

        $validator = Validator::make($request->all(), [
            'userEmail' => 'email:rfc,dns',
            'userName' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message'   => $validator->errors()->all(),
            ]);
        }

        $isExist = User::select("*")
            ->where("email", $request->userEmail)
            ->exists();

        if ($isExist) {
            return response()->json(['success' => 'no']);
        }
        else {
            $user = new User();
            $user->name = $request->userName;
            $user->email = $request->userEmail;
            $user->password = Hash::make($request->userPassword);
            $user->user_role = 'user';
            $user->save();

            $user_detail = new user_detail();
            $user_detail->user_id = $user->id;
            $user_detail->user_name = $request->userName;
            $user_detail->save();
            
            $data=['name'=>$user->name,'data'=>'Welcome to unlock your fanticies'];
            
           $user['to']=$user->email;
           Mail::send('includes.templates.mail.signup',$data,function($messages) use ($user){
              
              $messages->to($user['to']);
               $messages->subject('Support');
          });
      
            return response()->json(['success' => 'yes']);
        }
    }

    public function getUserDetails(Request $request)
    {

        if (!isset(Auth::user()->id)) {
            return view('includes.templates.error');
        }
        elseif (isset(Auth::user()->id) && Auth::user()->user_role == 'user') {

            $user_id = User::find(Auth::user()->id)->id;

            $AccountDetails = User::select('users.id', 'user_name', 'email')
                ->where('users.id', $user_id)
                ->join('user_details', 'user_details.user_id', 'users.id')
                ->get();

            if (!isset($AccountDetails[0]) && empty($AccountDetails[0])) {
                $AccountDetails[0] = '';
            }

            $favorite_model = favorite_model::select('favorite_models.video_id', 'camera_man_name', 'user_details.user_id', 'name')
                ->where('favorite_models.user_id', $user_id)
                ->where('status', 1)
                ->join('users', 'users.id', 'favorite_models.model_id')
                ->join('user_details', 'user_details.user_id', 'favorite_models.model_id')
                ->where('video_type', 'no_live') //shows only of videoshop
                ->get();


            if (!isset($favorite_model) && empty($favorite_model)) {
                $favorite_model = [];
            }

            $token_rates = token_rate::all()->last();

            $token_packages = token_package::all();
            if (!isset($token_packages) && empty($token_packages)) {
                $token_packages = [];
            }

            $total_tokens = token_transaction::where('user_id', Auth::user()->id)->sum('tokens');

            return view('includes/templates/user/account-user', [
                'favorite_model' => $favorite_model,
                'accountDetails' => $AccountDetails[0],
                'favorite_page' => 'true',
                'token_packages' => $token_packages,
                'token_rates' => $token_rates,
                'total_tokens' => $total_tokens
            ]);
        }
    }
    public function updateUser(Request $request)
    {

        $id = User::find(Auth::user()->id)->id;
        if ($request->password != '') {

            $user = User::where('id', $id)
                ->update([
                    'password' => Hash::make($request->password),
                ]);

            Auth::logout();
            $request->session()->flush();
            return response()->json(['success' => 'yes']);
        }
        else {
            return response()->json(['failure' => 'yes_pwd_empty']);
        }
    }
}
