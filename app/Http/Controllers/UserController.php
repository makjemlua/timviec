<?php

namespace App\Http\Controllers;

use App\Model\SaveProfileEmployer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends DashboardController {
	public function __construct() {
		parent::__construct();
	}
	public function index() {
		$user = User::find(get_data_user('web'));

		return view('users.info', compact('user'));
	}
	public function saveUpdateInfoUser(Request $requestUser) {
		$user = User::where('id', get_data_user('web'))->first();
		$user->name = $requestUser->name;
		$user->phone = $requestUser->phone;
		$user->address = $requestUser->address;
		$user->birthday = $requestUser->birthday;
		$user->gender = $requestUser->gender;
		$user->avatar = $requestUser->image;
		$user->created_at = Carbon::now();
		$user->updated_at = Carbon::now();
		if ($requestUser->hasFile('avatar')) {
			$file = upload_image('avatar');
			if (isset($file['name'])) {
				$user->avatar = $file['name'];
			}
		}
		$user->save();
		return redirect()->back()->with('success', 'Cập nhập thành công');
	}

	public function listProfile() {
		return view('users.list-profile');
	}

	// Trang hiển thị CV
	public function exampleCV() {
		return view('users.exam-cv');
	}

	// Trang hiển thị việc làm đã lưu
	public function saveProfile() {
		$usersaves = SaveProfileEmployer::where('usa_user_id', Auth::guard('web')->user()->id)->orderByDesc('id')->paginate(5);

		return view('users.save-profile', compact('usersaves'));
	}

	// Lưu việc làm
	public function createProfile(Request $request) {
		$usersaves = new SaveProfileEmployer();
		$usersaves->usa_user_id = Auth::guard('web')->user()->id;
		$usersaves->usa_profile_id = $request->usa_profile_id;
		$usersaves->usa_title = $request->usa_title;
		$usersaves->usa_company = $request->usa_company;
		$usersaves->created_at = Carbon::now();
		$usersaves->updated_at = Carbon::now();
		$usersaves->save();

		return redirect()->back()->with('success', 'Bạn đã lưu hồ sơ');

	}

	// Trang cài đặt tài khoản
	public function settingAccount() {
		return view('users.setting-account');
	}

}
