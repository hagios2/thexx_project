<?php

namespace App\Http\Controllers;

use App\Events\GroupMessageEvent;
use App\Models\Message; 
use App\Models\chat_user;
use App\Models\UserMessage;
use App\Models\live_model;
use App\Models\User;
use App\Models\MessageGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use App\Events\PrivateMessageEvent;
use Illuminate\Support\Facades\DB;
use Session;

class MessageController extends Controller
{
   
    public function conversation($userId) 
    {
        $users = User::where('id', '!=', Auth::id())->get();
        $friendInfo = User::findOrFail($userId);
        $myInfo = User::find(Auth::id());
        // $groups= MessageGroup::get();
        $auth_user= Auth::user()->id;
        // $models = Message::select('messages.message','user_messages.sender_id','user_messages.receiver_id')
        //     ->where('user_messages.receiver_id', Auth::user()->id )
        //     ->where('user_messages.sender_id', $userId)
        //     // ->join('messages', 'messages.id', 'users.id')
        //     ->join('user_messages', 'user_messages.message_id', 'messages.id')
        //     // ->orderBy('user_details.created_at', 'ASC')
        //     ->get();
        $chats =DB::select("SELECT messages.message,user_messages.sender_id,user_messages.receiver_id
        FROM (messages
        INNER JOIN user_messages ON user_messages.message_id = messages.id)
        WHERE (user_messages.receiver_id=$userId AND user_messages.sender_id = $auth_user) OR (user_messages.receiver_id=$auth_user AND
        user_messages.sender_id =$userId)
        ");

        dd($chats);
        // $this->data['groups'] = $groups;
        $this->data['users'] = $users;
        $this->data['friendInfo'] = $friendInfo;
        $this->data['myInfo'] = $myInfo;
        $this->data['users'] = $users;
        $this->data['chats'] = $chats;
        $this->data['auth_user'] = $auth_user;
        $this->data['auth_user_name'] = Auth::user()->name;
       // dd($this->data);
        return view('includes.templates.pages.page-startshow-golive', $this->data);
    }

    public function sendMessage(Request $request) {

        // print_r($request);
        // exit();
        
       //dd($request);
        $request->validate([
           'message' => 'required',
           'receiver_id' => 'required'
        ]);

        $sender_id = Auth::id();
        $receiver_id = $request->receiver_id;
        $live_video_id=$request->live_video_id;
        if($live_video_id == "undefined")
        {
            // dd("yes");
         $liveid = live_model::select('live_models.id')
            ->where('user_id', $request->receiver_id)
            ->where('active_status', 1)
            ->get();  
          $live_video_id= $liveid[0]->id; 
        }
        $message = new Message();
        $message->message = $request->message;
        $message->user_id = $sender_id;
        if ($message->save()) {
            try {
                $message->users()->attach($sender_id, ['receiver_id' => $live_video_id]);
                $sender = User::where('id', '=', $sender_id)->first();

                $data = [];
                $data['sender_id'] = $sender_id;
                $data['sender_name'] = $sender->name;
                // $data['receiver_id'] = $receiver_id;
                $data['receiver_id'] =$live_video_id;
                $data['content'] = $message->message;
                $data['created_at'] = $message->created_at;
                $data['message_id'] = $message->id;
                
                // $redis=Redis::connection();
                // $redis->publish('message',"private-channel",$data);
            //    print_r($data);
            //    exit();
                //event(new PrivateMessageEvent($data));
                // PrivateMessageEvent::dispatch($data);

                return response()->json([
                   'data' => $data,
                   'success' => true,
                    'message' => 'Message sent successfully'
                ]);
            } catch (\Exception $e) {
                $message->delete();
            }
        }
    }
    public function storeUsertoDatabase(Request $request) {

            // print_r();
            // exit(); 
            $isExist = chat_user::select("*")
            ->where("user_id", $request->userdata['user_id'])
            ->exists();
            if (!$isExist) {
                $group_id =$request->userdata['group_id'];
            $user_id =$request->userdata['user_id'];
            $socket_id =$request->userdata['socket.id'];
            $room_name =$request->userdata['room'];

        $chat_user =new chat_user();
        $chat_user->group_id= $group_id;
        $chat_user->user_id= $user_id;
        $chat_user->socket_id= $socket_id;
        $chat_user->room_name= $room_name;
        $chat_user->save();
            }

            
    
    }

     public function deleteUserfromDatabase(Request $request) {
        print_r("yes");
        exit(); 

       }



    public $arr=[];
    public function storeUser(Request $request) {
        

        $group_id = $request->userdata['group_id'];
        // $request->session()->put('group'+$group_id, $request->userdata['username']);
        // print_r(Session::get('group'+$group_id));
        // exit();
       
        // if(Session::has('group'+$group_id))
        // {
        //     // print_r("yes");
        //     // exit(); 
        //    $array= Session::get('group'+$group_id);
        //    array_push($array,$request->userdata['username']);
        // }
        // else{

        //     $arr = array($request->userdata['username']); 
        //     $request->session()->put('group'+$group_id,  $arr);
       
        // }
    //    print_r(Session::get('group'+$group_id));
    //    exit();
        print_r($request->session()->get($group_id));
        exit();
        
        if($request->session()->get($group_id))
        {
            // print_r("yes");
            // exit(); 
           $array= $request->session()->get($group_id);
           array_push($array,$request->userdata['username']);
        }
        else{

            $arr = array($request->userdata['username']); 
            $request->session()->put($group_id,  $arr);
       
        }
        print_r($request->session()->get($group_id));
        exit();
    }
    public function sendGroupMessage(Request $request) {
        // print_r($request->message_group_id);
        // exit();
        $request->validate([
           'message' => 'required',
           'message_group_id' => 'required'
        ]);

        $sender_id = Auth::id();
     

        $messageGroupId = $request->message_group_id;
        // $receiver_id = $request->receiver_id;

        $message = new Message();
        $message->message = $request->message;
        // $message->type = '1';
        // $message->status = '1';
        // $message->save();

        //  if ($message->save()) {
        // $userMessage = new UserMessage();
        // $userMessage->message_id=$message->id;
        // $userMessage->sender_id=$sender_id;
        // $userMessage->message_group_id=$messageGroupId;
        // $userMessage->save();

        // $sender = User::where('id', '=', $sender_id)->first();
        //         $data = [];
        //         $data['sender_id'] = $sender_id;
        //         $data['sender_name'] = $sender->name;
        //         $data['content'] = $message->message;
        //         $data['created_at'] = $message->created_at;
        //         $data['message_id'] = $message->id;
        //         $data['group_id']=$messageGroupId;
        //         $data['type']='2';
        //         return response()->json([
        //                        'data' => $data,
        //                        'success' => true,
        //                         'message' => 'Message sent successfully'
        //                     ]);

        //                 }
        //                 else{
        //                    print_r("yes");
        //                   exit(); 
        //                 }
        if ($message->save()) {
           
            try {
               
                $message->users()->attach($sender_id, ['message_group_id' => $messageGroupId]);
                $sender = User::where('id', '=', $sender_id)->first();

                $data = [];
                $data['sender_id'] = $sender_id;
                $data['sender_name'] = $sender->name;
                $data['content'] = $message->message;
                $data['created_at'] = $message->created_at;
                $data['message_id'] = $message->id;
                $data['group_id']=$messageGroupId;
                $data['type']=2;
               
                // $redis=Redis::connection();
                // $redis->publish('message',"private-channel",$data);
            //    print_r($data);
            //    exit();
            // print_r("yes");
            //      exit();
            event(new GroupMessageEvent($data));
            
                // PrivateMessageEvent::dispatch($data);
                
                return response()->json([
                   'data' => $data,
                   'success' => true,
                    'message' => 'Message sent successfully'
                ]);
            } catch (\Exception $e) {
               
                $message->delete();
            }
        }
    }
}
