<?php

namespace App\Http\Controllers;

use App\Models\model_videoshop;
use App\Models\token_rate;
use App\Models\user_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function getCategories(Request $request)
    {
        $id = $request->name;
        $limit = 20; // 20 videos shown at one page.
        $page_no = isset($request->page_no) ? $request->page_no : 1;
        $start_from = ($page_no - 1) * $limit;

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
            $model_tags=[];
        }

        if ($id == 'Featured') {
            $total_pages = $this->getTotalPages($id);
            $model_videos = $this->featured($start_from, $limit);
            return view('includes.templates.pages.page-porn-categories', [
                'model_videos' => $model_videos,
                'token_packages' => $token_packages,
                'token_rates' => $token_rates,
                'category_type' => $id,
                'total_pages' => $total_pages + 1,
                'page_no' => $page_no,
                'model_tags' => $model_tags
            ]);
        }
        elseif ($id == 'VideoshopCategories') {
            return view('includes.templates.pages.page-porn-videoshopCategories', [
                'token_packages' => $token_packages,
                'token_rates' => $token_rates,
                'model_tags' => $model_tags
            ]);
        }
        else {
            $total_pages = $this->getTotalPages($id);
            $model_videos = $this->categories($id, $start_from, $limit);
            return view('includes.templates.pages.page-porn-categories', [
                'model_videos' => $model_videos,
                'token_packages' => $token_packages,
                'token_rates' => $token_rates,
                'category_type' => $id,
                'total_pages' => $total_pages + 1,
                'page_no' => $page_no,
                'model_tags' => $model_tags
            ]);
        }
    }

    public function featured($start_from, $limit)
    {

        $featured_data = DB::table('model_videoshops')
            ->select(DB::raw('count(model_videoshops.id) as video_count,model_videoshops.id,video_title
                        ,model_videoshops.model_id,name,video_url'))
            ->join('users', 'users.id', '=', 'model_videoshops.model_id')
            ->join('views', 'views.videoshop_id', '=', 'model_videoshops.id')
            ->groupBy(
                'model_videoshops.id',
                'video_title',
                'model_videoshops.model_id',
                'name',
                'video_url'
            )
            ->orderBy('video_count', 'desc')
            ->offset($start_from)->limit($limit)
            ->get();

        return $featured_data;
    }

    public function categories($id, $start_from, $limit)
    {
        $model_data = model_videoshop::select('model_videoshops.id', 'video_title', 'model_id', 'name', 'video_url')
            ->where('model_videoshops.video_category', $id)
            ->join('users', 'users.id', 'model_id')
            ->orderBy('model_videoshops.created_at', 'desc')
            ->offset($start_from)->limit($limit)
            ->get();

        return $model_data;
    }

    // It returns the total pages according to the models videos
    public function getTotalPages($id) {
        $limit = 20; // 20 videos shown at one page.
        if ($id != 'Featured') {
            $model_videoshop = model_videoshop::where('video_category', $id)->count();
        }
        else {
            $model_videoshop = model_videoshop::select('*')
                ->join('views', 'views.videoshop_id', 'model_videoshops.id')
                ->groupBy('videoshop_id')
                ->count();
        }
        $total_pages = $model_videoshop / $limit;
        $total_pages = floor($total_pages);

        return $total_pages;
    }
}
