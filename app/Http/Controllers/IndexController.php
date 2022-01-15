<?php

namespace App\Http\Controllers;

use App\Models\favorite_model;
use App\Models\like;
use App\Models\live_model;
use App\Models\token_rate;
use App\Models\User;
use App\Models\user_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;

class IndexController extends Controller
{
    public function show(Request $request)
    {
        $filter_arr = [];
        $newmodelDatas = [];
        $this->forgetfiltersession();
        $selection_filter_type = $this->selection_filter($request);

        if (isset($request->submit_filter)) {
            //dd($request->filter);
            $filter_arr = $request->filter;
            $request->session()->put('sort_choices', $filter_arr);

        } else {
            Session::forget('sort_choices');
        }
        //    dd($request);
        $limit = 20; // 20 models shown at one page.
        $page_no = isset($request->page_no) ? $request->page_no : 1;
        $start_from = ($page_no - 1) * $limit;

        $favorite_models = [];
        $like_models = [];
        $likesCountDatas = [];
        $viewsCountDatas = [];
        if (!isset(Auth::user()->id)) {
            $user_id = '';
        } else {
            $user_id = User::find(Auth::user()->id)->id;
        }

        $modelData = $this->getLiveModels($start_from, $limit, $filter_arr, $selection_filter_type);
        $newmodelData = $this->getNewLiveModels($start_from, $limit);
        // dd($newmodelData);
        $total_pages = $this->getTotalPages();

        // $viewsCountData = DB::table('views')
        //     ->select(DB::raw('count(*) as user_count,model_id'))
        //     ->where('views.video_type', 'live')
        //     ->groupBy('model_id')
        //     ->get();

        $viewsCountData = DB::table('views')
            ->select(DB::raw('count(*) as user_count,views.live_video_id'))
            ->join('live_models', 'live_models.id', 'views.live_video_id')
            ->where('views.video_type', 'live')
            ->where('live_models.active_status', 1)
            ->groupBy('live_video_id')
            ->get();
        // dd($viewsCountData);
        // $likesCountData = DB::table('likes')
        //     ->select(DB::raw('count(*) as like_count,model_id'))
        //     ->where('likes.video_type', 'live')
        //     ->groupBy('model_id')
        //     ->get();

        $likesCountData = DB::table('likes')
            ->select(DB::raw('count(*) as like_count,likes.live_video_id'))
            ->join('live_models', 'live_models.id', 'likes.live_video_id')
            ->where('likes.video_type', 'live')
            ->where('live_models.active_status', 1)
            ->groupBy('live_video_id')
            ->get();

        //dd($likesCountData);

        if (!isset($newmodelData) && empty($newmodelData)) {
            $newmodelDatas = [];
        } else {
            for ($i = 0; $i < count($newmodelData); $i++) {
                $newmodelDatas[$newmodelData[$i]->user_id] = "1";
            }
        }
        //dd($newmodelDatas);
        if (!isset($viewsCountData) && empty($viewsCountData)) {
            $viewsCountDatas = [];
        } else {
            for ($i = 0; $i < count($viewsCountData); $i++) {
                $viewsCountDatas[$viewsCountData[$i]->live_video_id] = $viewsCountData[$i]->user_count;
            }
        }
        // dd($viewsCountData);

        // if (!isset($likesCountData) && empty($likesCountData)) {
        //     $likesCountDatas = [];
        // }
        // else {
        //     for ($i = 0; $i < count($likesCountData); $i++) {
        //         $likesCountDatas[$likesCountData[$i]->model_id] = $likesCountData[$i]->like_count;
        //     }
        // }
        if (!isset($likesCountData) && empty($likesCountData)) {
            $likesCountDatas = [];
        } else {
            for ($i = 0; $i < count($likesCountData); $i++) {
                $likesCountDatas[$likesCountData[$i]->live_video_id] = $likesCountData[$i]->like_count;
            }
        }

        $favorite_model = favorite_model::where([
            'user_id' => $user_id,
            'video_type' => 'live'
        ])->get();

        $like_model = like::where('user_id', $user_id)->get();

        if (!isset($favorite_model) && empty($favorite_model)) {
            $favorite_models = [];
        } else {
            for ($i = 0; $i < count($favorite_model); $i++) {
                $favorite_models[$favorite_model[$i]->model_id] = 1;
            }
        }

        if (!isset($like_model) && empty($like_model)) {
            $like_models = [];
        } else {
            for ($i = 0; $i < count($like_model); $i++) {
                $like_models[$like_model[$i]->model_id] = 1;
            }
        }

        $token_rates = token_rate::all()->last();

//        $token_packages = token_package::all();
//        if (!isset($token_packages) && empty($token_packages)) {
//            $token_packages = [];
//        }

        $token_packages = collect(config("token_packages.items"))->map(function ($pItem) {
            $pItem = array_merge($pItem, [
                "package_type" => Arr::get($pItem, "package_type", null),
                "bonus" => Arr::get($pItem, "bonus", 0)
            ]);
            return (object)$pItem;
        })->toArray();
       
       //dd($token_packages);
       
        $tags = user_detail::select('tags')
            ->where('tags', '!=', NULL)
            ->get();

        $count = 0;
        for ($i = 0; $i < count($tags); $i++) {
            $tag = explode(',', $tags[$i]->tags);
            for ($j = 0; $j < count($tag); $j++) {
                $model_tags[$count] = $tag[$j];
                $count++;
            }
        }
        if (empty($model_tags)) {
            $model_tags = [];
        }

        //dd($modelData);
        return view('includes.index', [
            'modelData' => $modelData,
            'newmodelDatas' => $newmodelDatas,
            'page_no' => $page_no,
            'total_pages' => $total_pages + 1,
            'favorite_model' => $favorite_models,
            'like_model' => $like_models,
            'favorite_page' => 'false',
            'likesCountData' => $likesCountDatas,
            'viewsCountData' => $viewsCountDatas,
            'token_packages' => $token_packages,
            'token_rates' => $token_rates,
            'model_tags' => $model_tags,
            // 'filter_arr' => $filter_arr
        ]);
    }

    // It returns the total pages according to the live models
    public function getTotalPages()
    {
        $limit = 20; // 20 models shown at one page.
        $live_models = live_model::where('active_status', 1)->count();
        $total_pages = $live_models / $limit;
        $total_pages = floor($total_pages);

        return $total_pages;
    }

    // Get the details of model of given offset, limit

    public function getLiveModels($start_from, $limit, $filter_arr, $selection_filter_type)
    {
        if (!empty($selection_filter_type)) {
            return $this->selection_filters_data($start_from, $limit, $selection_filter_type);
            // dd($filter_arr);
        } else if (!empty($filter_arr)) {
            return $this->filters($start_from, $limit, $filter_arr);
        } else {
            $formatted_date = \Carbon\Carbon::now()->subMinutes(5)->toDateTimeString();
            //     $date = new DateTime;
            // $date->modify('-5 minutes');
            // $formatted_date = $date->format('Y-m-d H:i:s');
            $models = User::select('user_details.user_id', 'live_models.id as live_video_id', 'camera_man_name', 'name', 'active_status', 'cover_img_url')
                ->where('live_models.updated_at', '>=', $formatted_date)
                ->where('user_role', 'model')
                ->join('user_details', 'user_details.user_id', 'users.id')
                ->join('live_models', 'live_models.user_id', 'user_details.user_id')
                ->where('active_status', 1)
                ->orderBy('user_details.user_id', 'ASC')
                ->offset($start_from)->limit($limit)
                ->get();
            // dd($models);
            return $models;
        }
    }

    public function getNewLiveModels($start_from, $limit)
    {

        $formatted_date = \Carbon\Carbon::now()->subMinutes(5)->toDateTimeString();
        $date = \Carbon\Carbon::today()->subDays(10);
        $models = User::select('user_details.user_id', 'live_models.id as live_video_id', 'camera_man_name', 'name', 'active_status', 'cover_img_url')
            ->where('live_models.updated_at', '>=', $formatted_date)
            ->where('user_role', 'model')
            ->whereDate('user_details.created_at', '>=', date($date))
            ->join('user_details', 'user_details.user_id', 'users.id')
            ->join('live_models', 'live_models.user_id', 'user_details.user_id')
            ->where('active_status', 1)
            ->offset($start_from)->limit($limit)
            ->get();
        // dd( $models);
        return $models;

    }

    public function filters($start_from, $limit, $filter_arr)
    {
        $arr1 = array('Newest');
        $arr2 = array('my_favorites_first');
        $arr3 = array('best_rating');
        $arr4 = array('Newest', 'my_favorites_first');
        $arr5 = array('Newest', 'best_rating');
        $arr6 = array('my_favorites_first', 'best_rating');
        $arr7 = array('Newest', 'my_favorites_first', 'best_rating');

        //dd($filter_arr);
        $formatted_date = \Carbon\Carbon::now()->subMinutes(5)->toDateTimeString();
        // dd($formatted_date);
        if ($filter_arr == $arr1) {

            $models = User::select('user_details.user_id', 'live_models.id as live_video_id', 'camera_man_name', 'name', 'active_status', 'cover_img_url')
                ->where('live_models.updated_at', '>=', $formatted_date)
                ->where('user_role', 'model')
                // ->whereDate('created_at', '<=', now()->subDays(30)->setTime(0, 0, 0)->toDateTimeString())
                ->join('user_details', 'user_details.user_id', 'users.id')
                ->join('live_models', 'live_models.user_id', 'user_details.user_id')
                ->where('active_status', 1)
                ->orderBy('user_details.created_at', 'ASC')
                ->offset($start_from)->limit($limit)
                ->get();
            //dd( $models);
            return $models;
        }
        if ($filter_arr == $arr2) {
            $user_id = User::find(Auth::user()->id)->id;
            $models = User::select('user_details.user_id', 'camera_man_name', 'name', 'active_status', 'cover_img_url')
                ->where('live_models.updated_at', '>=', $formatted_date)
                ->where('user_role', 'model')
                ->where('favorite_models.user_id', $user_id)
                ->join('user_details', 'user_details.user_id', 'users.id')
                ->join('favorite_models', 'favorite_models.model_id', 'users.id')
                ->join('live_models', 'live_models.user_id', 'user_details.user_id')
                ->where('active_status', 1)
                ->where('favorite_models.video_type', 'live')
                ->offset($start_from)->limit($limit)
                ->get();
            // dd( $models);
            return $models;
        }
        if ($filter_arr == $arr3) {


            $models = DB::table('users')
                ->select(DB::raw('count(user_details.user_id) as user_count, user_details.user_id,live_models.id as live_video_id,name, camera_man_name,active_status,cover_img_url'))
                ->join('user_details', 'user_details.user_id', 'users.id')
                ->join('views', 'views.model_id', 'user_details.user_id')
                ->join('live_models', 'live_models.user_id', 'user_details.user_id')
                ->where('live_models.updated_at', '>=', $formatted_date)
                ->where('views.video_type', 'live')
                ->where('active_status', 1)
                ->groupBy('user_details.user_id')
                ->orderBy(\DB::raw('count(user_details.user_id)'), 'DESC')
                ->offset($start_from)->limit($limit)
                ->get();
            //  dd($models);
            // $models =DB::select("SELECT COUNT(user_details.user_id) as user_count,user_details.user_id,live_models.id as live_video_id,name, camera_man_name,active_status,cover_img_url
            // FROM (((users
            // INNER JOIN user_details ON user_details.user_id = users.id)
            // INNER JOIN views ON views.model_id = user_details.user_id)
            // INNER JOIN live_models ON live_models.user_id = user_details.user_id)
            // WHERE views.video_type='live' AND live_models.active_status ='1' AND live_models.updated_at > '2021-08-30 06:54:21'
            // GROUP BY user_details.user_id
            // ORDER BY COUNT(user_details.user_id) DESC
            // LIMIT $limit OFFSET $start_from
            // ");

            return $models;

        }
        if ($filter_arr == $arr4) {

            $user_id = User::find(Auth::user()->id)->id;
            $models = User::select('user_details.user_id', 'camera_man_name', 'name', 'active_status', 'cover_img_url')
                ->where('live_models.updated_at', '>=', $formatted_date)
                ->where('user_role', 'model')
                ->where('favorite_models.user_id', $user_id)
                ->join('user_details', 'user_details.user_id', 'users.id')
                ->join('favorite_models', 'favorite_models.model_id', 'users.id')
                ->join('live_models', 'live_models.user_id', 'user_details.user_id')
                // ->join('model_videoshops', 'model_videoshops.model_id', 'favorite_models.model_id')
                ->where('active_status', 1)
                ->where('favorite_models.video_type', 'live')
                ->orderBy('user_details.created_at', 'DESC')
                ->offset($start_from)->limit($limit)
                ->get();

            return $models;

        }
        if ($filter_arr == $arr5) {
            $models = DB::table('users')
                ->select(DB::raw('count(user_details.user_id) as user_count, user_details.user_id,live_models.id as live_video_id,name, camera_man_name,active_status,cover_img_url'))
                ->join('user_details', 'user_details.user_id', 'users.id')
                ->join('views', 'views.model_id', 'user_details.user_id')
                ->join('live_models', 'live_models.user_id', 'user_details.user_id')
                ->where('live_models.updated_at', '>=', $formatted_date)
                ->where('views.video_type', 'live')
                ->where('active_status', 1)
                ->groupBy('user_details.user_id')
                ->orderBy(\DB::raw('count(user_details.user_id)'), 'DESC')
                ->orderBy('user_details.created_at', 'ASC')
                ->offset($start_from)->limit($limit)
                ->get();
            // dd( $models);
            // $models =DB::select("SELECT COUNT(user_details.user_id) as user_count,user_details.user_id,name, camera_man_name,active_status,cover_img_url
            // FROM (((users
            // INNER JOIN user_details ON user_details.user_id = users.id)
            // INNER JOIN views ON views.model_id = user_details.user_id)
            // INNER JOIN live_models ON live_models.user_id = user_details.user_id)
            // WHERE views.video_type='live' AND live_models.active_status ='1'
            // GROUP BY user_details.user_id
            // ORDER BY COUNT(user_details.user_id) DESC,user_details.created_at ASC
            // LIMIT $limit OFFSET $start_from
            // ");

            return $models;
        }
        if ($filter_arr == $arr6) {

            $user_id = User::find(Auth::user()->id)->id;
            $models = DB::table('users')
                ->select(DB::raw('count(user_details.user_id) as user_count, user_details.user_id,live_models.id as live_video_id,name, camera_man_name,active_status,cover_img_url'))
                ->where('live_models.updated_at', '>=', $formatted_date)
                ->where('user_role', 'model')
                ->where('favorite_models.user_id', $user_id)
                ->join('user_details', 'user_details.user_id', 'users.id')
                ->join('views', 'views.model_id', 'user_details.user_id')
                ->join('live_models', 'live_models.user_id', 'user_details.user_id')
                ->join('favorite_models', 'favorite_models.model_id', 'users.id')
                ->where('active_status', 1)
                ->where('favorite_models.video_type', 'live')
                ->groupBy('user_details.user_id')
                ->orderBy(\DB::raw('count(user_details.user_id)'), 'DESC')
                ->offset($start_from)->limit($limit)
                ->get();

            //dd($models);
            // $user_id = User::find(Auth::user()->id)->id;

            // $models =DB::select("SELECT COUNT(user_details.user_id) as user_count, user_details.user_id, camera_man_name, name,active_status,cover_img_url
            // FROM ((((users
            // INNER JOIN user_details ON user_details.user_id = users.id)
            // INNER JOIN views ON views.model_id = users.id)
            // INNER JOIN live_models ON live_models.user_id = user_details.user_id)
            // INNER JOIN favorite_models ON favorite_models.model_id = users.id)
            // WHERE views.video_type='live' AND favorite_models.user_id = $user_id
            // AND  favorite_models.video_type = 'live'
            // GROUP BY user_details.user_id
            // ORDER BY COUNT(user_details.user_id) DESC
            // LIMIT $limit OFFSET $start_from
            // ");


            return $models;
        }
        if ($filter_arr == $arr7) {

            $user_id = User::find(Auth::user()->id)->id;
            $models = DB::table('users')
                ->select(DB::raw('count(user_details.user_id) as user_count, user_details.user_id,live_models.id as live_video_id,name, camera_man_name,active_status,cover_img_url'))
                ->where('live_models.updated_at', '>=', $formatted_date)
                ->where('user_role', 'model')
                ->where('favorite_models.user_id', $user_id)
                ->join('user_details', 'user_details.user_id', 'users.id')
                ->join('views', 'views.model_id', 'user_details.user_id')
                ->join('live_models', 'live_models.user_id', 'user_details.user_id')
                ->join('favorite_models', 'favorite_models.model_id', 'users.id')
                ->where('active_status', 1)
                ->where('favorite_models.video_type', 'live')
                ->groupBy('user_details.user_id')
                ->orderBy(\DB::raw('count(user_details.user_id)'), 'DESC')
                ->orderBy('user_details.created_at', 'ASC')
                ->offset($start_from)->limit($limit)
                ->get();


            // $user_id = User::find(Auth::user()->id)->id;
            // $models =DB::select("SELECT COUNT(user_details.user_id) as user_count, user_details.user_id, camera_man_name, name,active_status,cover_img_url
            // FROM ((((users
            // INNER JOIN user_details ON user_details.user_id = users.id)
            // INNER JOIN views ON views.model_id = users.id)
            // INNER JOIN live_models ON live_models.user_id = user_details.user_id)
            // INNER JOIN favorite_models ON favorite_models.model_id = users.id)
            // WHERE views.video_type='live' AND favorite_models.user_id = $user_id
            // GROUP BY user_details.user_id
            // ORDER BY COUNT(user_details.user_id) DESC
            // LIMIT $limit OFFSET $start_from
            // ");
            // ,user_details.created_at ASC


            return $models;
        }

    }

    public function selection_filter($request)
    {

        if (isset($request->new_model_filter)) {

            return 'new_model';
        }
        if (isset($request->online_now_filter)) {

            return 'online_now';
        }
        if (isset($request->favorites_filter)) {

            return 'favorites';
        }
        if (isset($request->english_filter)) {

            return 'english';
        }
        if (isset($request->french_filter)) {

            return 'french';
        }
        if (isset($request->german_filter)) {

            return 'german';
        }
        if (isset($request->portuguese_filter)) {

            return 'portuguese';
        }


    }

    public function selection_filters_data($start_from, $limit, $selection_filter_type)
    {
        $formatted_date = \Carbon\Carbon::now()->subMinutes(2)->toDateTimeString();
        if ($selection_filter_type == 'new_model') {

            $date = \Carbon\Carbon::today()->subDays(10);
            Session::put('new_model', true);

            $models = User::select('user_details.user_id', 'live_models.id as live_video_id', 'camera_man_name', 'name', 'active_status', 'cover_img_url')
                ->where('live_models.updated_at', '>=', $formatted_date)
                ->where('user_role', 'model')
                ->whereDate('user_details.created_at', '>=', date($date))
                ->join('user_details', 'user_details.user_id', 'users.id')
                ->join('live_models', 'live_models.user_id', 'user_details.user_id')
                ->where('active_status', 1)
                ->offset($start_from)->limit($limit)
                ->get();
            //dd( $models);
            return $models;
        }
        if ($selection_filter_type == 'online_now') {

            Session::put('online_now', true);
            $models = User::select('user_details.user_id', 'live_models.id as live_video_id', 'camera_man_name', 'name', 'active_status', 'cover_img_url')
                ->where('live_models.updated_at', '>=', $formatted_date)
                ->where('user_role', 'model')
                ->join('user_details', 'user_details.user_id', 'users.id')
                ->join('live_models', 'live_models.user_id', 'user_details.user_id')
                ->where('active_status', 1)
                ->orderBy('user_details.created_at', 'ASC')
                ->offset($start_from)->limit($limit)
                ->get();
            //dd( $models);
            return $models;

        }
        if ($selection_filter_type == 'favorites') {

            Session::put('favorites', true);
            $user_id = User::find(Auth::user()->id)->id;
            $models = User::select('user_details.user_id', 'camera_man_name', 'name', 'active_status', 'cover_img_url')
                ->where('live_models.updated_at', '>=', $formatted_date)
                ->where('user_role', 'model')
                ->where('favorite_models.user_id', $user_id)
                ->join('user_details', 'user_details.user_id', 'users.id')
                ->join('favorite_models', 'favorite_models.model_id', 'users.id')
                ->join('live_models', 'live_models.user_id', 'user_details.user_id')
                ->where('active_status', 1)
                ->where('favorite_models.video_type', 'live')
                ->offset($start_from)->limit($limit)
                ->get();
            //dd( $models);
            return $models;
        }
        if ($selection_filter_type == 'english') {
            Session::put('english', true);
            $models = User::select('user_details.user_id', 'live_models.id as live_video_id', 'camera_man_name', 'name', 'active_status', 'cover_img_url')
                ->where('live_models.updated_at', '>=', $formatted_date)
                ->where('user_role', 'model')
                ->where('user_details.languages', 'English')
                ->join('user_details', 'user_details.user_id', 'users.id')
                ->join('live_models', 'live_models.user_id', 'user_details.user_id')
                ->where('active_status', 1)
                ->orderBy('user_details.created_at', 'ASC')
                ->offset($start_from)->limit($limit)
                ->get();
            //dd( $models);
            return $models;
        }
        if ($selection_filter_type == 'french') {
            Session::put('french', true);
            $models = User::select('user_details.user_id', 'live_models.id as live_video_id', 'camera_man_name', 'name', 'active_status', 'cover_img_url')
                ->where('live_models.updated_at', '>=', $formatted_date)
                ->where('user_role', 'model')
                ->where('user_details.languages', 'French')
                ->join('user_details', 'user_details.user_id', 'users.id')
                ->join('live_models', 'live_models.user_id', 'user_details.user_id')
                ->where('active_status', 1)
                ->orderBy('user_details.created_at', 'ASC')
                ->offset($start_from)->limit($limit)
                ->get();
            //dd( $models);
            return $models;
        }
        if ($selection_filter_type == 'german') {
            Session::put('german', true);
            $models = User::select('user_details.user_id', 'live_models.id as live_video_id', 'camera_man_name', 'name', 'active_status', 'cover_img_url')
                ->where('live_models.updated_at', '>=', $formatted_date)
                ->where('user_role', 'model')
                ->where('user_details.languages', 'German')
                ->join('user_details', 'user_details.user_id', 'users.id')
                ->join('live_models', 'live_models.user_id', 'user_details.user_id')
                ->where('active_status', 1)
                ->orderBy('user_details.created_at', 'ASC')
                ->offset($start_from)->limit($limit)
                ->get();
            //dd( $models);
            return $models;
        }
        if ($selection_filter_type == 'portuguese') {
            Session::put('portuguese', true);
            $models = User::select('user_details.user_id', 'live_models.id as live_video_id', 'camera_man_name', 'name', 'active_status', 'cover_img_url')
                ->where('live_models.updated_at', '>=', $formatted_date)
                ->where('user_role', 'model')
                ->where('user_details.languages', 'Portuguese')
                ->join('user_details', 'user_details.user_id', 'users.id')
                ->join('live_models', 'live_models.user_id', 'user_details.user_id')
                ->where('active_status', 1)
                ->orderBy('user_details.created_at', 'ASC')
                ->offset($start_from)->limit($limit)
                ->get();
            //dd( $models);
            return $models;
        }


    }

    public function forgetfiltersession()
    {
        Session::forget('new_model');
        Session::forget('online_now');
        Session::forget('favorites');
        Session::forget('english');
        Session::forget('french');
        Session::forget('german');
        Session::forget('portuguese');
    }

}
