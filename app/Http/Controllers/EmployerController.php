<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestPasswordEmployer;
use App\Model\Employer;
use App\Model\EmployerProfile;
use App\Model\Map;
use App\Model\Notification;
use App\Model\SaveProfileEmployer;
use App\Model\SaveProfileUser;
use App\Model\Transaction;
use App\Model\UserApplied;
use App\Model\UserGeneralInfo;
use App\Services\ProcessView;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

class EmployerController extends Controller {
	public function index() {
		$employers = Employer::find(get_data_user('employers'));

		return view('nhatuyendung.info', compact('employers'));
	}
	public function saveUpdateInfoEmployer(Request $requestEmployer) {
		$employers = Employer::find(get_data_user('employers'));
		$employers->name = $requestEmployer->name;
		$employers->em_phone = $requestEmployer->em_phone;
		$employers->em_address = $requestEmployer->em_address;
		$employers->em_company = $requestEmployer->em_company;
		$employers->em_scale = $requestEmployer->em_scale;
		$employers->em_description = $requestEmployer->em_description;
		$employers->em_website = $requestEmployer->em_website;
		$employers->em_contact_type = $requestEmployer->em_contact_type;
		$employers->created_at = Carbon::now();
		$employers->updated_at = Carbon::now();
		if ($requestEmployer->hasFile('avatar')) {
			$file = upload_image('avatar');
			if (isset($file['name'])) {
				$employers->em_avatar = $file['name'];
			}
		}
		$employers->save();
		return redirect()->back()->with('success', 'Cập nhập thành công');
	}

	// Thông tin chi tiết việc làm
	public function thongtinProfile(Request $request) {

		$url = $request->segment(2);

		$url = preg_split('/(-)/i', $url);
		if ($id = array_pop($url)) {

			$info = EmployerProfile::with('employer:id,name,email,em_avatar,em_phone,em_company,em_address,em_contact_type')
				->where('pr_active', EmployerProfile::STATUS_ON)
				->find($id);

			$map = Map::find($id);

			$usersaves = '';

			if (Auth::guard('web')->check()) {
				$usersaves = SaveProfileEmployer::where('usa_user_id', Auth::guard('web')->user()->id)->orderByDesc('id')->where('usa_profile_id', $id)->get();
			}

			$applies = '';
			if (Auth::guard('web')->check()) {
				$applies = UserApplied::where('ap_user_id', Auth::guard('web')->user()->id)->orderByDesc('id')->where('ap_profile_id', $id)->get();
			}

			$hoso = UserGeneralInfo::where('ge_user_id', get_data_user('web', 'id'))->where('ge_status', 1)->where('ge_active', 1)->first();

			ProcessView::view('employer_profile', 'pr_view_count', 'profile', $id);

			$viewData = [

				'info' => $info,
				'map' => $map,
				'usersaves' => $usersaves,
				'applies' => $applies,
				'hoso' => $hoso,
			];
			return view('nhatuyendung.thongtin', $viewData);
		}
	}

	// Xem tất cả hồ sơ
	// public function viewListProfile() {

	// 	$profileLists = UserGeneralInfo::with('user:id,name,avatar')->where([
	// 		'ge_status' => UserGeneralInfo::STATUS_PUBLIC,
	// 		//'pr_active' => UserGeneralInfo::ACTIVE_ON,
	// 	])->orderBy('id', 'DESC')->paginate(5);

	// 	$viewData = [
	// 		'profileLists' => $profileLists,
	// 	];

	// 	return view('nhatuyendung.tuyen-dung', $viewData);
	// }

	//Trang nhà tuyển dụng
	public function trangchu() {
		return view('nhatuyendung.home');

	}

	//Luu ho so
	public function saveProfiles(Request $request) {
		if ($request->has('employersaves')) {
			$employersaves = new SaveProfileUser();
			$employersaves->sa_employer_id = Auth::guard('employers')->user()->id;
			$employersaves->sa_profile_id = $request->sa_profile_id;
			$employersaves->sa_title = $request->sa_title;
			$employersaves->sa_name = $request->sa_name;
			$employersaves->sa_level = $request->sa_level;
			$employersaves->created_at = Carbon::now();
			$employersaves->updated_at = Carbon::now();
			$employersaves->save();
			return redirect()->back()->with('success', 'Bạn đã lưu hồ sơ');
		}
	}

	// public function getpdf(Request $request) {
	// 	$url = $request->segment(3);

	// 	$url = preg_split('/(-)/i', $url);

	// 	if ($id = array_pop($url)) {

	// 		$info = UserGeneralInfo::with('user:id,name,email,avatar,gender,phone,birthday,address')
	// 			->where([
	// 				'ge_status' => UserGeneralInfo::STATUS_PUBLIC,
	// 				'ge_active' => UserGeneralInfo::ACTIVE_ON,
	// 			])
	// 			->find($id);

	// 		$education = Degree::find($id);

	// 		$exp = UserExperience::find($id);

	// 		$skill = Skill::find($id);

	// 		$employersaves = SaveProfileUser::all();

	// 		$years = Carbon::parse($info->user->birthday)->age;

	// 		$rd = Carbon::now()->toDateString();

	// 		$viewData = [
	// 			'info' => $info,
	// 			'education' => $education,
	// 			'exp' => $exp,
	// 			'skill' => $skill,
	// 			'years' => $years,
	// 			'employersaves' => $employersaves,
	// 		];

	// 		$pdf = PDF::loadView('nhatuyendung.getpdfprofile', $viewData);
	// 		return $pdf->download('ho-so-' . $info->ge_slug . '-' . $rd . '.pdf');
	// 	}
	// }

	// Trang hiển thị hồ sơ đã lưu
	public function saveInfoProfile() {

		$saveProfile = SaveProfileUser::with('profile:id,ge_slug,ge_active,ge_status')->where('sa_employer_id', Auth::guard('employers')->user()->id)->orderByDesc('id')->paginate(5);

		$viewData = [
			'saveProfile' => $saveProfile,
		];

		return view('nhatuyendung.save-profile', $viewData);
	}

	// Trang hiển thị hồ sơ ứng tuyển
	public function profileApplie(Request $request) {

		$profileApplie = UserApplied::with('hoso:id,ge_slug,ge_title,ge_profession,ge_status,ge_active')->with('user:id,name')->where('ap_employer_id', Auth::guard('employers')->user()->id);

		if ($request->search) {
			$profileApplie->where('ap_title', 'like', '%' . $request->search . '%');
		}

		if ($request->status) {
			$profileApplie->where('ap_status', '=', $request->status);
		}

		$profileApplie = $profileApplie->orderByDesc('id')->paginate(5);

		$order = UserApplied::with('user:id,name,email,address,phone')->with('hoso:id,ge_title')->where('ap_employer_id', get_data_user('employers'))->where('ap_status', 1)->get();
		$viewData = [
			'profileApplie' => $profileApplie,
			'order' => $order,
		];

		return view('nhatuyendung.hosoungtuyen', $viewData);
	}

	//Trạng thái duyệt hồ sơ ứng tuyển
	public function actionApplie($active, $id) {
		$profileApplie = UserApplied::find($id);
		if ($active) {
			$profileApplie = UserApplied::find($id);
			switch ($active) {
			case 'apply':
				$profileApplie->ap_status = UserApplied::APPLY;
				$profileApplie->save();
				break;
			case 'cancel':
				$profileApplie->ap_status = UserApplied::CANCEL;
				$profileApplie->save();
				break;
			case 'delete':
				$profileApplie->delete();
				return redirect()->back();
				break;
			}
		}
		return redirect()->back()->with('success', 'Đã apply ứng viên');
	}

	// Trang cài đặt tài khoản
	public function settingAccount() {
		return view('nhatuyendung.setting-account');
	}

	// Trang thay đổi mật khẩu
	public function changePass() {
		$employer = Employer::find(get_data_user('employers'));
		return view('nhatuyendung.changepass', compact('employer'));
	}

	// Đổi mật khẩu employer
	public function updatepass(RequestPasswordEmployer $requestPass) {
		if (Hash::check($requestPass->password_old, get_data_user('employers', 'password'))) {
			$employer = Employer::find(get_data_user('employers'));
			$employer->password = bcrypt($requestPass->password);
			$employer->save();
			return redirect()->back()->with('success', 'Cập nhập thành công');
		}
		return redirect()->back()->with('danger', 'Mật khẩu không đúng');

	}

	//Thông báo
	public function notification() {
		$notifi = Notification::where('no_check', 2)->where('no_active', 1)->get();
		return view('nhatuyendung.notification', compact('notifi'));
	}

	//Trang thông tin thanh toán
	public function hoadon() {
		$transactions = Transaction::with('employer:id,name,email,em_phone,em_company')->where('tr_employer_id', get_data_user('employers'))->orderBy('id', 'DESC')->paginate(5);
		$viewData = [
			'transactions' => $transactions,
		];
		return view('nhatuyendung.thongtinthanhtoan', $viewData);
	}
}
