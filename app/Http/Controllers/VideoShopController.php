<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\model_videoshop;
use App\Models\favorite_model;
use App\Models\User;
use App\Models\token_package;
use App\Models\token_rate;
use App\Models\user_detail;
use Illuminate\Support\Facades\Auth;

class VideoShopController extends Controller
{
    public function getVideoshop(Request $request)
    {

        $limit = 20; // 20 videos shown at one page.
        $page_no = isset($request->page_no) ? $request->page_no : 1;
        $start_from = ($page_no - 1) * $limit;

        $favorite_models = [];

        if (!isset(Auth::user()->id)) {
            $user_id = '';
        } else {
            $user_id = User::find(Auth::user()->id)->id;
        }

        $total_pages = $this->getTotalPages();
        $model_videos = model_videoshop::select('model_videoshops.id', 'video_title', 'model_id', 'name', 'video_url')
            ->join('users', 'users.id', 'model_id')
            ->orderBy('model_videoshops.created_at', 'desc')
            ->offset($start_from)->limit($limit)
            ->get()
            ->map(function ($pItem) {
                $pItem->final_video_url = str_replace("/public", "", config('env_variables.upload_path')) . $pItem->video_url;

                return $pItem;
            });


        $favorite_model = favorite_model::where([
            'user_id' => $user_id,
            'video_type' => 'no_live'
        ])->get();


        if (!isset($favorite_model) && empty($favorite_model)) {
            $favorite_models = [];
        } else {
            for ($i = 0; $i < count($favorite_model); $i++) {
                $favorite_models[$favorite_model[$i]->video_id] = 1;
            }
        }

        $token_rates = token_rate::all()->last();

        $token_packages = token_package::all();
        if (!isset($token_packages) && empty($token_packages)) {
            $token_packages = [];
        }

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

        return view('includes.templates.pages.page-videoshop', [
            'model_videos' => $model_videos,
            'page_no' => $page_no,
            'total_pages' => $total_pages + 1,
            'favorite_models' => $favorite_models,
            'favorite_page' => 'false',
            'token_packages' => $token_packages,
            'token_rates' => $token_rates,
            'model_tags' => $model_tags
        ]);
    }

    // It returns the total pages according to the live models
    public function getTotalPages()
    {
        $limit = 20; // 20 videos shown at one page.
        $model_videoshop = model_videoshop::all()->count();
        $total_pages = $model_videoshop / $limit;
        $total_pages = floor($total_pages);

        return $total_pages;
    }
}
