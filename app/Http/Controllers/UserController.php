<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function index(){
        return view('dashboards.users.setting');
    }
    public function updateaccountgeneral(Request $request){
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->company = $request->company;
        $user->address = $request->address;
        $user->save();
        return redirect()->route('settingaccount')->with('flash_message','Cập nhật thành công');
    }
}
