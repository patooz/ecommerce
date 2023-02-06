<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Brand;
use App\Models\MultiImg;
use App\Models\Blog\BlogPostCategory;
use App\Models\Blog\BlogPost;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;



class IndexController extends Controller
{
    public function index()
    {
        $blogPost=BlogPost::latest()->get();
        $categories=Category::orderBy('category_name_en','ASC')->get();
        $new_arrivals = Product::orderBy('created_at')->limit(10)->get();
        $sliders=Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        $products=Product::where('status',1)->orderBy('id','DESC')->limit(6) ->get();
        $categories=Category::orderBy('category_name_en','ASC')->get();
        $featured=Product::where('featured',1)->orderBy('id','DESC')->limit(6) ->get();
        $hotdeals=Product::where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->limit(3) ->get();
        $specialoffer=Product::where('special_offer',1)->orderBy('id','DESC')->limit(3) ->get();
        $specialdeals=Product::where('special_deals',1)->orderBy('id','DESC')->limit(6) ->get();


        $skip_category_0=Category::skip(0)->first();
        $skip_product_0=Product::where('status',1)->where('category_id',$skip_category_0->id)->orderBy('id','DESC' )->get();

        $skip_category_1=Category::skip(4)->first();
        $skip_product_1=Product::where('status',1)->where('category_id',$skip_category_1->id)->orderBy('id','DESC' )->get();

        $skip_brand_1=Brand::skip(8)->first();
        $skip_brand_product_1=Product::where('status',1)->where('brand_id',$skip_brand_1->id)->orderBy('id','DESC' )->get();

        // return $skip_category->id;
        // die();

        return view('frontend.index',compact('categories','sliders','products','featured','hotdeals','specialoffer','specialdeals','skip_category_0','skip_product_0','skip_category_1','skip_product_1','skip_brand_1','skip_brand_product_1','blogPost', 'new_arrivals'));
    }

    // public function newArivals()
    // {
    //     $new_arrivals = Product::orderBy('created_at')->limit(10);
    //     return view('frontend.index', compact('new_arrivals'));
    // }

    public function UserLogout()
    {
       Auth::logout();
       return redirect('login');
    }

    public function UserProfile()
    {
       $id=Auth::user()->id;
       $user=User::find($id);

       return view('frontend.profile.user_profile', compact('user'));

    }

    public function UpdateUserProfile(Request $request)
    {
        $data=User::find(Auth::user()->id);
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;

        if ($request->file('profile_photo_path')) {
         $file=$request->file('profile_photo_path');
         @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
         $filename=date('YmdHi').$file->getClientOriginalName();
         $file->move(public_path('upload/user_images'),$filename);
         $data['profile_photo_path']=$filename;
        }
        $data->save();
        Alert::success('Success', 'User Profile Updated Successfully!');


        return redirect()->route('dashboard');
    }

    public function UpdateUserPassword()
    {
        $id=Auth::user()->id;
        $user=User::find($id);
        return view('frontend.profile.change_password',compact('user'));
    }

    public function ChangeUserPassword(Request $request)
    {
        $validateData=$request->validate([
            'oldpassword'=>'required',
            'password'=>'required|confirmed',
        ]);

        $hashedPassword=Auth::user()->password;
        if (Hash::check($request->oldpassword,$hashedPassword)) {
            $user=User::find(Auth::id());
            $user->password=Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout')->with('success', 'Password Updated Successfully!');
        } else {
           return redirect()->back()->with('errors', 'Current Password Mismatch!');
        }

    }

    public function ProductDetails($id,$slug)
    {
       $product=Product::findOrFail($id);

       $color_en= $product->product_color_en;
       $product_color_en=explode(',', $color_en);

       $color_swa= $product->product_color_swa;
       $product_color_swa=explode(',',$color_swa);

       $size_en= $product->product_size_en;
       $product_size_en=explode(',', $size_en);

       $size_swa= $product->product_size_swa;
       $product_size_swa=explode(',',$size_swa);

       $catId=$product->category_id;
       $relatedProducts=Product::where('category_id',$catId)->where('id','!=',$id)->orderBy('id','DESC')->get();

       $reviews= Review::where('product_id', $id)->latest()->limit(5)->get();


       $multimg=MultiImg::where('product_id',$id)->get();
       return view('frontend.products.product_details',compact('product','multimg','product_color_en','product_color_swa','product_size_en','product_size_swa','relatedProducts', 'reviews'));

    }

    //product view with ajax
    public function AjaxProductsView($id)
    {
        $product=Product::with('categories','brands')->findOrFail($id);

       $color= $product->product_color_en;
       $product_color=explode(',', $color);

       $size= $product->product_size_en;
       $product_size=explode(',', $size);

       return response()->json(array(
           'product'=>$product,
           'color'=>$product_color,
           'size'=>$product_size,

       ));
    }

    public function productSearch(Request $request)
    {
        $request->validate(['search' => 'required']);
        $search=$request->search;

        // echo "$product";
        $categories=Category::orderBy('category_name_en','ASC')->get();
        $products=Product::where('product_name_en', 'LIKE', "%$search%")->get();
        return view('frontend.products.search_results', compact('products','categories'));
    }

    public function advancedProductSearch(Request $request)
    {
        $request->validate(['search' => 'required']);
        $search=$request->search;



        $products=Product::where('product_name_en', 'LIKE', "%$search%")->select('product_name_en', 'product_thumbnail', 'selling_price', 'id', 'product_slug_en')->limit(10)->get();
        return view('frontend.products.search_product', compact('products'));
    }


}



