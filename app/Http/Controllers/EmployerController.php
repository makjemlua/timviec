<?php

namespace App\Http\Controllers;

use App\Model\Employer;
use App\Model\EmployerProfile;
use App\Model\Job;
use App\Model\Province;
use App\Model\SaveProfileEmployer;
use App\Model\UserGeneralInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
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
		$employers->em_avatar = $requestEmployer->avatar;
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

			// $view = 'blog' . $info->id;

			// if (Session::has($view)) {
			// 	$info->where('id', $info->id)->increment('pr_view_count', 1);
			// 	Session::put($view, 1);
			// }

			$view = EmployerProfile::find($id);
			$view->pr_view_count = $view->pr_view_count + 1;
			$view->save();

			$sameJob = EmployerProfile::with('employer:id,name,em_company,em_avatar')->where('pr_career', 'like', '%' . $info->pr_career . '%')->orderByDesc('id')->paginate(5);

			$usersaves = SaveProfileEmployer::where('usa_user_id', Auth::guard('web')->user()->id)->orderByDesc('id')->paginate(5);

			$viewData = [
				'info' => $info,
				'sameJob' => $sameJob,
				'usersaves' => $usersaves,
			];
			return view('nhatuyendung.thongtin', $viewData);
		}
	}

	public function viewListProfile() {

		$profileLists = UserGeneralInfo::with('user:id,name,avatar')->where([
			'ge_status' => UserGeneralInfo::STATUS_PUBLIC,
			//'pr_active' => UserGeneralInfo::ACTIVE_ON,
		])->orderBy('id', 'DESC')->paginate(5);

		$viewData = [
			'profileLists' => $profileLists,
		];

		return view('tuyen-dung', $viewData);
	}

	public function home() {
		$jobs = Job::all();
		$provinces = Province::all();

		$viewData = [
			'jobs' => $jobs,
			'provinces' => $provinces,
		];
		return view('nhatuyendung.home', $viewData);
	}

	public function profileDetail() {

	}

	public function saveProfile() {

	}
}
