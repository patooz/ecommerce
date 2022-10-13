<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipCounty;
use App\Models\ShipSubcounty;
use App\Models\ShipWard;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function GetSubcounty($county_id)
    {
        $subcounties=ShipSubcounty::where('county_id',$county_id)->orderBy('subcounty_name','ASC')->get();

        return json_encode($subcounties);
    }

    public function GetWard($subcounty_id)
    {
        $ward=ShipWard::where('subcounty_id',$subcounty_id)->orderBy('ward_name','ASC')->get();

        return json_encode($ward);
    }

    public function StoreCheckout(Request $request)
    {
    //    dd($request->all());
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['postal_code'] = $request->postal_code;
        $data['county_id'] = $request->county_id;
        $data['subcounty_id'] = $request->subcounty_id;
        $data['ward_id'] = $request->ward_id;
        $data['notes'] = $request->notes;
        $data['created_at'] = Carbon::now();

        $cartTotal=Cart::total();


        if ($request->payment_method == 'stripe') {
            return view('frontend.payments.stripe', compact('data','cartTotal'));

        }elseif ($request->payment_method == 'card') {
            return view('frontend.payments.card', compact('data'));

        }elseif ($request->payment_method == 'cash') {
            return view('frontend.payments.cash', compact('data','cartTotal'));

        }elseif ($request->payment_method == 'mpesa') {
            return view('frontend.payments.mpesa_payment', compact('data','cartTotal'));
        }





        else {
            # code...
        }

    }
}
