<?php

namespace App\Http\Middleware;

use Closure;

class CheckLoginUser {
	public function handle($request, Closure $next) {
		if (!get_data_user('web')) {
			return redirect()->back()->with('warning', 'Bạn cần phải đăng nhập người tìm việc');
		}

		return $next($request);
	}
}