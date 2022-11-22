<?php

namespace App\Http\Controllers;
use App\Models\MpesaStkpush;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;



class TransactionController extends Controller
{
    //Initiate STK Push
    public function stkPushRequest(Request $request){


        $accountReference='Transaction#'.Str::random(10);

        $amount= $request->amount;
        $phone=$this->formatPhone($request->phone_number);

        $mpesa=new MpesaStkpush();
        $stk=$mpesa->lipaNaMpesa(1,$phone,$accountReference);
        $invalid=json_decode($stk);

        if(@$invalid->errorCode){
            Session::flash('mpesa-error', 'Invalid phone number!');
            Session::flash('alert-class', 'alert-danger');

            return back();
        }
        // dd($accountReference);
        // return $accountReference;

        return redirect('confirm/page'.encrypt($accountReference));


    }

    public function checkTransactionStatus($transactionCode){

        $mpesa=new MpesaStkpush();
        $status=$mpesa->status($transactionCode);

        $tStatus = $status->{'ResponseCode'};

        return $tStatus;
    }

    public function formatPhone($phone)
    {
        $phone = 'hfhsgdgs' . $phone;
        $phone = str_replace('hfhsgdgs0', '', $phone);
        $phone = str_replace('hfhsgdgs', '', $phone);
        $phone = str_replace('+', '', $phone);
        if (strlen($phone) == 9) {
            $phone = '254' . $phone;
        }
        return $phone;
    }
}
