<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestLoginEmployer;
use App\Http\Requests\RequestLoginUser;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
	public function index() {
		return view('auth.login');
	}
	public function getLoginUser() {
		return view('auth.user.dangnhap');
	}
	public function getLoginEmployer() {
		return view('auth.nhatuyendung.dangnhap');
	}

	public function postLoginUser(RequestLoginUser $request) {
		//$credentials = ['u_email' => $request->email, 'u_password' => $request->password];
		$credentials = $request->only('email', 'password');

		if (\Auth::guard('web')->attempt($credentials)) {
			// Authentication passed...
			return redirect()->route('home.index')->with('success', 'Bạn đã đăng nhập thành công');
		}
		return redirect()->back()->with('danger', 'Tên tài khoản hoặc mật khẩu không chính xác');
	}

	public function getLogoutUser() {
		Auth::guard('web')->logout();
		return redirect()->route('home.index')->with('success', 'Bạn đã đăng xuất');
	}

	public function postLoginEmployer(RequestLoginEmployer $request) {
		//$credentials = ['u_email' => $request->email, 'u_password' => $request->password];
		$credentials = $request->only('email', 'password');

		if (Auth::guard('employers')->attempt($credentials)) {
			// Authentication passed...
			return redirect()->route('home.index')->with('success', 'Bạn đã đăng nhập thành công');
		}
		return redirect()->back()->with('danger', 'Tên tài khoản hoặc mật khẩu không chính xác');
	}

	public function getLogoutEmployer() {
		Auth::guard('employers')->logout();
		return redirect()->route('home.index')->with('success', 'Bạn đã đăng xuất');
	}
}
