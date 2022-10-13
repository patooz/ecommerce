<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Carbon\Carbon;
use Auth;

class ReviewController extends Controller
{
    public function addProductReview(Request $request, $product_id)
    {
        $request->validate([
            'summary' => 'required',
            'review' => 'required'
        ]);

        Review::insert([
            'product_id' =>$product_id,
            'user_id' =>Auth::id(),
            'summary' =>$request->summary,
            'review' =>$request->review,
            'created_at' => Carbon::now()
        ]);


        $notification = array(
            'message' => 'Your Review will be Approved Shortly',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function pendingReviews()
    {
         $reviews =Review::where('status', 0)->orderBy('id', 'DESC')->get();
        return view('backend.reviews.pending_reviews', compact('reviews'));
    }

    public function approvedReview(Request $request, $review_id)
    {
        Review::where('id', $review_id)->update(['status' => 1]);


        $notification = array(
            'message' => 'Review Approved Successfully!',
            'alert-type' => 'success'


        );
        return redirect()->back()-> with($notification);
    }

    public function approvedReviews()
    {
         $reviews =Review::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('backend.reviews.approved_reviews', compact('reviews'));
    }

    public function deletedReview($review_id)
    {
        Review::findOrFail($review_id)->delete();

        $notification = array(
            'message' => 'Review Deleted Successfully!',
            'alert-type' => 'success'

        );
        return redirect()->back()-> with($notification);
    }
}
