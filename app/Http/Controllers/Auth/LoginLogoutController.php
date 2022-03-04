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
        return view('auth.auth-login');
    }
	public function postlogin(Request $request)
	{
		$credential_email = [
		'email' => $request->user_email,
		'password' => $request->password,
		];
		$credential_username = [
			'username' => $request->user_email,
			'password' => $request->password
		];
		// $remember_me = ( !empty( $request->remember_me ) )? TRUE : FALSE;
		if(Auth::attempt($credential_email))
		{
			$user = User::where(["email" => $credential_email['email']])->first();
			Auth::login($user);
			return redirect()->route('category.index');
		}
		else if(Auth::attempt($credential_username))
		{
			$user = User::where(["username" => $credential_username['username']])->first();
			Auth::login($user);
			return redirect()->route('category.index');
		}
		return redirect()->back()->with(['error'=>'Đăng nhập thất bại, tài khoản hoặc mật khẩu không đúng']);
	}
	public function postlogout() {
		Auth::logout();
		return redirect()->route('getlogin');
	}
}