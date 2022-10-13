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

    public function returnOrder(Request $request,$order_id)
    {
        Order::findOrFail($order_id)->update([
            'returned_date' => Carbon::now()->format('d F Y'),
            'returned_reason' => $request->returned_reason,
            'returned_order' => 1

        ]);

        $notification = array(
            'message' => 'Reason Submitted Successfully!',
            'alert-type' => 'success'


        );
        return redirect()->route('my.orders')-> with($notification);
    }

    public function returnedOrdersList()
    {
         $orders=Order::where('user_id',Auth::id())->where('returned_reason','!=',NULL)->orderBy('id','DESC')->get();
        return view('frontend.user.orders.returned_orders',compact('orders'));
    }

    public function canceledOrdersList()
    { 
        $orders=Order::where('user_id',Auth::id())->where('status','Canceled')->orderBy('id','DESC')->get();
        return view('frontend.user.orders.canceled_orders',compact('orders'));
    }

    public function trackOrder(Request $request)
    {
        $invoice = $request->invoice_number;
        $track =Order::where('invoce_no', $invoice)->first();
        // $order=Order::where('id', $track)->get();
        // $orderItem=OrderItem::where('id', $order)->get();

        if ($track) {
            // echo "<prev>";
            // print_r($order);

            return view('frontend.order_tracking.track_order', compact('track'));
        } else {
             Alert::error('Error', 'Invoice not Found. Please Try Again');
             return redirect()->back();
        }
        
    }

}
