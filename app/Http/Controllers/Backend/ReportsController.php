<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DateTime;
use App\Models\Order;

class ReportsController extends Controller
{
    public function viewReports()
    {
        return view('backend.reports.view_reports');
    }

    public function reportsByDate(Request $request)
    {
        // return $request->all();

        $date=new DateTime($request->date);
        $formatDate=$date->format('d F Y');

        // return $formatDate;

        $orders=Order::where('order_date',$formatDate)->latest()->get();
        return view('backend.reports.show_reports', compact('orders'));
    }

    public function reportsByMonth(Request $request)
    {
        $orders=Order::where('order_month',$request->month)->where('order_year',$request->year_name)->latest()->get();
        return view('backend.reports.show_reports', compact('orders'));
    }

    public function reportsByYear(Request $request)
    {
        $orders=Order::where('order_year',$request->year)->latest()->get();
        return view('backend.reports.show_reports', compact('orders'));
    }
}
