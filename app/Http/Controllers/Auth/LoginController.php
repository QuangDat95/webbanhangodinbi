<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
class LoginController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }
    public function getLogin(){

        return view('auth.login');
    }
    // public function postLogin(Request $request){
    //    	// Kiểm tra dữ liệu nhập vào
	// $rules = [
	// 	'email' =>'required|email',
	// 	'password' => 'required|string|min:6'
	// ];
	// $messages = [
	// 	'email.required' => 'Email là trường bắt buộc',
	// 	'email.email' => 'Email không đúng định dạng',
	// 	'password.required' => 'Mật khẩu là trường bắt buộc',
	// 	'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
	// ];
	// $validator = Validator::make($request->all(), $rules, $messages);
	// if ($validator->fails()) {
	// 	// Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
	// 	return redirect()->route('getLogin')->withErrors($validator)->withInput();
	// } else {
	// 	// Nếu dữ liệu hợp lệ sẽ kiểm tra trong csdl
	// 	$email = $request->input('email');
	// 	$password = $request->input('password');
 
	// 	if( Auth::attempt(['email' => $email, 'password' =>$password])) {
	// 		// Kiểm tra đúng email và mật khẩu sẽ chuyển trang
	// 		return redirect()->route('category.index');
	// 	}else{
	// 		// Kiểm tra không đúng sẽ hiển thị thông báo lỗi
	// 		Session::flash('error', 'Email hoặc mật khẩu không đúng!');
	// 		return redirect()->route('getLogin');
	// 	}
	// }
    // }
	public function postLogin(Request $request)
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
}