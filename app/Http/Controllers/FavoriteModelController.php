<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\like;
use App\Models\token_package;
use App\Models\token_rate;
use App\Models\user_detail;
use App\Models\favorite_model;
use Illuminate\Support\Facades\DB;

class FavoriteModelController extends Controller
{
    public function getFavoriteModelDetails()
    {

        $like_models = [];
        // $likesCountDatas=[];
        // $viewsCountDatas=[];

        if (!isset(Auth::user()->id)) {
            $user_id = '';
        }
        else {
            $user_id = User::find(Auth::user()->id)->id;
        }
         
        $modelData_no_live = favorite_model::select('user_details.user_id', 'camera_man_name', 'name', 'video_type', 'video_id', 'video_title')
            ->join('users', 'users.id', 'favorite_models.model_id')    
            ->where('favorite_models.user_id', $user_id)
            ->where('user_role', 'model')
            ->where('video_type', 'no_live')
            ->join('user_details', 'user_details.user_id', 'favorite_models.model_id')
            ->join('model_videoshops', 'model_videoshops.id', 'favorite_models.video_id')
            ->get();

        $modelData_live = favorite_model::select('user_details.user_id', 'camera_man_name', 'name', 'video_type','cover_img_url')
            ->join('users', 'users.id', 'favorite_models.model_id')    
            ->where('favorite_models.user_id', $user_id)
            ->where('user_role', 'model')
            ->where('video_type', 'live')
            ->join('user_details', 'user_details.user_id', 'favorite_models.model_id')
            ->join('live_models', 'live_models.user_id', 'user_details.user_id')
            ->where('active_status', 1)
            ->get();
            
            
            //dd($modelData_live);
            
        //  $user_id = User::find(Auth::user()->id)->id;
        //   $modelData_live = User::select('user_details.user_id', 'camera_man_name', 'name', 'active_status','cover_img_url')
        //     ->where('user_role', 'model')
        //     ->where('favorite_models.user_id', $user_id)
        //     ->join('user_details', 'user_details.user_id', 'users.id')
        //     ->join('favorite_models', 'favorite_models.model_id', 'users.id')
        //     ->join('live_models', 'live_models.user_id', 'user_details.user_id')
        //     ->where('active_status', 1)
        //     ->get();
      // dd($modelData_live);
        $modelData = (object) array_merge([], []);
        $key_count = 0;
        foreach($modelData_no_live as $key => $value) {
            $modelData->$key_count = $value;
            $key_count++;
        }

        foreach($modelData_live as $key => $value) {
            $modelData->$key_count = $value;
            $key_count++;
        }

        $like_model = like::where('user_id', $user_id)->get();

        if (!isset($like_model) && empty($like_model)) {
            $like_models = [];
        }
        else {
            for ($i = 0; $i < count($like_model); $i++) {
                $like_models[$like_model[$i]->model_id] = 1;
            }
        }

        $token_rates = token_rate::all()->last();

        $token_packages = token_package::all();
        if (!isset($token_packages) && empty($token_packages)) {
            $token_packages = [];
        }

        // $viewsCountData = DB::table('views')
        //     ->select(DB::raw('count(*) as user_count, videoshop_id, live_video_id'))
        //     ->groupBy('videoshop_id', 'live_video_id')
        //     ->get();

        // $likesCountData = DB::table('likes')
        //     ->select(DB::raw('count(*) as like_count, videoshop_id'))
        //     ->groupBy('videoshop_id')
        //     ->get();

        // if (!isset($viewsCountData) && empty($viewsCountData)) {
        //     $viewsCountDatas = [];
        // }
        // else {
        //     for ($i = 0; $i < count($viewsCountData); $i++) {
        //         if (!empty($viewsCountData[$i]->videoshop_id)) {
        //             $viewsCountDatas[$viewsCountData[$i]->videoshop_id] = $viewsCountData[$i]->user_count;
        //         }
        //         else {
        //             $viewsCountDatas['l-' . $viewsCountData[$i]->live_video_id] = $viewsCountData[$i]->user_count;
        //         }
        //     }
        // }

        // if (!isset($likesCountData) && empty($likesCountData)) {
        //     $likesCountDatas = [];
        // }
        // else {
        //     for ($i = 0; $i < count($likesCountData); $i++) {
        //         $likesCountDatas[$likesCountData[$i]->videoshop_id] = $likesCountData[$i]->like_count;
        //     }
        // }

        $tags = user_detail::select('tags')
            ->where('tags', '!=', NULL)
            ->get();

        $count = 0;
        for($i = 0 ; $i < count($tags) ; $i++) {
            $tag = explode(',', $tags[$i]->tags);
            for ($j = 0 ; $j < count($tag) ; $j++) {
                $model_tags[$count] = $tag[$j];
                $count++;
            }
        }
        if(empty($model_tags))
        {
          $model_tags = [];  
        }
        //  $user_id = User::find(Auth::user()->id)->id;
        // $modelData = User::select('user_details.user_id', 'camera_man_name', 'name', 'active_status','cover_img_url')
        //     ->where('user_role', 'model')
        //     ->where('favorite_models.user_id', $user_id)
        //     ->join('user_details', 'user_details.user_id', 'users.id')
        //     ->join('favorite_models', 'favorite_models.model_id', 'users.id')
        //     ->join('live_models', 'live_models.user_id', 'user_details.user_id')
        //     ->where('active_status', 1)
        //     ->get();
        //     // dd( $models);
          
        return view('includes.templates.pages.page-favorites', [
            'modelData' => $modelData,
            'like_model' => $like_models,
            'favorite_page' => 'true',
            'token_packages' => $token_packages,
            'token_rates' => $token_rates,
            'model_tags' => $model_tags
        ]);  
    }
}
