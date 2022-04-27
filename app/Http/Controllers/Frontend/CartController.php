<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Alert;
use Gloudemans\Shoppingcart\Facades\Cart;

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
}