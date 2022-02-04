<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminProfileController extends Controller
{
    public function AdminProfile()
    {
        $adminData=Admin::find(1);
        return view('admin.admin_profile_view', compact('adminData'));
    }

    public function EditAdminProfile()
    {
        $editData=Admin::find(1);
        return view('admin.edit_admin_profile', compact('editData'));
    }

    public function StoreAdminProfile(Request $request)
    {
       $data=Admin::find(1);
       $data->name=$request->name;
       $data->email=$request->email;

       if ($request->file('profile_photo_path')) {
        $file=$request->file('profile_photo_path');
        @unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
        $filename=date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('upload/admin_images'),$filename);
        $data['profile_photo_path']=$filename;
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

       $hashedPassword=Admin::find(1)->password;
       if (Hash::check($request->oldpassword,$hashedPassword)) {
           $admin=Admin::find(1);
           $admin->password=Hash::make($request->password);
           $admin->save();
           Auth::logout();
           return redirect()->route('admin.logout')->with('success', 'Password Updated Successfully!');
       } else {
          return redirect()->back()->with('errors', 'Current Password Mismatch!');
       }



    }
}
