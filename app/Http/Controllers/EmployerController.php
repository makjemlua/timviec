<?php

namespace App\Http\Controllers;

use App\Model\Degree;
use App\Model\Employer;
use App\Model\EmployerProfile;
use App\Model\SaveProfileEmployer;
use App\Model\SaveProfileUser;
use App\Model\Skill;
use App\Model\UserApplied;
use App\Model\UserExperience;
use App\Model\UserGeneralInfo;
use App\Services\ProcessView;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use PDF;

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

			$sameJob = EmployerProfile::with('employer:id,name,em_company,em_avatar')->where('pr_career', 'like', '%' . $info->pr_career . '%')->orderByDesc('id')->paginate(5);

			$usersaves = SaveProfileEmployer::all();

			$applies = UserApplied::all();

			if (Auth::guard('web')->check()) {
				$usersaves = SaveProfileEmployer::where('usa_user_id', Auth::guard('web')->user()->id)->orderByDesc('id')->where('usa_profile_id', $id)->get();
				$applies = UserApplied::where('ap_user_id', Auth::guard('web')->user()->id)->orderByDesc('id')->where('ap_profile_id', $id)->get();
			}

			ProcessView::view('employer_profile', 'pr_view_count', 'profile', $id);

			$viewData = [
				'info' => $info,
				'sameJob' => $sameJob,
				'usersaves' => $usersaves,
				'applies' => $applies,
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

	public function profileDetail() {

	}

	//Luu ho so
	public function saveProfile(Request $request) {
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

	public function getpdf(Request $request) {
		$url = $request->segment(3);

		$url = preg_split('/(-)/i', $url);

		if ($id = array_pop($url)) {

			$info = UserGeneralInfo::with('user:id,name,email,avatar,gender,phone,birthday,address')
				->where([
					'ge_status' => UserGeneralInfo::STATUS_PUBLIC,
					'ge_active' => UserGeneralInfo::ACTIVE_ON,
				])
				->find($id);

			$education = Degree::find($id);

			$exp = UserExperience::find($id);

			$skill = Skill::find($id);

			$employersaves = SaveProfileUser::all();

			$years = Carbon::parse($info->user->birthday)->age;

			$rd = Carbon::now()->toDateString();

			$viewData = [
				'info' => $info,
				'education' => $education,
				'exp' => $exp,
				'skill' => $skill,
				'years' => $years,
				'employersaves' => $employersaves,
			];

			$pdf = PDF::loadView('nhatuyendung.getpdfprofile', $viewData);
			return $pdf->download('ho-so-' . $info->ge_slug . '-' . $rd . '.pdf');
		}
	}
}
