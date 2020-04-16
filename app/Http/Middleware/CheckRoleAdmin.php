<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRoleAdmin {
	public function handle($request, Closure $next) {
		if (Auth::guard('admins')->user()->role == 0 || Auth::guard('admins')->user()->role == 1) {
			return redirect()->back()->with('warning', 'Bạn không có quyền truy cập');
		}

		return $next($request);
	}
}