<?php

namespace App\Http\Controllers;

use App\Model\SaveProfileEmployer;
use App\Model\UserApplied;
use App\Model\UserGeneralInfo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {
	//Trang thông tin user
	public function index() {
		$user = User::find(get_data_user('web'));

		$userProfile = UserGeneralInfo::where('ge_user_id', Auth::guard('web')->user()->id)->orderByDesc('id')->paginate(5);

		$saveProfile = SaveProfileEmployer::where('usa_user_id', Auth::guard('web')->user()->id)->orderByDesc('id')->paginate(5);

		$viewData = [
			'user' => $user,
			'userProfile' => $userProfile,
			'saveProfile' => $saveProfile,
		];

		return view('users.info', $viewData);
	}

	//Lưu thông tin hồ sơ
	public function saveUpdateInfoUser(Request $requestUser) {
		$user = User::find(get_data_user('web'));
		$user->name = $requestUser->name;
		$user->phone = $requestUser->phone;
		$user->address = $requestUser->address;
		$user->birthday = $requestUser->birthday;
		$user->gender = $requestUser->gender;
		$user->created_at = Carbon::now();
		$user->updated_at = Carbon::now();
		if ($requestUser->hasFile('avatar')) {
			$file = upload_image('avatar');
			if (isset($file['name'])) {
				$user->avatar = $file['name'];
			}
		}
		//dd($user);
		$user->save();
		return redirect()->back()->with('success', 'Cập nhập thành công');
	}

	//
	// public function listProfile() {
	// 	return view('users.list-profile');
	// }

	// Trang hiển thị CV
	public function exampleCV() {
		return view('users.exam-cv');
	}

	// Trang hiển thị việc làm đã lưu
	public function saveProfile() {

		$saveProfile = SaveProfileEmployer::where('usa_user_id', Auth::guard('web')->user()->id)->orderByDesc('id')->paginate(5);

		$viewData = [
			'saveProfile' => $saveProfile,
		];

		return view('users.save-profile', $viewData);
	}

	// Lưu việc làm
	public function createProfile(Request $request) {
		if ($request->has('usersaves')) {
			$usersaves = new SaveProfileEmployer();
			$usersaves->usa_user_id = Auth::guard('web')->user()->id;
			$usersaves->usa_profile_id = $request->usa_profile_id;
			$usersaves->usa_title = $request->usa_title;
			$usersaves->usa_company = $request->usa_company;
			$usersaves->usa_career = $request->usa_career;
			$usersaves->created_at = Carbon::now();
			$usersaves->updated_at = Carbon::now();
			$usersaves->save();
			return redirect()->back()->with('success', 'Bạn đã lưu hồ sơ');
		}

	}

	// Trang hiển thị việc làm đã ứng tuyển
	public function applieProfile() {

		$applies = UserApplied::with('profile:id,pr_slug')->where('ap_user_id', Auth::guard('web')->user()->id)->orderByDesc('id')->paginate(5);

		return view('users.applie-profile', compact('applies'));
	}

	// Trang cài đặt tài khoản
	public function settingAccount() {
		return view('users.setting-account');
	}

	// Nộp hồ sơ
	public function applied(Request $request) {
		if ($request->has('applies')) {
			$applies = new UserApplied();
			$applies->ap_user_id = Auth::guard('web')->user()->id;
			$applies->ap_profile_id = $request->ap_profile_id;
			$applies->ap_title = $request->ap_title;
			$applies->ap_company = $request->ap_company;
			$applies->ap_name = $request->ap_name;
			$applies->ap_career = $request->ap_career;
			$applies->ap_provinces = $request->ap_provinces;
			$applies->created_at = Carbon::now();
			$applies->updated_at = Carbon::now();
			$applies->save();

			return redirect()->back()->with('success', 'Bạn đã nộp hồ sơ');
		}

	}

	//Các chức năng xóa applie
	public function deleteApplie($id) {
		$applies = UserApplied::find($id);
		$applies->delete();
		return redirect()->back();
	}

	//Các chức năng xóa save
	public function deleteSave($id) {
		$saveProfile = SaveProfileEmployer::find($id);
		$saveProfile->delete();
		return redirect()->back();
	}

}
