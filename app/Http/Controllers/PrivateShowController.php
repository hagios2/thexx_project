<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\user_detail; 
use App\Models\Private_show; 
use App\Models\Private_show_userData; 
use App\Models\Private_show_token_transaction;
use App\Models\token_transaction;
use Illuminate\Support\Facades\Hash;
use Session;
use Validator;
use File;
use Mail;
class PrivateShowController extends Controller
{

   public function createPrivateChannel(Request $request)
    {
             $validation = Validator::make($request->all(), [
            'model_id' => '|required',
            'live_model_id' => '|required',
            'start_time' => '|required|',
            'price_per_minute' => '|required|',
            
            ]);
            if(!$validation->passes())
            {
                return response()->json(['statusCode'=>'8','message' => 'validation Error/Inavlid request from the client side'], 400);
            }
            
             $isExist = Private_show::select("*")
            ->where("model_id", $request->model_id) 
            ->where("live_model_id", $request->live_model_id)
            ->exists();
            
            if($isExist)
            {
                 $updated = Private_show::where("model_id", $request->model_id)
                            ->where("live_model_id", $request->live_model_id)
                            ->update([
                                'start_time' =>$request->start_time,
                            ]);
                if($updated)
                {
                    return response()->json(['statusCode'=>'2','message'=>'start time is updated successfully'], 200); 
                }
             
            }
               
            $private_show = new Private_show();
            $private_show->model_id = $request->model_id;
            $private_show->live_model_id = $request->live_model_id;
            $private_show->start_time = $request->start_time;
            $private_show->price_per_minute = $request->price_per_minute;
            
            $saved=$private_show->save();
            
            if($saved)
            {
             return response()->json(['statusCode'=>'200','message'=>'data is saved successfully','data'=>$private_show], 200);     
            }
            else{
                 return response()->json(['statusCode'=>'7','message'=>'data is not saved due to some internal server error'], 500); 
            }
           
    }
    // get private show page for model
    
     public function getPrivateShowPageForModel($private_show_id,$model_id){
        
        
      return response()->json(['statusCode'=>'101','private_show_id'=>$private_show_id,'model_id'=>$model_id,'message'=>"yes!!page is accessed for model"], 200);       
    }
    public function checkTokenStatus(Request $request){
        
         $total_tokens = token_transaction::where('user_id',$request->user_id)
            ->sum('tokens');
            
            
      return response()->json(['statusCode'=>'10','total_token'=>$total_tokens], 200);       
    }
    public function tokensTransaction(Request $request) {
        
             $validation = Validator::make($request->all(), [
            'model_id' => '|required',
            'user_id' => '|required',
            'token_price_per_minute' => '|required|',
            'is_private' => '|required|',
            
            ]);
            if(!$validation->passes())
            {
                return response()->json(['statusCode'=>'8','message' => 'validation Error/Inavlid request from the client side'], 400);
            }
            
            $user_id=$request->user_id;
            $total_tokens = token_transaction::where('user_id',$user_id)->sum('tokens');
            $model_id = $request->model_id;
            $tokens = $request->token_price_per_minute * 10;

            if ($total_tokens >= $tokens) {
                $this->saveToken($user_id, (0 - $tokens), NULL,'send',$request->is_private,$request->private_show_id);
                $this->saveToken($model_id, $tokens, $user_id, 'earn',$request->is_private,$request->private_show_id);
                
            // create data for user who pay for the private show.
                $this->privateShowUserData($model_id,  $user_id, $request->private_show_id);
                
            $total_tokens = token_transaction::where('user_id',$user_id)->sum('tokens');
            
                return response()->json(['statusCode'=>'200','message'=>'token transaction is successfull','token_left'=>$total_tokens], 200);     
            }
            else {
                return response()->json(['statusCode'=>'3','message'=>'Insufficient balance','token_left'=>$total_tokens], 403);     
            }
    }

    public function saveToken($user_id, $tokens, $from_user, $type,$is_private,$private_show_id) {
        $token_send = new token_transaction();
        $token_send->user_id = $user_id;
        $token_send->is_private = $is_private;
        $token_send->tokens = $tokens;
        $token_send->from_user = $from_user;
        $token_send->payment_type = $type;
        $token_send->save();
        
        if($type =='send')
        {
        $private_show_token_transaction = new Private_show_token_transaction();
        $private_show_token_transaction->token_transaction_id= $token_send->id;
        $private_show_token_transaction->private_show_id = $private_show_id;
        
        $private_show_token_transaction->save();   
        }
        
    }
     
   public function privateShowUserData($model_id,  $user_id, $private_show_id) {
       
        $private_show_userData = new Private_show_userData();
        $private_show_userData->user_id = $user_id; 
        $private_show_userData->model_id = $model_id; 	
        $private_show_userData->private_show_id =$private_show_id;
        $saved=$private_show_userData->save();
        
    if($saved)
            {
             return response()->json(['statusCode'=>'200','message'=>'user data is saved successfully','data'=>$private_show_userData], 200);     
            }
            else{
                 return response()->json(['statusCode'=>'7','message'=>'data is not saved due to some internal server error'], 500); 
            } 
    } 
    public function fetchPrivateShowUrl(Request $request) {
       
        $data = Private_show::select('private_shows.id', 'private_show_url')
            ->where('model_id', $request->model_id)
            ->where('active_status', 1)
            ->get();
            
       if(count($data) === 0)
            { return response()->json(['statusCode'=>'9','message'=>"No data found"], 404);
                
            }
        
    return response()->json(['statusCode'=>'10','data'=>$data], 200);  
    } 
    
    public function buyToken(Request $request)
    {
        $token_transaction = new token_transaction();
        $token_transaction->user_id = $request->user_id;
        $token_transaction->tokens = $request->tokens;
        $token_transaction->payment_type = 'buy';
        $token_transaction->save();
        return response()->json(['statusCode'=>'200','message'=>'new tokens successfully buyed','data'=>$token_transaction], 200); 
    }
    
    // get private show page for user
    
     public function getPrivateShowPageForUser($private_show_id){
         //user id will be fetched from session
         $user_id="1010";
        
        $status=$this->checkifUserAuthorized($user_id,$private_show_id);
        
        if($status)
        {
             return response()->json(['statusCode'=>'102','private_show_id'=>$private_show_id,'user_id'=>$user_id,'message'=>"yes!!page is accessed for user"], 200);       
        }
        else{
             return response()->json(['statusCode'=>'103','private_show_id'=>$private_show_id,'user_id'=>$user_id,'message'=>"no!!page is not accessed for user"], 200);       
        }
        
     
    }
     public function checkifPrivateShowCreated(Request $request)
    { 
        // check if any private show created by model.
       $isExist = Private_show::select("*")
            ->join('live_models', 'live_models.id', 'private_shows.live_model_id')
            ->where("model_id", $request->model_id) 
            ->where("live_model_id", $request->live_model_id)
            ->where("live_models.active_status", '1')
            ->exists();
            
        if($isExist)
        {
           return response()->json(['statusCode'=>'200','message'=>'Model has created a private show'], 200);  
        }
        else{
            return response()->json(['statusCode'=>'4','message'=>'Model has not created any private show'], 400);  
        }
        
    }
    public function checkifUserAuthorized($user_id,$private_show_id)
    { 
        // check if any user who is attending privated is authorized i.e has paid for that private show.
        $isExist_1 = Private_show_userData::select("*")
            ->where("user_id", $user_id) 
            ->where("private_show_id", $private_show_id)
            ->exists();
       $isExist_2 = Private_show_token_transaction::select("*")
            ->join('token_transactions', 'token_transactions.id', 'private_show_token_transactions.token_transaction_id')
            ->where("token_transactions.user_id", $user_id) 
            ->where("token_transactions.is_private", "1") 
            ->where("private_show_id", $private_show_id)
            ->exists(); 
    //   $isExist_1 = Private_show_userData::select("*")
    //         ->where("user_id", $request->user_id) 
    //         ->where("private_show_id", $request->private_show_id)
    //         ->exists();
    //   $isExist_2 = Private_show_token_transaction::select("*")
    //         ->join('token_transactions', 'token_transactions.id', 'private_show_token_transactions.token_transaction_id')
    //         ->where("token_transactions.user_id", $request->user_id) 
    //         ->where("token_transactions.is_private", "1") 
    //         ->where("private_show_id", $request->private_show_id)
    //         ->exists();  
            
        if($isExist_1 && $isExist_2)
        {
        //   return response()->json(['statusCode'=>'5','message'=>'user is authorized'], 200);  
         return true;
        }
        else{
            // return response()->json(['statusCode'=>'6','message'=>'user is not authorized'], 400);  
         return false;
        }
        
    }
    // model has started the private show
    public function createPrivateShow(Request $request)
    { 
        //to enable button for user to go to model private show.
        $updated = Private_show::where("model_id", $request->model_id)
                            ->where("id", $request->private_show_id)
                            ->update([
                                'active_status' =>'1',
                                'private_show_url' =>$request->private_show_url,
                            ]);
                            
            if($updated)
        {
           return response()->json(['statusCode'=>'13','message'=>'private show started by model'], 200);  
        } 
         else{
            return response()->json(['statusCode'=>'14','message'=>'private show not started by model'], 400);  
        }                
        
    }
    public function startPrivateShowForUser(Request $request)
    { 
        //to enable button for user to go to model private show.
        //i.e now user can enter private show page for that model
        
        $isExist = Private_show::select("*")
            ->whereNotNull('private_show_url')
            ->where("active_status", "1") 
             ->where("live_model_id",$request->live_model_id)
            ->where("id", $request->private_show_id)
            ->exists();  
        if($isExist)
        {
           return response()->json(['statusCode'=>'11','message'=>'now user can start the private show '], 200);  
        } 
         else{
            return response()->json(['statusCode'=>'12','message'=>'Please wait!! model did not started the private show'], 400);  
        }
        
    }
      public function endPrivateShow(Request $request)
    { 
        //to end the private show once model click on end show  button.
       
        
       $updated = Private_show::where("model_id", $request->model_id)
                            ->where("id", $request->private_show_id)
                            ->update([
                                'active_status' =>'0',
                                'private_show_url' =>'NULL',
                            ]);
                            
        if($updated)
        {
           return response()->json(['statusCode'=>'15','message'=>'private show ended by model'], 200);  
        } 
         else{
            return response()->json(['statusCode'=>'16','message'=>'private show not ended by model'], 400);  
        }          
        
        
    }
    
}
