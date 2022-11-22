<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mpesa;
use SmoDav\Mpesa\Laravel\Facades\STK;
use SmoDav\Mpesa\Laravel\Facades\Registrar;
use SmoDav\Mpesa\Laravel\Facades\Simulate;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\Models\MpesaTransaction;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Auth;
use Alert;
use Carbon\Carbon;
use App\Mail\OrderMail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class MpesaController extends Controller
{
    public function lipaNaMpesaPassword()
    {
        $lipa_time = Carbon::rawParse('now')->format('YmdHms');
        $passkey = env('MPESA_PASS_KEY');
        $BusinessShortCode = 174379;
        $timestamp =$lipa_time;
        $lipa_na_mpesa_password = base64_encode($BusinessShortCode.$passkey.$timestamp);
        return $lipa_na_mpesa_password;
    }
    /**
     * Lipa na M-PESA STK Push method
     * */
    public function customerMpesaSTKPush(Request $request)
    {
        if (Session::has('coupon')) {
            $total_amount=Session::get('coupon')['total_amount'];
        } else {
            $total_amount=round(Cart::total());
        }
        $totalCart=$request->cartTotal;
        $var = intval(preg_replace('/[^\d.]/', '', $totalCart));
        $user=$request->user;




        $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$this->generateAccessToken()));
        $curl_post_data = [
            //Fill in the request parameters with valid values
            'BusinessShortCode' => 174379,
            'Password' => $this->lipaNaMpesaPassword(),
            'Timestamp' => Carbon::rawParse('now')->format('YmdHms'),
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => $totalCart,
            'PartyA' => $request->phone, // replace this with your phone number
            'PartyB' => 174379,
            'PhoneNumber' => $request->phone, // replace this with your phone number
            'CallBackURL' => 'https://coded.rf.gd/ecomm/store/checkout/',
            'AccountReference' => "Ndonyo Online",
            'TransactionDesc' => "Testing stk push on sandbox"
        ];
        $data_string = json_encode($curl_post_data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        $curl_response = curl_exec($curl);
        // dd($user);
        // return $curl_response;
        $products=Product::where('id', 'id')->get();

        $order_id=Order::insertGetId([
            'user_id'=>$user,
            'county_id'=>$request->county_id,
            'subcounty_id'=>$request->subcounty_id,
            'ward_id'=>$request->ward_id,
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'postal_code'=>$request->postal_code,
            'notes'=>$request->notes,




            'payment_type'=>'MPESA',
            'payment_method'=>'MPESA',
            'amount'=>$totalCart,
            // 'order_number'=>$charge->metadata->order_id,
            'invoce_no'=>'NOS'.mt_rand(10000000,99999999),
            'order_month'=>Carbon::now()->format('F'),
            'order_year'=>Carbon::now()->format('Y'),
            'status'=>'Pending',
            'created_at'=>Carbon::now(),

            "TransactionType"=> "",
            "TransID"=> "LGR219G3EY",
            "TransTime"=> "20200172104247",
            "TransAmount"=>$totalCart,
            "BusinessShortCode"=> "600134",
            "BillRefNumber"=> "XYZ",
            "InvoiceNumber"=> "",
            "OrgAccountBalance"=> "49197.00",
            "ThirdPartyTransID"=> "1234567890" ,
            "MSISDN"=> $request->phone,
            "FirstName"=> "PATRICK",
            "MiddleName"=> "KIPKOECH",
            "LastName"=> "KIPSUM"


        ]);
        $invoice=Order::findOrFail( $order_id);
        $data=[
            'invoce_no'=>$invoice->invoce_no,
            'amount'=>$total_amount,
            'name'=>$invoice->name,
            'email'=>$invoice->email,
            'phone'=>$invoice->phone,
            'postal_code'=>$invoice->postal_code,
            'order_date'=>$invoice->order_date,

            // 'color'=>$order_item->options->color,
            // 'size'=>$order_item->options->size,
            // 'qty'=>$order_item->qty,
            // 'price'=>$order_item->price,

            // 'product_name_en'=>$order_item->product_name_en,
            // 'product_thumbnail'=>$order_item->product_thumbnail,



        ];
        $carts=Cart::content();
        foreach ($carts as $cart) {
    $order_items=OrderItem::insertGetId([
                'order_id' =>$order_id,
                'product_id'=>$cart->id,
                'color'=>$cart->options->color,
                'size'=>$cart->options->size,
                'qty'=>$cart->qty,
                'price'=>$cart->price,
                'created_at'=>Carbon::now(),

            ]);

            $order_item=OrderItem::findOrFail($order_items);

            $data1=[
                'color'=>$cart->options->color,
                'size'=>$cart->size,
                'qty'=>$cart->qty,
                'price'=>$cart->price,
            ];


        }



        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        Cart::destroy();

        Alert::success('Success', 'Order placed Successfully!');
        return redirect()->route('dashboard');

    }
    public function generateAccessToken()
    {
        $consumer_key="sMpgnYW62glBlxPXbyTBEGdPib8eJLOL";
        $consumer_secret="IcK2PkAFArVVVffU";
        $credentials = base64_encode($consumer_key.":".$consumer_secret);
        $url = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Basic ".$credentials));
        curl_setopt($curl, CURLOPT_HEADER,false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        $access_token=json_decode($curl_response);
        return $access_token->access_token;
    }
    /**
     * J-son Response to M-pesa API feedback - Success or Failure
     */
    public function createValidationResponse($result_code, $result_description){
        $result=json_encode(["ResultCode"=>$result_code, "ResultDesc"=>$result_description]);
        $response = new Response();
        $response->headers->set("Content-Type","application/json; charset=utf-8");
        $response->setContent($result);
        return $response;
    }

     /**
     *  M-pesa Validation Method
     * Safaricom will only call your validation if you have requested by writing an official letter to them
     */
    public function mpesaValidation(Request $request)
    {
        $result_code = "0";
        $result_description = "Accepted validation request.";
        return $this->createValidationResponse($result_code, $result_description);
    }

    /**
     * M-pesa Transaction confirmation method, we save the transaction in our databases
     */
    public function mpesaConfirmation(Request $request)
    {
        $content=json_decode($request->getContent());
        $mpesa_transaction = new Order();
        $mpesa_transaction->TransactionType = $content->TransactionType;
        $mpesa_transaction->TransID = $content->TransID;
        $mpesa_transaction->TransTime = $content->TransTime;
        $mpesa_transaction->TransAmount = $content->TransAmount;
        $mpesa_transaction->BusinessShortCode = $content->BusinessShortCode;
        $mpesa_transaction->BillRefNumber = $content->BillRefNumber;
        $mpesa_transaction->InvoiceNumber = $content->InvoiceNumber;
        $mpesa_transaction->OrgAccountBalance = $content->OrgAccountBalance;
        $mpesa_transaction->ThirdPartyTransID = $content->ThirdPartyTransID;
        $mpesa_transaction->MSISDN = $content->MSISDN;
        $mpesa_transaction->FirstName = $content->FirstName;
        $mpesa_transaction->MiddleName = $content->MiddleName;
        $mpesa_transaction->LastName = $content->LastName;
        $mpesa_transaction->save();
        // Responding to the confirmation request
        $response = new Response();
        $response->headers->set("Content-Type","text/xml; charset=utf-8");
        $response->setContent(json_encode(["C2BPaymentConfirmationResult"=>"Success"]));
        return $content;
    }

    /**
     * M-pesa Register Validation and Confirmation method
     */
    public function mpesaRegisterUrls()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl');
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization: Bearer '. $this->generateAccessToken()));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode(array(
            'ShortCode' => "600141",
            'ResponseType' => 'Completed',
            'ConfirmationURL' => "https://coded.rf.gd/ecomm/api/transaction/confirmation",
            'ValidationURL' => "https://coded.rf.gd/ecomm/api/validation"
        )));
        $curl_response = curl_exec($curl);
        echo $curl_response;
    }


    public function checkoutPage()
    {
       return view('checkout.checkout');
    }

    public function confirmPage()
    {
        return view('checkout.confirm');
    }
}
