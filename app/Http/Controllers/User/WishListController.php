<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Alert;
use Auth;
use Carbon\Carbon;

class WishListController extends Controller
{
    public function ViewWishlist()
    {
       return view('frontend.wishlist.view_wishlist');
    }


    public function GetwishlistItem()
    {
       $wishlist=Wishlist::with('product')->where('user_id', Auth::id())->latest()->get();
       return response()->json($wishlist);
    }

    public function RemoveWishlistItem($id)
    {
        Wishlist::where('user_id',Auth::id())->where('id',$id)->delete();
        return response()->json(['success'=> 'Successfully Removed Item From Wishlist!']);
    }
}
