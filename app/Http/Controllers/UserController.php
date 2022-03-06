<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
class UserController extends Controller
{
    public function getchangeuser(){
        $user = User::find(Auth::user()->id);
        return view('dashboards.users.master',compact('user'));
    }
    public function updateaccountuser(Request $request){
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->company = $request->company;
        $user->address = $request->address;
        $user->save();
        return view('dashboards.users.user_setting',compact('user'));
    }

    public function changepassword(Request $request){
        if($request->oldpassword == '' || $request->newpassword == '' || $request->repassword == ''){
            Session::flash('error','Các trường không được để trống');
            return view('dashboards.users.password_setting');
        }
        if (!Hash::check($request->oldpassword, Auth::user()->password)) {
            Session::flash('error','Mật khẩu cũ không đúng');
            return view('dashboards.users.password_setting');
        }else if(strcmp($request->oldpassword, $request->newpassword) == 0){
            Session::flash('error','Mật khẩu mới không được trùng với mật khẩu cũ');
            return view('dashboards.users.password_setting');
        }else if($request->repassword != $request->newpassword){
            Session::flash('error','Mật khẩu nhập lại không đúng');
            return view('dashboards.users.password_setting');
        }else{
            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($request->newpassword);
            $user->save();
            Session::flash('success','Đổi mật khẩu thành công!');
            $credential_email = [
                'email' => Auth::user()->email,
                'password' => $request->newpassword,
                ];
            $user = User::where(["email" => $credential_email['email']])->first();
            Auth::login($user);
            return view('dashboards.users.password_setting');
        }
    }
    public function changeimage(Request $request){
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);
        $user = User::find(Auth::user()->id);
        // dd($user);
        // if ($request->hasFile('file')) {
        //     $file = $request->file;
        //     $path = $file->store('image','public');
        //     $user->image = $path;
        // }
        if ($request->hasFile('file')) {
            $currentFile = $user->image;
            if($currentFile){
                Storage::delete('/public/' . $currentFile);
            }
            $file = $request->file;
            $path = $file->store('image', 'public');
            $user->image = $path;
        }
        $user->save();
        return response()->json('Image uploaded successfully');
    }
}
