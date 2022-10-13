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
use App\Models\Product;
use App\Models\OrderItem;
use Auth;
use Carbon\Carbon;
use App\Mail\OrderMail;

class CashController extends Controller
{
    public function CashOrder(Request $request)
    {
        if (Session::has('coupon')) {
            $total_amount=Session::get('coupon')['total_amount'];
        } else {
            $total_amount=round(Cart::total());
        }



         $products=Product::where('id', 'id')->get();
        // $order_items=OrderItem::where('product_id','order_id')->get();
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

            'payment_type'=>'Cash on Delivery',
            'payment_method'=>'Cash on Delivery',
            'currency'=>'Ksh',
            'amount'=>$total_amount,
            'invoce_no'=>'NOS'.mt_rand(10000000,99999999),
            'order_date'=>Carbon::now()->format('d F Y'),
            'order_month'=>Carbon::now()->format('F'),
            'order_year'=>Carbon::now()->format('Y'),
            'status'=>'Pending',
            'created_at'=>Carbon::now(),


        ]);
        $invoice=Order::findOrFail( $order_id);
        // $product=Product::findOrFail( $order_id);
        // $order_item=OrderItem::findOrFail($order_items);

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

        Mail::to($request->email)->send(new OrderMail($data,$data1));

        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        Cart::destroy();

        Alert::success('Success', 'Order placed Successfully!');
        return redirect()->route('dashboard');


    }
}
