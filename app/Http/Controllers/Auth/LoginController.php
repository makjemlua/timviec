<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestLoginEmployer;
use App\Http\Requests\RequestLoginUser;
use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Socialite;

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
			if (Auth::guard('web')->user()->active == 0) {
				Auth::guard('web')->logout();
				return redirect()->back()->with('danger', 'Tài khoản của bạn đã bị khóa');
			}
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
			if (Auth::guard('employers')->user()->active == 0) {
				Auth::guard('employers')->logout();
				return redirect()->back()->with('danger', 'Tài khoản của bạn đã bị khóa');
			}
			return redirect()->route('home.index')->with('success', 'Bạn đã đăng nhập thành công');
		}
		return redirect()->back()->with('danger', 'Tên tài khoản hoặc mật khẩu không chính xác');
	}

	public function getLogoutEmployer() {
		Auth::guard('employers')->logout();
		return redirect()->route('home.index')->with('success', 'Bạn đã đăng xuất');
	}

	public function redirectToProvider($provider) {
		return Socialite::driver($provider)->redirect();
	}

	public function handleProviderCallback($provider) {
		$getInfo = Socialite::driver($provider)->user();

		//$user = $this->createUser($getInfo, $provider);

		$data = [
			'name' => $getInfo->getName(),
			'email' => $getInfo->getEmail(),
			'avatar' => $getInfo->getAvatar(),
			'provider' => $provider,
			'provider_id' => $getInfo->id,
			'email_verified_at' => Carbon::now(),
		];

		$my_user = User::where('email', '=', $getInfo->getEmail())->first();
		$my_user1 = User::where('email', '=', $getInfo->getEmail())->whereNull('provider')->first(); //Co email k provider
		$my_user2 = User::where('email', '=', $getInfo->getEmail())->where('provider', '=', $provider)->first(); //Co email va provider
		if ($my_user === null) {
			Auth::login(User::firstOrCreate($data));
		} elseif ($my_user2) {
			Auth::login($my_user);
			//return redirect()->route('login.user')->with('danger', 'Tài khoản này đã tồn tại email');
		} elseif ($my_user1) {
			//Auth::login($my_user);
			return redirect()->route('login.user')->with('danger', 'Tài khoản này đã tồn tại email');
		}

		//auth()->login($user);

		return redirect()->route('home.index', compact('user'));
	}
	// public function createUser($getInfo, $provider) {
	// 	$user = User::where('provider_id', $getInfo->id)->first();
	// 	if (!$user) {
	// 		$user = User::create([
	// 			'name' => $getInfo->name,
	// 			'email' => $getInfo->email,
	// 			'avatar' => $getInfo->getAvatar(),
	// 			'provider' => $provider,
	// 			'provider_id' => $getInfo->id,
	// 			'email_verified_at' => Carbon::now(),
	// 		]);
	// 	}
	// 	return $user;
	// }
}
