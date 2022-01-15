<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\token_rate;
use App\Models\token_package;
use App\Models\user_transaction;
use App\Models\token_transaction;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;


class WalletController extends Controller
{
    public function show(Request $request) 
    {
    //   print_r( $request->begin_date)

        if (isset(Auth::user()->id)) {
            
            $user_id = User::find(Auth::user()->id)->id;
            
            $total_amount = 0;
            
          Session::forget('start_date');
          Session::forget('end_date');
           Session::forget('message_range_data');
  
           
           
            if($request->startdate)
            {
               $total_tokens = token_transaction::where('user_id', $user_id)
            ->whereBetween('created_at', [$request->startdate, $request->enddate])
            ->sum('tokens'); 
           // dd($total_tokens);
           if($total_tokens == '0')
           {
           $request->session()->put('message_range_data', "No Data Found");    
           }
           $request->session()->put('start_date', $request->startdate);
           $request->session()->put('end_date', $request->enddate);
           
            }
            else{
             $total_tokens = token_transaction::where('user_id', $user_id)
            ->sum('tokens');  
            
            }
            
            
           
            if ($total_tokens != 0) {
                $rate = token_rate::all()->last();
                $total_amount = $rate->rates * $total_tokens;
            }
         
                $token_buy = user_transaction::select('user_id', 'user_role', 'tokens', 'amount', 'user_transactions.created_at')
                ->where('user_id', $user_id)
                ->join('users', 'users.id', 'user_id')
                ->get(); 
            
           
            if($request->startdate)
            {
               $token_earning = token_transaction::select('tokens', 'user_role', 'from_user', 'token_transactions.created_at')
                ->where([
                    'user_id' => $user_id,
                    'payment_type' => 'earn'
                ])
                ->whereBetween('token_transactions.created_at', [$request->startdate, $request->enddate])
                ->join('users', 'users.id', 'user_id')
                ->where('user_role', 'model')
                ->get();  
            }
            else
            {
                $token_earning = token_transaction::select('tokens', 'user_role', 'from_user', 'token_transactions.created_at')
                ->where([
                    'user_id' => $user_id,
                    'payment_type' => 'earn'
                ])
                ->join('users', 'users.id', 'user_id')
                ->where('user_role', 'model')
                ->get();  
            }
            // only for models
           

            $count = 0;
            foreach($token_earning as $earn) {
                $name = User::select('name')->where('id', $earn->from_user)->get();
                $token_earning[$count]['name'] = $name[0]->name;
                $count = $count + 1;
            }
             
            return view('includes.templates.wallet.wallet-model', [
                'user_id' => $user_id,
                'total_tokens' => $total_tokens,
                'total_amount' => $total_amount,
                'token_buy' => $token_buy,
                'token_earning' => $token_earning
            ]);
        }
        else {
            redirect('includes.templates.error');
        }
    }

    public function tokenPackages(Request $request)
    {
        if (isset(Auth::user()->id)) {
            $user_id = User::find(Auth::user()->id)->id;
            $token_rates = token_rate::all()->last();

//            $token_packages = token_package::all();
            $token_packages = collect(config("token_packages.items"))->map(function ($pItem){
                $pItem = array_merge($pItem, [
                    "package_type" => Arr::get($pItem, "package_type", null),
                    "bonus" => Arr::get($pItem, "bonus", 0)
                ]);
                return (object) $pItem;
            })->toArray();

//            \Log::debug($token_packages);
//            \Log::debug($token_packages_alt);

            if (!isset($token_packages) && empty($token_packages)) {
                $token_packages = [];
            }

            $total_tokens = token_transaction::where('user_id', $user_id)->sum('tokens');

            return view('includes.templates.wallet.wallet-charge-1', [
                'token_packages' => $token_packages,
                'token_rates' => $token_rates,
                'total_tokens' => $total_tokens
            ]);
        }
        else {
            return response()->json(['status' => 'Need to login first']);
        }
    }

    public function sendToken(Request $request) {
        if (isset(Auth::user()->id)) {
            $user_id = User::find(Auth::user()->id)->id;
            $total_tokens = token_transaction::where('user_id', $user_id)->sum('tokens');
            $model_id = $request->model_id;
            $tokens = $request->tokens;

            if ($total_tokens >= $tokens) {
                $this->saveToken($user_id, (0 - $tokens), NULL,'send');
                $this->saveToken($model_id, $tokens, $user_id, 'earn');

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

    public function saveToken($user_id, $tokens, $from_user, $type) {
        $token_send = new token_transaction();
        $token_send->user_id = $user_id;
        $token_send->tokens = $tokens;
        $token_send->from_user = $from_user;
        $token_send->payment_type = $type;
        $token_send->save();
    }
    // public function setcalenderInterval() {

      

    // }
}
