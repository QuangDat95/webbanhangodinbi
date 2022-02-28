<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
class LoginLogoutController extends Controller
{
    public function getlogin()
	{
		if(Auth::check()){
			return redirect()->route('category.index');
		}
        return view('auth.login');
    }
	public function postlogin(Request $request)
	{
		$credential = [
		'email' => $request->email,
		'password' => $request->password,
		];
		// $remember_me = ( !empty( $request->remember_me ) )? TRUE : FALSE;
		if(Auth::attempt($credential)){
			$user = User::where(["email" => $credential['email']])->first();
			Auth::login($user);
			return redirect()->route('category.index');
		}
		return redirect()->back()->with(['flash_message'=>'Đăng nhập thất bại']);
	}
	public function postlogout() {
		Auth::logout();
		return redirect()->route('getlogin');
	}
}