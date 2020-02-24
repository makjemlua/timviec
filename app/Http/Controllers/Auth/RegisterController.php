<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestRegisterEmployer;
use App\Http\Requests\RequestRegisterUser;
use App\Model\Employer;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller {
	public function index() {
		return view('auth.register');
	}
	public function getRegisterUser() {
		return view('auth.user.dangky');
	}
	public function getRegisterEmployer() {
		return view('auth.nhatuyendung.dangky');
	}

	public function postRegisterUser(RequestRegisterUser $request) {
		//dd($request->all());
		//$confirmation_code = time() . uniqid(true);
		$user = new User();
		$user->name = $request->name;
		$user->email = $request->email;
		// $user->u_address = $request->address;
		// $user->u_phone = $request->phone;
		$user->password = bcrypt($request->password);
		//$user->confirmation_code = $request->confirmation_code;

		$user->save();
		// Mail::send('auth.verify', $confirmation_code, function ($message) {
		// 	$message->to($request->email, $request->name)
		// 		->subject('Xác thực email của bạn');
		// });

		if ($user->id) {
			return redirect()->route('login.user')->with('success', 'Bạn đã đăng ký thành công');
		}
		return redirect()->back();
	}

	public function postRegisterEmployer(RequestRegisterEmployer $request) {
		//$confirmation_code = time() . uniqid(true);
		$employer = new Employer();
		$employer->name = $request->name;
		$employer->email = $request->email;
		// $employer->u_address = $request->address;
		// $employer->u_phone = $request->phone;
		$employer->password = bcrypt($request->password);
		//$employer->confirmation_code = $request->confirmation_code;
		//dd($request->all());
		$employer->save();
		// Mail::send('auth.verify', $confirmation_code, function ($message) {
		// 	$message->to($request->email, $request->name)
		// 		->subject('Xác thực email của bạn');
		// });

		if ($employer->id) {
			return redirect()->route('login.employer')->with('success', 'Bạn đã đăng ký thành công');
		}
		return redirect()->back();
	}

	protected function validator(array $data) {
		return Validator::make($data, [
			'name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'password' => ['required', 'string', 'min:8', 'confirmed'],
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return \App\User
	 */
	protected function create(array $data) {
		return User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => Hash::make($data['password']),
		]);
	}
}
