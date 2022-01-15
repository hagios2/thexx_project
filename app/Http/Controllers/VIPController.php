<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\model_videoshop;
use App\Models\token_transaction;
use App\Models\user_transaction;
use App\Models\download_video;
use App\Models\token_package;
use App\Models\token_rate;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class VIPController extends Controller
{

    public function getDetails()
    {
        if (isset(Auth::user()->id)) {
            $user_id = User::find(Auth::user()->id)->id;
            $token_rates = token_rate::all()->last();

            $token_packages = token_package::where('package_type', 'vip')->get();
            if (!isset($token_packages) && empty($token_packages)) {
                $token_packages = [];
            }

            $total_tokens = token_transaction::where('user_id', $user_id)->sum('tokens');
            $user_transaction = user_transaction::where([
                'user_id' => $user_id,
                'package_type' => 'vip'
            ])->get();

            if (!isset($user_transaction[0]) && empty($user_transaction[0])) {
                $user_transaction[0] = '';
            }

            return view('includes.templates.user.vip-account-user', [
                'token_packages' => $token_packages,
                'token_rates' => $token_rates,
                'total_tokens' => $total_tokens,
                'user_transaction' => $user_transaction[0]
            ]);
        }
        else {
            return redirect('includes.templates.error');
        }
    }

    public function checkAuthenticatedUser(Request $request)
    {
        if (isset(Auth::user()->id)) {
            $user_id = Auth::user()->id;
            $model_id = $request->model_id;
            $video_id = $request->video_id;
            $model_video = model_videoshop::select('video_url')
                ->where([
                    'id' => $video_id,
                    'model_id' => $model_id
                ])
                ->get();

            $vip_status = user_transaction::select('package_type')
                ->where('user_id', $user_id)
                ->latest('created_at')
                ->first();

            $total_tokens = token_transaction::where('user_id', $user_id)->sum('tokens');

            return response()->json([
                'status' => 'yes',
                'video_url' => $model_video[0]->video_url,
                'vip_status' => $vip_status,
                'total_tokens' => $total_tokens
            ]);
        }
        else {
            return response()->json(['status' => 'no']);
        }
    }

    public function downloadAccess(Request $request)
    {
        $model_id = $request->model_id;
        $video_id = $request->video_id;
        $tokens = $request->tokens;
        $user_id = Auth::user()->id;

        if (isset($user_id)) {
            $total_tokens = token_transaction::where('user_id', $user_id)->sum('tokens');

            if ($total_tokens >= $tokens) {
                $wallet_controller = new WalletController();
                $wallet_controller->saveToken($user_id, (0 - $tokens), NULL,'send');
                $wallet_controller->saveToken($model_id, $tokens, $user_id, 'earn');

                $download_access = new download_video();
                $download_access->user_id = $user_id;
                $download_access->model_id = $model_id;
                $download_access->video_id = $video_id;
                $download_access->access = '1';
                $download_access->save();

                return response()->json(['status' => 'yes']);
            }
            else {
                return response()->json(['status' => 'no_token']);
            }
        }
        else {
            return response()->json(['status' => 'no']);
        }
    }
}
