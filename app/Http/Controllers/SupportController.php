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
class SupportController extends Controller
{

    public function save(Request $request)
    {
        
       $name=$request->name;
       $email=$request->email;
       $comment=$request->comment;
       
       $data=['name'=>$name,'data'=>$comment];
       $user['to']=$email;
      Mail::send('includes.templates.mail.support',$data,function($messages) use ($user){
          
          $messages->to($user['to']);
           $messages->subject('Support');
      });
    }

    
}
