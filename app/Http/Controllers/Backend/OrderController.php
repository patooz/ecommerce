<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Alert;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\product;
use Auth;
use PDF;
use DB;


class OrderController extends Controller
{
    public function PendingOrders()
    {
        $orders=Order::where('status','Pending')->orderBy('id','DESC')->get();
        return view('backend.orders.pending_orders',compact('orders'));
    }

    public function PendingorderDetails($order_id)
    {
        $order=Order::with('county','subcounty','ward','user')->where('id',$order_id)->first();

        $orderItem=OrderItem::with('products')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        return view('backend.orders.pending_order_details',compact('order','orderItem'));
    }

    public function ConfirmedOrders()
    {
        $orders=Order::where('status','Confirmed')->orderBy('id','DESC')->get();
        return view('backend.orders.confirmed_orders',compact('orders'));
    }

    public function ProcessingOrders()
    {
        $orders=Order::where('status','Processing')->orderBy('id','DESC')->get();
        return view('backend.orders.processing_orders',compact('orders'));
    }

    public function Pickedorders()
    {
        $orders=Order::where('status','Picked')->orderBy('id','DESC')->get();
        return view('backend.orders.picked_orders',compact('orders'));
    }

    public function ShippedOrders()
    {
        $orders=Order::where('status','Shipped')->orderBy('id','DESC')->get();
        return view('backend.orders.shipped_orders',compact('orders'));
    }

    public function DeliveredOrders()
    {
        $orders=Order::where('status','Delivered')->orderBy('id','DESC')->get();
        return view('backend.orders.delivered_orders',compact('orders'));
    }

    public function CanceledOrders()
    {
        $orders=Order::where('status','Canceled')->orderBy('id','DESC')->get();
        return view('backend.orders.canceled_orders',compact('orders'));
    }

     public function trashedOrders()
    {
        $orders=Order::onlyTrashed()->orderBy('id','DESC')->get();
        return view('backend.orders.trashed_orders',compact('orders'));
    }

    public function confirmPendindOrder($order_id)
    {
        Order::findOrFail($order_id)->update(['status'=> 'Confirmed']);

        // Alert::toast('Order Confirmed Successfully!', 'success');
       

        $notification = array(
            'message' => 'Order Confirmed Successfully!',
            'alert-type' => 'success'


        );
        return redirect()->route('pending.orders')-> with($notification);
    }

    public function processConfirmedOrder($order_id)
    {
         Order::findOrFail($order_id)->update(['status'=> 'Processing']);

        // Alert::toast('Order Confirmed Successfully!', 'success');
       

        $notification = array(
            'message' => 'Order Processed Successfully!',
            'alert-type' => 'success'


        );
        return redirect()->route('confirmed.orders')-> with($notification);
    }

    public function pickedOrder($order_id)
    {
         Order::findOrFail($order_id)->update(['status'=> 'Picked']);

        // Alert::toast('Order Confirmed Successfully!', 'success');
       

        $notification = array(
            'message' => 'Order  Picked!',
            'alert-type' => 'success'


        );
        return redirect()->route('processing.orders')-> with($notification);
    }

    public function shipOrder($order_id)
    {
         Order::findOrFail($order_id)->update(['status'=> 'Shipped']);

        // Alert::toast('Order Confirmed Successfully!', 'success');
       

        $notification = array(
            'message' => 'Order  Shipped Successfully!',
            'alert-type' => 'success'


        );
        return redirect()->route('picked.orders')-> with($notification);
    }

    public function deliveredOrder($order_id)
    {
        

        $product=OrderItem::where('order_id', $order_id)->get();
        foreach ($product as $item) {
            Product::where('id', $item->product_id)->update([
                'product_qty' => DB::raw('product_qty-'.$item->qty),
            ]);
        }

         Order::findOrFail($order_id)->update(['status'=> 'Delivered']);
       

        $notification = array(
            'message' => 'Order Delivered Successfully!',
            'alert-type' => 'success'


        );
        return redirect()->route('shipped.orders')-> with($notification);
    }

    public function cancelOrder($order_id)
    {
        Order::findOrFail($order_id)->update(['status'=> 'Canceled']);
        
        $notification = array(
            'message' => 'Order Canceled!',
            'alert-type' => 'success'


        );
        return redirect()->back()-> with($notification);
    }

    public function restoreCanceledOrder($order_id)
    {
        Order::findOrFail($order_id)->update(['status'=> 'Pending']);
        
        $notification = array(
            'message' => 'Order Restored To Pending!',
            'alert-type' => 'success'


        );
        return redirect()->route('canceled.orders')-> with($notification);
    }

    public function restoreDeleted($order_id)
    {
        Order::findOrFail($order_id)->update(['status'=> 'Pending']);
        
        $notification = array(
            'message' => 'Order Restored!',
            'alert-type' => 'success'


        );
        return redirect()->route('canceled.orders')-> with($notification);
    }


    public function softDeleteOrder($order_id)
    {
        Order::findOrFail($order_id)->delete();
        $notification = array(
            'message' => 'Order Deleted Successfully!',
            'alert-type' => 'success'


        );
        return redirect()->route('canceled.orders')-> with($notification);
    }

    public function adminDownloadInvoice($order_id)
    {
         $order=Order::with('county','subcounty','ward','user')->where('id',$order_id)->first();

        $orderItem=OrderItem::with('products')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        // return view('frontend.user.orders.order_invoice',compact('order','orderItem'));

        $pdf = PDF::loadView('backend.orders.order_invoice', compact('order','orderItem'))->setPaper('a4')->setOptions([
            'tempDir'=> public_path(),
            'chroot'=>public_path()
        ]);
        return $pdf->download('invoice.pdf');
    }




}
