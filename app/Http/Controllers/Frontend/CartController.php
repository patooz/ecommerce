<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
use Alert;
use Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Carbon\Carbon;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id)
    {
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
}
