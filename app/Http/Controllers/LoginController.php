<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
// use App\Mail\WelcomeMail;

use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Mail;
use Mail;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {

        $credentials = $request->only('email', 'password');

        $active = User::where([
            'email' => $request->email
        ])->get();

        if (isset($active[0])) {
            if ($active[0]->user_role == 'model') {
                if ($active[0]->isActive == 1) {
                    $authSuccess = Auth::attempt($credentials);
                    if ($authSuccess) {
                        Auth::logoutOtherDevices($request->password);
                        $request->session()->regenerate();
                        return response()->json(['success' => 'yes_model', 'status' => 'active']);
                    }
                }
                elseif ($active[0]->isActive == 0) {
                    return response()->json(['success' => 'no', 'status' => 'pending']);
                }
                elseif ($active[0]->isActive == 2) {
                    return response()->json(['success' => 'no', 'status' => 'disabled']);
                }
            }
            else {
                $authSuccess = Auth::attempt($credentials);
                if ($authSuccess) {
                    $request->session()->regenerate();
                    return response()->json(['success' => 'yes_user', 'status' => 'active']);
                }
            }
        }

        return response()->json(['success' => 'no', 'status' => 'nomatch']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect('/');
    }

    public function resetPassword(Request $request)
    {

        $random_no = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 8);

        $isExist = User::select("*")
            ->where("email", $request->emailResetPwd)
            ->exists();

        if ($isExist) {
            $email=$request->emailResetPwd;
            $user = User::where('email', $request->emailResetPwd)
                ->update([
                    'password' => Hash::make($random_no),
                ]);
           // dd($request->emailResetPwd);
            //$data = ['reset_password' => $random_no];

           // Mail::to($request->emailResetPwd)->send(new WelcomeMail($data));
          $data=['name'=>$random_no,'data'=>'Please use this credentials as your new password'];
            
           $user_data['to']=$request->emailResetPwd;
           Mail::send('includes.templates.mail.signup',$data,function($messages) use ($user_data){
              
              $messages->to($user_data['to']);
               $messages->subject('Support');
          });
          // return response()->json(['email_success' => 'yes']);
            if (empty(Mail::failures())) {
                return response()->json(['email_success' => 'yes']);
            } 
            else {
                return response()->json(['email_success' => 'no']);
            }
        } 
        else {
            return response()->json(['error_message' => 'yes']);
        }
    }

    public function disableAccount(Request $request)
    {
        if (isset(Auth::user()->id)) {
            $status = $request->status;
            $user_id = User::find(Auth::user()->id)->id;
            $disabled = User::where('id', $user_id)->update(['isActive' => $status]);
            
            Auth::logout();
            $request->session()->flush();
            $request->session()->regenerate();

            return response()->json(['success' => 'yes']);
        }
        else {
            return response()->json(['success' => 'no']);
        }
    }
}
