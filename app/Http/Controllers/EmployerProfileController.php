<?php

namespace App\Http\Controllers;

use App\Model\EmployerProfile;
use App\Model\Job;
use App\Model\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class EmployerProfileController extends Controller {
	public function index() {
		$employers = EmployerProfile::where('pr_employer_id', Auth::guard('employers')->user()->id)->orderByDesc('id')->paginate(5);

		return view('nhatuyendung.profile.index', compact('employers'));
	}

	public function view($id) {
		$employers = Auth::guard('employers')->user();
		$profiles = EmployerProfile::find($id);
		$viewData = [
			'employers' => $employers,
			'profiles' => $profiles,
		];
		return view('users.profile.view', $viewData);
	}

	//Trang tạo thông tin hồ sơ
	public function createProfile() {
		$jobs = Job::all();
		$provinces = Province::all();

		$viewData = [
			'jobs' => $jobs,
			'provinces' => $provinces,
		];
		return view('nhatuyendung.profile.create', $viewData);
	}

	public function saveProfile(Request $requestProfile) {

		//Lấy thông tin bài đăng
		$employerProfile = new EmployerProfile();
		$employerProfile->pr_employer_id = Auth::guard('employers')->user()->id;
		$employerProfile->pr_title = $requestProfile->pr_title;
		$employerProfile->pr_slug = Str::slug($requestProfile->pr_title);
		$employerProfile->pr_quantity = $requestProfile->pr_quantity;
		$employerProfile->pr_gender = $requestProfile->pr_gender;
		$employerProfile->pr_description = $requestProfile->pr_description;
		$employerProfile->pr_skill = $requestProfile->pr_skill;
		$employerProfile->pr_attribute = $requestProfile->pr_attribute;
		$employerProfile->pr_level = $requestProfile->pr_level;
		$employerProfile->pr_experience = $requestProfile->pr_experience;
		$employerProfile->pr_salary = $requestProfile->pr_salary;

		$employerProfile->pr_work_time = $requestProfile->pr_work_time;
		$employerProfile->pr_probation_time = $requestProfile->pr_probation_time;
		$employerProfile->pr_benefit = $requestProfile->pr_benefit;
		$employerProfile->pr_career = $requestProfile->pr_career;
		$employerProfile->pr_career_2 = $requestProfile->pr_career_2;
		$employerProfile->pr_provinces = $requestProfile->pr_provinces;
		$employerProfile->pr_expired_at = $requestProfile->pr_expired_at;
		$employerProfile->created_at = Carbon::now();
		$employerProfile->updated_at = Carbon::now();
		$employerProfile->save();

		return redirect()->back()->with('success', 'Thêm mới bài đăng thành công');
	}

	public function editProfile($id) {
		$jobs = Job::all();
		$provinces = Province::all();
		$employerProfile = EmployerProfile::find($id);

		$viewData = [
			'jobs' => $jobs,
			'provinces' => $provinces,
			'employerProfile' => $employerProfile,
		];
		return view('nhatuyendung.profile.update', $viewData);
	}

	public function updateProfile(Request $requestProfile, $id) {
		//Lấy thông tin bài đăng
		$employerProfile = EmployerProfile::find($id);
		$employerProfile->pr_title = $requestProfile->pr_title;
		$employerProfile->pr_slug = Str::slug($requestProfile->pr_title);
		$employerProfile->pr_quantity = $requestProfile->pr_quantity;
		$employerProfile->pr_gender = $requestProfile->pr_gender;
		$employerProfile->pr_description = $requestProfile->pr_description;
		$employerProfile->pr_skill = $requestProfile->pr_skill;
		$employerProfile->pr_attribute = $requestProfile->pr_attribute;
		$employerProfile->pr_level = $requestProfile->pr_level;
		$employerProfile->pr_experience = $requestProfile->pr_experience;
		$employerProfile->pr_salary = $requestProfile->pr_salary;

		$employerProfile->pr_work_time = $requestProfile->pr_work_time;
		$employerProfile->pr_probation_time = $requestProfile->pr_probation_time;
		$employerProfile->pr_benefit = $requestProfile->pr_benefit;
		$employerProfile->pr_career = $requestProfile->pr_career;
		$employerProfile->pr_career_2 = $requestProfile->pr_career_2;
		$employerProfile->pr_provinces = $requestProfile->pr_provinces;
		$employerProfile->pr_expired_at = $requestProfile->pr_expired_at;
		$employerProfile->created_at = Carbon::now();
		$employerProfile->updated_at = Carbon::now();
		$employerProfile->save();

		return redirect()->back()->with('success', 'Cập nhập bài đăng thành công');
	}

	//Các chức năng
	public function action($action, $id) {
		if ($action) {
			$employerProfile = EmployerProfile::find($id);
			switch ($action) {
			case 'delete':
				$employerProfile->delete();
				break;
			case 'active':
				$employerProfile->pr_status = $employerProfile->pr_status ? 0 : 1;
				$employerProfile->save();
				break;
			}
			return redirect()->back();
		}
	}
}
