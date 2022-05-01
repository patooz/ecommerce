<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartPageController extends Controller
{
    public function MyCart()
    {
       return view('frontend.wishlist.view_mycart');
    }

    public function GetCartItem()
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

    public function RemoveCart($rowId)
    {
        Cart::remove($rowId);

        return response()->json(['success'=> 'Success!Item Removed From Cart']);
    }

    public function increaseCart($rowId)
    {
        $row=Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);
        return response()->json('increment');
    }

    public function decreaseCart($rowId)
    {
        $row=Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);
        return response()->json('decrement');
    }
}
