<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Alert;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;
use Carbon\Carbon;
use App\Mail\OrderMail;

class StripeController extends Controller
{
    public function StripeOrder(Request $request)
    {
        if (Session::has('coupon')) {
            $total_amount=Session::get('coupon')['total_amount'];
        } else {
            $total_amount=round(Cart::total());
        }

        // Set your secret key. Remember to switch to your live secret key in production.
        // See your keys here: https://dashboard.stripe.com/apikeys
        \Stripe\Stripe::setApiKey('sk_test_51L2ZO8H3fDYOvUrAE0Q9S8lTjmMGqs32GcUFM50w1iXWrSCk7PY6zK6grkpygHaeTOLvDWr1rLbSWTNMtK775E2P003gXvEBtW');

        // Token is created using Stripe Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];
        $charge = \Stripe\Charge::create([
        'amount' => $total_amount*100,
        'currency' => 'usd',
        'description' => 'Ndonyo Online Shop',
        'source' => $token,
         'metadata'=>['order_id'=>uniqid()]
        ]);
        // dd($charge);

        $order_id=Order::insertGetId([
            'user_id'=>Auth::id(),
            'county_id'=>$request->county_id,
            'subcounty_id'=>$request->subcounty_id,
            'ward_id'=>$request->ward_id,
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'postal_code'=>$request->postal_code,
            'notes'=>$request->notes,

            'payment_type'=>'Stripe',
            'payment_method'=>'Stripe',
            'payment_type'=>$charge->payment_method,
            'transaction_id'=>$charge->balance_transaction,
            'currency'=>$charge->currency,
            'amount'=>$total_amount,
            'order_number'=>$charge->metadata->order_id,
            'invoce_no'=>'NOS'.mt_rand(10000000,99999999),
            'order_date'=>Carbon::now()->format('d F Y'),
            'order_month'=>Carbon::now()->format('F'),
            'order_year'=>Carbon::now()->format('Y'),
            'status'=>'Pending',
            'created_at'=>Carbon::now(),


        ]);
        $invoice=Order::findOrFail( $order_id);
        $data=[
            'invoce_no'=>$invoice->invoce_no,
            'amount'=>$total_amount,
            'name'=>$invoice->name,
            'email'=>$invoice->email,

        ];
        Mail::to($request->email)->send(new OrderMail($data));



        $carts=Cart::content();
        foreach ($carts as $cart) {
            OrderItem::insert([
                'order_id' =>$order_id,
                'product_id'=>$cart->id,
                'color'=>$cart->options->color,
                'size'=>$cart->options->size,
                'qty'=>$cart->qty,
                'price'=>$cart->price,
                'created_at'=>Carbon::now(),

            ]);
        }

        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        Cart::destroy();

        Alert::success('Success', 'Order placed Successfully!');
        return redirect()->route('dashboard');

            }
}
