<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class ReturnOrderController extends Controller
{
    public function allRequests()
    {
        $orders =Order::where('returned_order', 1)->orderBy('id', 'DESC')->get();
        return view('backend.returned_orders.return_requests', compact('orders'));
    }

    public function approveReturnedRequests(Request $request,$request_id)
    {
        Order::where('id', $request_id)->update(['returned_order' => 2]);


        $notification = array(
            'message' => 'Return Request Approved!',
            'alert-type' => 'success'


        );
        return redirect()->back()-> with($notification);
    }

    public function approvedReturnedRequests()
    {
        $orders =Order::where('returned_order', 2)->orderBy('id', 'DESC')->get();
        return view('backend.returned_orders.approved_return_requests', compact('orders'));
    }
}
