<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Image;

class AdminProfileController extends Controller
{
    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $adminData=Admin::find($id);
        return view('admin.admin_profile_view', compact('adminData'));
    }

    public function EditAdminProfile()
    {
        $id = Auth::user()->id;
        $editData=Admin::find($id);
        return view('admin.edit_admin_profile', compact('editData'));
    }

    public function StoreAdminProfile(Request $request)
    {
       $id = Auth::user()->id;
       $data=Admin::find($id);
       $data->name=$request->name;
       $data->email=$request->email;
       $old_image=$request->old_image;

       if ($request->file('profile_photo_path')) {
        // $file=$request->file('profile_photo_path');
        // @unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
        // $filename=date('YmdHi').$file->getClientOriginalName();
        // $file->move(public_path('upload/admin_images'),$filename);
        // $data['profile_photo_path']=$filename;

        unlink($old_image);
        $image=$request->file('profile_photo_path');
        $name_gen=hexdec(uniqid()). '.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(255,255)->save('upload/admin_images/'.$name_gen);
        $save_url='upload/admin_images/'.$name_gen;
        $data->profile_photo_path=$save_url;
       }

       $data->save();
       Alert::success('Success', 'Admin Profile Updated Successfully!');



       return redirect()->route('admin.profile');



    }

    public function ChangeAdminPassword()
    {
        return view('admin.change_admin_password');
    }

    public function UpdateAdminPassword(Request $request)
    {
       $validateData=$request->validate([
           'oldpassword'=>'required',
           'password'=>'required|confirmed',
       ]);

       
       $hashedPassword=Auth::user()->password;
       if (Hash::check($request->oldpassword,$hashedPassword)) {
           $admin=Admin::find(Auth::id());
           $admin->password=Hash::make($request->password);
           $admin->save();
           Auth::logout();
           return redirect()->route('admin.logout')->with('success', 'Password Updated Successfully!');
       } else {
          return redirect()->back()->with('errors', 'Current Password Mismatch!');
       }

    }

    public function viewUsers()
    {
        $users=User::latest()->get();
        return view('backend.users.view_users',compact('users'));
    }
}
