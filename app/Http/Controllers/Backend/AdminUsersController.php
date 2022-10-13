<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Carbon\Carbon;
use Image;
use Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminUsersController extends Controller
{
    public function adminUsers()
    {
        $adminuser=Admin::where('type', 2)->latest()->get();
        return view('backend.roles.admin_user_roles',compact('adminuser'));
        
    }

    public function addAdminUser()
    {
        return view('backend.roles.add_admin_user');
    }

    public function storeAdminUser(Request $request)
    {
        // $validateData=$request->validate([
        //     'name'=>'required',
        //     'email '=>'required',
        //     'password'=>'required',
        //     'phone'=>'required',
        // ],[
        //     'name.required'=>'Name is Required',
        //     'email.required'=>'Email is Required',
        //     'password.required'=>'Password is Required',
        //     'phone.required'=>'Phone Number is Required',

        // ]);

        $image=$request->file('profile_photo_path');
        $name_gen=hexdec(uniqid()). '.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(255,255)->save('upload/admin_images/'.$name_gen);
        $save_url='upload/admin_images/'.$name_gen;

        Admin::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'profile_photo_path'=>$save_url,
            'password'=>Hash::make($request->password),
            'phone'=>$request->phone,
            'category'=>$request->category,
            'product'=>$request->product,
            'slider'=>$request->slider,
            'coupons'=>$request->coupons,
            'shipping'=>$request->shipping,
            'blog'=>$request->blog,
            'orders'=>$request->orders,
            'stock'=>$request->stock,
            'reports'=>$request->reports,
            'users'=>$request->users,
            'returnorder'=>$request->returnorder,
            'review'=>$request->review,
            'settings'=>$request->settings,
            'adminuser'=>$request->adminuser,
            'type'=>2,
            'created_at'=>Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Admin user Added Successfully!',
            'alert-type' => 'success'


        );
        return redirect()->route('admin_users')-> with($notification);

    }

    public function editAdminUser(Request $request, $user_id)
    {
        $adminUser=Admin::findOrFail($user_id);

        return view('backend.roles.edit_admin_user', compact('adminUser'));
    }

    public function updateAdminUser(Request $request, $user_id)
    {
        
        $old_image=$request->old_image;

        if ($request->file('profile_photo_path')) {
        unlink($old_image);
        $image=$request->file('profile_photo_path');
        $name_gen=hexdec(uniqid()). '.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(255,255)->save('upload/admin_images/'.$name_gen);
        $save_url='upload/admin_images/'.$name_gen;


        Admin::findOrFail($user_id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'profile_photo_path'=>$save_url,
            
            'phone'=>$request->phone,
            'category'=>$request->category,
            'product'=>$request->product,
            'slider'=>$request->slider,
            'coupons'=>$request->coupons,
            'shipping'=>$request->shipping,
            'blog'=>$request->blog,
            'orders'=>$request->orders,
            'stock'=>$request->stock,
            'reports'=>$request->reports,
            'users'=>$request->users,
            'returnorder'=>$request->returnorder,
            'review'=>$request->review,
            'settings'=>$request->settings,
            'adminuser'=>$request->adminuser,
            'type'=>2,
            'created_at'=>Carbon::now(),

        ]);
        Alert::toast('Admin User Updated Successfully!', 'success');
        return redirect()->route('admin_users');
        } else {
            Admin::findOrFail($user_id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
           
            
            'phone'=>$request->phone,
            'category'=>$request->category,
            'product'=>$request->product,
            'slider'=>$request->slider,
            'coupons'=>$request->coupons,
            'shipping'=>$request->shipping,
            'blog'=>$request->blog,
            'orders'=>$request->orders,
            'stock'=>$request->stock,
            'reports'=>$request->reports,
            'users'=>$request->users,
            'returnorder'=>$request->returnorder,
            'review'=>$request->review,
            'settings'=>$request->settings,
            'adminuser'=>$request->adminuser,
            'type'=>2,
            'created_at'=>Carbon::now(),

        ]);
        Alert::toast('Admin User Updated Successfully!', 'success');
        return redirect()->route('admin_users');
        }

    }

    public function deleteAdminUser($user_id)
    {
        $adminUser=Admin::findOrFail($user_id);
        $img=$adminUser->profile_photo_path;
        unlink($img);

        Admin::findOrFail($user_id)->delete();
        Alert::toast('Admin User Deleted Successfully!', 'success');
            return redirect()->back();
    }
}
