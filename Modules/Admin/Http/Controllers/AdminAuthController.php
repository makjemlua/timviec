<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller {
	public function getLogin() {
		return view('admin::auth.login');
	}
	public function postLogin(Request $request) {
		$data = $request->only('email', 'password');

		if (Auth::guard('admins')->attempt($data)) {
			if (Auth::guard('admins')->user()->active == 1) {
				return redirect()->route('admin.home');
			} else {
				Auth::guard('admins')->logout();
				return redirect()->back()->with('error', 'Tài khoản của bạn đã bị khóa');
			}

		}
		return redirect()->back()->with('error', 'Tên tài khoản hoặc mật khẩu không chính xác');
	}
	public function getLogout() {
		\Auth::guard('admins')->logout();
		return redirect()->route('admin.login');
	}
}
