<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;
use Alert;

class CouponController extends Controller
{
    public function ViewCoupon()
    {
       $coupons=Coupon::orderBy('id','DESC')->get();
       return view('backend.coupon.view_coupon', compact('coupons'));
    }

    public function StoreCoupon(Request $request)
    {
        $request->validate([
            'coupon_name'=>'required',
            'coupon_discount'=>'required',
            'coupon_validity'=>'required',
        ],[
            'coupon_name.required'=>'Please Type Coupon name',
            'coupon_discount.required'=>'Please Type Coupon discount',
            'coupon_validity.required'=>'Please Type Coupon Validity Date',


        ]);



        Coupon::insert([
            'coupon_name'=>strtoupper($request->coupon_name) ,
            'coupon_discount'=>$request->coupon_discount,
            'coupon_validity'=>$request->coupon_validity,
            'created_at'=>Carbon::now(),




        ]);
        Alert::toast('Coupon Created Successfully!', 'success');
        return redirect()->back();
    }

    public function EditCoupon($id)
    {
        $coupons=Coupon::findOrFail($id);
        return view('backend.coupon.edit_coupon', compact('coupons'));
    }

    public function UpdateCoupon(Request $request,$id)
    {
        Coupon::findOrFail($id)->update([
            'coupon_name'=>strtoupper($request->coupon_name) ,
            'coupon_discount'=>$request->coupon_discount,
            'coupon_validity'=>$request->coupon_validity,
            'created_at'=>Carbon::now(),

        ]);
        Alert::toast('Coupon Updated Successfully!', 'info');
        return redirect()->route('manage.coupon');
    }

    public function DeleteCoupon($id)
    {
        Coupon::findOrFail($id)->delete();

        Alert::toast('Coupon Deleted Successfully!', 'success');
        return redirect()->back();
    }
}
