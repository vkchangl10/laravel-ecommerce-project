<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/* LINK FILES OR LIBRABY */
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class IndexController extends Controller
{
    //show front home page
    public function Index(){
        return view('Frontend.Index');
    }

    //user logout method
    public function Logout(){
        Auth::logout();
        return Redirect()->route('login');
    }

    //show user profile page
    public function UserProfile(){
        $id = Auth::user()->id;
        $user = User::Find($id);
        return view('frontend.profile.user_profile',compact('user'));
    }

    //update user profile
    public function UserProfileStore(Request $request){
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'User Profile Updated Succesfully',
            'alert-type' => 'success',
        );
        return redirect()->route('dashboard')->with($notification);
    }

    //show change password page
    public function UserChangePassword(){
        $id = Auth::user()->id;
        $user = User::Find($id);
        return view('frontend.profile.change_password',compact('user'));
    }

    //Update User Password
    public function UserPasswordUpdate(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedpassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedpassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout');
        }else{
            $notification = array(
                'message' => 'Old Password Not Matched!! ',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
