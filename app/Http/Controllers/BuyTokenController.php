<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\User;
use App\Models\user_transaction;
use App\Models\token_transaction;
use App\Models\payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BuyTokenController extends Controller
{

    public function displayScreen(Request $request)
    {
        Session::forget('success');
        Session::forget('error');
        $amount = Session::get('amount');
        $tokens = Session::get('tokens');
        $bonus = Session::get('bonus');

        if (Session::get('securetoken') == $request->token) {

            Session::put('securetoken', '');
            $total_tokens = token_transaction::where('user_id', Auth::user()->id)->sum('tokens');

            return view('includes.templates.wallet.wallet-charge-2', [
                'amount' => $amount,
                'tokens' => $tokens,
                'bonus' => $bonus,
                'total_tokens' => $total_tokens
            ]);
        } 
        else {
            return view('includes.templates.error');
        }
    }

    public function storeValues(Request $request)
    {
        if (isset(Auth::user()->id)) {
            Session::put('package_id', $request->package_id);
            Session::put('tokens', $request->tokens);
            Session::put('amount', $request->amount);
            Session::put('bonus', $request->bonus);
            Session::put('package_type', $request->package_type);
            Session::put('securetoken', $request->securetoken);
            Session::put('transaction_type', $request->transaction_type);

            return response()->json(['status' => 'yes']);
        }
        else {
            return response()->json(['status' => 'no']);
        }
    }

    public function payment(Request $request)
    {

        $response = '';
        $input = $request->all();
  
        $api = new Api(config('env_variables.razor_pay_key'), config('env_variables.razor_pay_secret'));
  
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
  
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
  
            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }

        $order_id = $this->afterSuccessfulPayment($response);

        Session::put('success_' . Auth::user()->id, 'Payment successful!! , Save order id ' . $order_id . ' for your reference.');
        return redirect('/wallet-model');
    }

    public function addTokenDetails($order_id)
    {
        $user_id = User::find(Auth::user()->id)->id;

        $user_transaction = new user_transaction();
        $user_transaction->user_id = $user_id;
        $user_transaction->package_id = Session::get('package_id');
        $user_transaction->tokens = Session::get('tokens');
        $user_transaction->amount = Session::get('amount');
        $user_transaction->package_type = Session::get('package_type');
        $user_transaction->order_id = $order_id;
        $user_transaction->transaction_type = Session::get('transaction_type');
        $user_transaction->save();

        $token_transaction = new token_transaction();
        $token_transaction->user_id = $user_id;
        $token_transaction->tokens = Session::get('tokens');
        $token_transaction->payment_type = 'buy';
        $token_transaction->save();
    }

    public function afterSuccessfulPayment($request)
    {
        $user_id = User::find(Auth::user()->id)->id;
        $order_id = $this->orderIdGenerate(9);

        $payment = new payment();
        $payment->user_id = $user_id;
        $payment->payment_id = $request->id;
        $payment->order_id = $order_id;
        $payment->amount = ($request->amount) / 100;
        $payment->currency = $request->currency;
        $payment->save();

        $this->addTokenDetails($order_id);
        return $order_id;
    }

    public function orderIdGenerate($length)
    {
        $order_id = '';
        for ($i = 0; $i < $length; $i++) {
            $order_id .= mt_rand(0, 9);
        }
        return $order_id;
    }
}
