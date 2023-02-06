<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\ShipCounty;
use App\Models\Coupon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    public function AddToCart(Request $request, $id)
    {
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        $product=Product::findOrFail($id);

        if ($product->discount_price == null) {
            Cart::add([
            'id' => $id,
            'name' => $request->product_name,
            'qty' => $request->quantity,
            'price' => $product->selling_price,
            'weight' => 1,
            'options' => [
                'image' => $product->product_thumbnail,
                'color' => $request->color,
                'size' => $request->size,
                     ]
                ]);

                    return response()->json(['success'=> 'Successfully Added to Cart!']);

        } else {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'color' => $request->color,
                    'size' => $request->size,
                         ]
                    ]);

                    return response()->json(['success'=> 'Successfully Added to Cart!']);
        }


    } //end method

    public function MiniCart()
    {
        $cart=Cart::content();
        $cartQty=Cart::count();
        $cartTotal=Cart::total();

        return response()->json(array(
            'cart'=>$cart,
            'cartQty'=>$cartQty,
            'cartTotal'=>round($cartTotal),
        ));
    }

    public function RemoveMiniCartItems($rowId)
    {
        Cart::remove($rowId);

        return response()->json(['success'=> 'Success!Item Removed From Cart']);
    }

    public function AddToWishList(Request $request,$productId)
    {
        if (Auth::check()) {
            $exist=Wishlist::where('user_id', Auth::id())->where('product_id',$productId)->first();

            if (!$exist) {
                Wishlist::insert([
                    'user_id'=>Auth::id(),
                    'product_id'=>$productId,
                    'created_at'=>Carbon::now(),

                ]);

                return response()->json(['success'=> 'Success! Item Added to Wishlist']);
            } else {
                return response()->json(['error'=> 'This Items is Already in your Wishlist']);
            }




        } else {
             return response()->json(['error'=> 'You Must Login to Add Items to Wishlist']);

        }

    }

    public function ApplyCoupon(Request $request)
    {
        $coupon=Coupon::where('coupon_name',$request->coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();
        if ($coupon) {
            Session::put('coupon',[
                'coupon_name'=>$coupon->coupon_name,
                'coupon_discount'=>$coupon->coupon_discount,
                'discount_amount'=>round(Cart::total() * $coupon->coupon_discount/100),
                'total_amount'=>round(Cart::total()-Cart::total() * $coupon->coupon_discount/100)

            ]);

            return response()->json(array(
                'validity'=> true,
                'success'=> 'Success! Coupon Applied'
            ));


        } else {
            return response()->json(['error'=> 'Error! Invalid Coupon']);
        }

    }

    public function CouponCalculation()
    {
        if (Session::has('coupon')) {
            return response()->json(array(
                'sub_total'=>Cart::total(),
                'coupon_name'=>session()->get('coupon')['coupon_name'],
                'coupon_disount'=>session()->get('coupon')['coupon_discount'],
                'discount_amount'=>session()->get('coupon')['discount_amount'],
                'total_amount'=>session()->get('coupon')['total_amount']
            ));
        } else {
           return response()->json(array(
               'total'=>Cart::total()
           ));
        }

    }


    public function removeCoupon()
    {
        Session::forget('coupon');

        return response()->json(['success'=>'Coupon Removed successfully!']);
    }

    public function Checkout()
    {
       if (Auth::check()) {
           if (Cart::total() >0) {
            $carts=Cart::content();
            $cartQty=Cart::count();
            $cartTotal=Cart::total();
            $vat = round(str_replace(',', '',$cartTotal) * 16/100);
            $vat_format = number_format($vat);
            $grand_total = str_replace(',', '',$cartTotal) + $vat;
            $grand_total_format = number_format($grand_total, 2 );
            $counties=ShipCounty::orderBy('county_name','ASC')->get();

            return view('frontend.checkout.view_checkout', compact('carts','cartQty','cartTotal','counties', 'vat_format', 'grand_total_format'));

           }else{

            Alert::error('Error', 'No item in your Cart');
            return redirect()->to('/');

           }
       } else {

        Alert::error('Error', 'Kindly Login first to proceed to Checkout');
        return redirect()->route('login');
       }

    }
}
