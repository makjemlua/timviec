<?php

namespace App\Http\Middleware;

use Closure;

class CheckLoginEmployer {
	public function handle($request, Closure $next) {
		if (!get_data_user('employers')) {
			return redirect()->back()->with('warning', 'Bạn cần phải đăng nhập nhà tuyển dụng');
		}

		return $next($request);
	}
}