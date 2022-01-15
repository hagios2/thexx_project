<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\like;
use App\Models\live_model;
use App\Models\favorite_model;

class LiveCamModelController extends Controller
{
    public function likeStatus(Request $request)
    {
       

        if (!isset(Auth::user()->id)) {
            $user_id = '';
        }
        else {
            $user_id = User::find(Auth::user()->id)->id;
        }

        $like = new like();
        $live_video_id = live_model::select('live_models.id')
            ->where('user_id', $request->model_id)
            ->where('active_status', 1)
            ->get();

        if ($user_id != '' && $request->video_type == 'live') {
            if ($request->status == '1') {
                $like->model_id = $request->model_id;
                $like->user_id = $user_id;
                $like->live_video_id = $live_video_id[0]->id ;
                $like->video_type = 'live';
                $like->videoshop_id = NULL;
                $like->status = 1;
                $like->save();
            }
            else {
                $like = like::where('model_id', $request->model_id)
                    ->where('user_id', $user_id)
                    ->delete();
            }
        }
        elseif($user_id != '' && $request->video_type == 'video_shop')
        {
            if ($request->status == '1') {
                $like->model_id = $request->model_id;
                $like->user_id = $user_id;
                $like->live_video_id = NULL;
                $like->video_type = 'video_shop';
                $like->videoshop_id = $request->video_id;
                $like->status = 1;
                $like->save();
            }
            else {
                $like = like::where('model_id', $request->model_id)
                    ->where('user_id', $user_id)
                    ->delete();
            }
        }
        else {
            return response()->json([
                'message' => 'anonymous'
            ]);
        }
    }

    public function addFavorite(Request $request)
    {
        if($request->page == 'true')
        {
            $deleted_id = favorite_model::where([
                'model_id' => $request->model_id,
                'video_id' => $request->video_id
            ])->delete();

            return response()->json(['success' => 'yes']);
        }

        else {
            if (!isset(Auth::user()->id)) {
                $user_id = '';
            }
            else {
                $user_id = User::find(Auth::user()->id)->id;
            }

            $favorite_model = new favorite_model();
            if ($user_id != '') {
                if ($request->status == '1') {
                    $favorite_model->model_id = $request->model_id;
                    $favorite_model->user_id = $user_id;
                    $favorite_model->status = 1;
                    $favorite_model->video_type = $request->type;
                    $favorite_model->video_id = $request->video_id;
                    $favorite_model->save();
                }
                else {
                    $favorite_model = favorite_model::where('model_id', $request->model_id)
                        ->where([
                            'user_id' => $user_id,
                            'video_id' => $request->video_id
                        ])
                        ->delete();
                }
            }
            else {
                return response()->json([
                    'message' => 'anonymous'
                ]);
            }
        }
    }
}
