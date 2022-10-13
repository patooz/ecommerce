<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Alert;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;
use Carbon\Carbon;
use App\Mail\OrderMail;
use PDF;

class AllUserController extends Controller
{
    public function Myorders()
    {
        $orders=Order::where('user_id',Auth::id())->orderBy('id','DESC')->get();
        return view('frontend.user.orders.view_orders',compact('orders'));
    }

    public function OrderDetails($order_id)
    {
        $order=Order::with('county','subcounty','ward','user')->where('id',$order_id)->where('user_id',Auth::id())->first();

        $orderItem=OrderItem::with('products')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        return view('frontend.user.orders.order_details',compact('order','orderItem'));

    }

    public function DownloadInvoice($order_id)
    {
        $order=Order::with('county','subcounty','ward','user')->where('id',$order_id)->where('user_id',Auth::id())->first();

        $orderItem=OrderItem::with('products')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        // return view('frontend.user.orders.order_invoice',compact('order','orderItem'));

        $pdf = PDF::loadView('frontend.user.orders.order_invoice', compact('order','orderItem'))->setPaper('a4')->setOptions([
            'tempDir'=> public_path(),
            'chroot'=>public_path()
        ]);
        return $pdf->download('invoice.pdf');
    }
}
