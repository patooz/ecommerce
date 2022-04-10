<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Slider;
use App\Models\Product;


class IndexController extends Controller
{
    public function index()
    {
        $categories=Category::orderBy('category_name_en','ASC')->get();
        $sliders=Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        $products=Product::where('status',1)->orderBy('id','DESC')->limit(6) ->get();
        return view('frontend.index',compact('categories','sliders','products'));
    }

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
       return view('frontend.products.product_details',compact('product'));

    }
}



