<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//LINK FILES
use App\Models\Admin;
use Auth;
use Illuminate\Support\Facades\Hash;


class AdminProfileController extends Controller
{
    //Admin Profile Page Method 
    public function AdminProfile(){
        $adminData = Admin::find(1);
        return view('admin.admin_profile_view',compact('adminData'));
    }

    //Admin Profile Edit Page Method 
    public function AdminProfileEdit(){
        $editData = Admin::find(1);
        return view('admin.admin_profile_edit',compact('editData'));
    }

    //Admin Profile Update Method 
    public function AdminProfileStore(Request $request){
        $data = Admin::find(1);
        $data->name = $request->name;
        $data->email = $request->email;

        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Profile Updated Succesfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.profile')->with($notification);
    }

    //Show Admin Chnage Password Page
    public function AdminChangePassword(){
        return view('admin.admin_change_password');
    }

    //Update Admin Password
    public function AdminUpdateChangePassword(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedpassword = Admin::find(1)->password;
        if(Hash::check($request->oldpassword,$hashedpassword)){
            $admin = Admin::find(1);
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();

            $notification = array(
                'message' => 'Password Succesfully Updated',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.logout')->with($notification);
        }else{
            $notification = array(
                'message' => 'Old Password Wrong',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

}
