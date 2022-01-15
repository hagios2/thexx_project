<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\user_detail;
use App\Models\chat_user;
use App\Models\model_galleries;
use App\Models\favorite_model;
use App\Models\live_model;
use App\Models\comment;
use App\Models\model_videoshop;
use App\Models\view;
use App\Models\like;
use App\Models\token_package;
use App\Models\token_rate;
use App\Models\download_video;
use App\Models\user_transaction;
use App\Models\Message;
use App\Models\UserMessage;
use App\Models\MessageGroup;
use App\Events\PrivateMessageEvent;
use Illuminate\Support\Facades\DB;

class PageStreamModelController extends Controller
{
    private function getAuthUser()
    {
        if (!isset(Auth::user()->id)) {
            $user_id = '';
        } else {
            $user_id = User::find(Auth::user()->id)->id;
        }
        return $user_id;
    }

    public function getDetails(Request $request)
    {   
        // if (!isset(Auth::user()->id)) {

        //     return view('includes.templates.error');
        // } 
        
    //     $camera_name = user_detail::select('camera_man_name')
    //         ->where('user_details.user_id', Auth::user()->id)
    //         ->get();
    //   $camera_name=$camera_name[0]->camera_man_name;
         
        $live_video_id = live_model::select('live_models.id', 'meeting_url')
            ->where('user_id', $request->model_id)
            ->where('active_status', 1)
            ->get();
           // dd($live_video_id[0]->id);
        $chat_data=$this->conversation($request->model_id,$live_video_id[0]->id);
        $user_list_data=$this->userListData($request->model_id);

        //dd($chat_data);
       // dd($chat_data['chats'][0]->sender_id);
        //dd($chat_data['chats']);
      // dd($chat_data['friendInfo']->id);

        $model_id = $request->model_id;
       // $live_video_id = $request->live_video_id;
        $user_id = $this->getAuthUser();
        
        
        
        $type_user = '';
        if ($user_id != '') {
            $type_user = 'user';
        }
         $isExist = live_model::select('live_models.id', 'meeting_url')
            ->where('user_id', $request->model_id)
            ->where('active_status', 1)
            ->exists();

        if (!$isExist) {
              return view('includes.templates.error');
        }
        
        //dd($live_video_id);
    //   if(!isset($live_video_id) && empty($live_video_id))
    //   {
    //       dd($live_video_id);
    //   }
        $countViewsData = $this->countViews($user_id, $model_id, $live_video_id, 'live');

        $checkAuthuser = like::select('likes.id')
            ->where('likes.model_id', $model_id)
            ->where('likes.user_id', $user_id)
            ->where('video_type', 'live')
            ->where('live_video_id', $live_video_id[0]->id)
            ->get();
        $countAuthuser_like= count($checkAuthuser);

        $countData_like = like::select('likes.id')
            ->where('likes.model_id', $model_id)
            ->where('video_type', 'live')
            ->where('live_video_id', $live_video_id[0]->id)
            ->get();

        $countLikesData = count($countData_like);
        
        $modelData = User::select('*')
            ->where('users.id', $model_id)
            ->where('user_role', 'model')
            ->join('user_details', 'user_details.user_id', 'users.id')
            ->get();

        $image_path = [];
        $path = '\uploads\Model_Gallery';

        $AccountModelGalleries = model_galleries::select('image_path')
            ->where('model_id', $model_id)
            ->get();

        for ($i = 0; $i < count($AccountModelGalleries); $i++) {
            $image_path[$i] = $path . '\\' . $AccountModelGalleries[$i]->image_path;
        }

        $favorite_model = favorite_model::where('user_id', $user_id)
            ->where('model_id', $model_id)
            ->where('status', 1)
            ->get();
        
           //broadcast data
           
         $last_broadcast =DB::select("
         SELECT user_id,created_at FROM  `live_models` WHERE user_id=$request->model_id order by id DESC LIMIT 1,1
            ");
            //dd($last_broadcast[0]->created_at);
        $commentData = comment::select('*')
            ->where('comments.model_id', $model_id)
            ->where('comments.live_video_id', $live_video_id[0]->id)
            ->join('user_details', 'user_details.user_id', 'comments.user_id')
            ->get();
         
        if (!isset($favorite_model[0])) {
            $favorite_model = false;
        }
        else {
            $favorite_model = true;
        }
        
        $token_packages = $this->token_packages();

        return view('includes.templates.model.page-stream-model', [
            'modelData' => $modelData[0],
            'type_user' => $type_user,
            'live_video_id' => $live_video_id[0],
            'image_path' => $image_path,
            'favorite_model' => $favorite_model,
            'commentData' => $commentData,
            'last_broadcast' => $last_broadcast,
            'countViewsData' => $countViewsData,
            'countLikesData' => $countLikesData,
            'countAuthuser_like' => $countAuthuser_like,
            'video_type'=>'live',
            'token_packages' => $token_packages[1],
            'token_rates' => $token_packages[0],
            'chat_data'=>$chat_data,
            // 'camera_name'=>$camera_name,
            'user_list_data' =>  $user_list_data,
        ]);
    }

    public function openVideo(Request $request) {

        $request->session()->put('video_id', $request->video_id);
        $user_id = $this->getAuthUser();

        $countViewsData = $this->countViews($user_id, $request->model_id, $request->video_id, 'video_shop');

        $countAuthUser_like = count(like::where('user_id', $user_id)
            ->where('likes.model_id', $request->model_id)
            ->where('video_type', 'video_shop')
            ->where('videoshop_id', $request->video_id)
            ->get()
        );
        
        $countData_like = like::select('likes.id')
            ->where('likes.model_id', $request->model_id)
            ->where('video_type', 'video_shop')
            ->where('videoshop_id', $request->video_id)
            ->get();

        $countLikesData = count($countData_like);
       
        $all_videos = model_videoshop::select('model_videoshops.id', 'video_title', 'model_id', 'name', 'video_url')
            ->where('model_id', $request->model_id)
            ->join('users', 'users.id', 'model_id')
            ->get();

        $selected_video = model_videoshop::where('model_id', $request->model_id)
            ->where('id', $request->video_id)
            ->get();
       // dd($selected_video);
        $image_path = [];
        $path = '\uploads\Model_Gallery';

        $AccountModelGalleries = model_galleries::select('image_path')
            ->where('model_id', $request->model_id)
            ->get();

        for ($i = 0; $i < count($AccountModelGalleries); $i++) {
            $image_path[$i] = $path . '\\' . $AccountModelGalleries[$i]->image_path;
        }

        $model_info = User::where('users.id', $request->model_id)
            ->join('user_details', 'user_details.user_id', 'users.id')
            ->get();
      
        $commentData = comment::select('comments.comment','user_details.user_name')
            ->where('comments.model_id', $request->model_id)
            ->where('comments.videoshop_id',$request->video_id)
            ->where('comments.video_type','video_shop')
            ->join('user_details', 'user_details.user_id', 'comments.user_id')
            ->get();

        $token_packages = $this->token_packages();

        $vip_status = user_transaction::select('package_type')
                    ->where('user_id', $user_id)
                    ->where('package_type', 'vip')
                    ->get();

        if (!isset($vip_status[0]->package_type) || $vip_status[0]->package_type == null) {
            $vip = download_video::select('access')
                ->where([
                    'user_id' => $user_id,
                    'access' => '1',
                    'video_id' => $selected_video[0]->id
                ])->get();
            if (isset($vip[0]->access)){
                $vip_status = $vip[0]->access; //vip
            }
        }
        else {
            $vip_status = 1; //vip
        }

        if (!isset($vip_status) && $vip_status->isEmpty()) {
            $vip_status = '';
        }

        return view('includes.templates.model.page-stream-model-product', [
            'selected_video' => $selected_video[0],
            'all_videos' => $all_videos,
            'model_info' => $model_info[0],
            'image_path' => $image_path,
            'commentData' => $commentData,
            'countViewsData' => $countViewsData,
            'countLikesData' => $countLikesData,
            'countAuthuser_like' => $countAuthUser_like,
            'video_id' => $request->video_id,
            'video_type'=>'video_shop',
            'favorite_page' => 'false',
            'token_packages' => $token_packages[1],
            'token_rates' => $token_packages[0],
            'vip_status' => $vip_status
        ]);
    }

    public function postComments(Request $request)
    {
        $videoshop_id = $request->session()->get('video_id');
        if (isset(Auth::user()->id)) {

            if ($request->video_type == 'video_shop') {
                $live_video_id = NULL;
            }
            else {
                $videoshop_id = NULL;
                $video_id = live_model::select('live_models.id')
                ->where('user_id', $request->model_id)
                    ->where('active_status', 1)
                    ->get();
                $live_video_id = $video_id[0]->id;
            }

            $comment = new comment();
            $comment->model_id = $request->model_id;
            $comment->user_id = Auth::user()->id;
            $comment->live_video_id = $live_video_id;
            $comment->video_type = $request->video_type;
            $comment->videoshop_id = $videoshop_id;
            $comment->comment = $request->comment;
           
            $comment->save();
            $request->session()->put('video_id', ''); 
            return response()->json(['success' => 'yes', 'user_id' => Auth::user()->id]);
        }
        else {
            return response()->json(['success' => 'no']); 
        }
    }

    public function countViews($user_id, $model_id, $video_id, $video_type)
    {

        if ($video_type == 'live') {
            $video_id_name = 'live_models.id';
            $table_name = 'live_models';
            $table_id = 'live_models.id';
            $match_id = 'views.live_video_id';
            $live_video_id = isset($video_id[0]->id) ? $video_id[0]->id : '';
            $videoshop_id = NULL;
        }
        else {
            $video_id_name = 'videoshop_id';
            $table_name = 'model_videoshops';
            $table_id = 'model_videoshops.id';
            $match_id = 'views.videoshop_id';
            $live_video_id = NULL;
            $videoshop_id = isset($video_id) ? $video_id : '';
        }
      
        $viewData = view::select('views.id')
            ->where([
                'views.model_id' => $model_id,
                'views.user_id' => $user_id,
                'video_type' => $video_type,
                'live_video_id' => $live_video_id,
                'videoshop_id'=>$videoshop_id
            ])
            ->join($table_name, $table_id, $match_id)
            ->get();
      
        if($user_id!='')
        {
            if (count($viewData) == 0) {
                $view = new view();
                $view->model_id = $model_id;
                $view->user_id = $user_id;
                $view->live_video_id = $live_video_id;
                $view->video_type = $video_type;
                $view->videoshop_id = $videoshop_id;
                $view->save();   
            }
        }

        $view = view::select('views.id')
            ->where('views.model_id', $model_id)
            ->where('views.video_type', $video_type)
            ->where('views.videoshop_id', $videoshop_id)
            ->where('views.live_video_id', $live_video_id)
            ->get();

        $countViewsData = count($view);
        
        return $countViewsData;
        
    }

    public function token_packages() {
        $token_rates = token_rate::all()->last();

        $token_packages = token_package::all();
        if (!isset($token_packages) && empty($token_packages)) {
            $token_packages = [];
        }
        return [$token_rates, $token_packages];
    }
    public function conversation($userId,$live_video_id) 
    {
        $users = User::where('id', '!=', Auth::id())->get();
        $friendInfo = User::findOrFail($userId);
        $myInfo = User::find(Auth::id());
        // dd($this->getAuthUser());
        // $groups= MessageGroup::get();
        $auth_user= $this->getAuthUser();
      
        // $chats =DB::select("SELECT messages.message,user_messages.sender_id,user_messages.receiver_id
        // FROM (messages
        // INNER JOIN user_messages ON user_messages.message_id = messages.id)
        // WHERE (user_messages.receiver_id=$userId AND user_messages.sender_id = $auth_user) OR (user_messages.receiver_id=$auth_user AND
        // user_messages.sender_id =$userId)
        // ");

            $chats =DB::select("SELECT messages.message,user_messages.sender_id,
            user_messages.receiver_id,user_details.camera_man_name
            FROM (((messages
            INNER JOIN user_messages ON user_messages.message_id = messages.id)
            INNER JOIN user_details ON user_details.user_id = messages.user_id)
            INNER JOIN users ON users.id = messages.user_id)
            WHERE (user_messages.receiver_id=$live_video_id)
            ");
            
            // $chats =DB::select("SELECT messages.message,user_messages.sender_id,
            // user_messages.receiver_id,user_details.camera_man_name
            // FROM (((messages
            // INNER JOIN user_messages ON user_messages.message_id = messages.id)
            // INNER JOIN users ON users.id = messages.user_id)
            // INNER JOIN user_details ON user_details.id = messages.user_id)
            // WHERE (user_messages.receiver_id=$live_video_id)
            // ");

         //dd($chats);
        // $this->data['groups'] = $groups;
        $this->data['users'] = $users;
        $this->data['friendInfo'] = $friendInfo;
        $this->data['myInfo'] = $myInfo;
        $this->data['users'] = $users;
        $this->data['chats'] = $chats;
        if(Auth::check())
        {
            $this->data['auth_user'] = $auth_user;
            $this->data['auth_user_name'] = Auth::user()->name;
        }
        else{
            $this->data['auth_user'] = ''; 
            $this->data['auth_user_name'] ='';
        }
        
        
        

        
       // dd($this->data);
       return $this->data;
        // return view('message.conversation', $this->data);
    }

    public function userListData($model_id)
    {
        $user_list_data =DB::select("SELECT user_details.user_name
        FROM (chat_users
        INNER JOIN user_details ON user_details.user_id = chat_users.user_id)
        WHERE (chat_users.group_id=$model_id)
        ");
       return $user_list_data;
      // dd($user_list_data);
    }
}
