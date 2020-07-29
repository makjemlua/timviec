<?php

namespace App\Http\Controllers;

use App\Model\Employer;
use App\Model\EmployerProfile;
use App\Model\Job;
use App\Model\Map;
use App\Model\Province;
use App\Model\SaveProfileEmployer;
use App\Model\UserApplied;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class EmployerProfileController extends Controller {
	public function index() {
		$employers = EmployerProfile::where('pr_employer_id', Auth::guard('employers')->user()->id)->orderByDesc('id')->paginate(5);

		$check_info = Employer::where('id', get_data_user('employers'))->first();

		return view('nhatuyendung.profile.index', compact('employers', 'check_info'));
	}

	public function view($id) {
		$employers = Auth::guard('employers')->user();
		$profiles = EmployerProfile::find($id);
		$viewData = [
			'employers' => $employers,
			'profiles' => $profiles,
		];
		return view('nhatuyendung.profile.view', $viewData);
	}

	//Trang tạo thông tin hồ sơ
	public function createProfile() {
		$jobs = Job::all();
		$provinces = Province::all();
		$check_info = Employer::where('id', get_data_user('employers'))->first();
		if ($check_info->em_phone == null || $check_info->em_address == null || $check_info->em_avatar == null || $check_info->em_company == null) {
			return redirect()->route('employer.info')->with('danger', 'Bạn chưa nhập đầy đủ thông tin');
		}
		$check_10 = EmployerProfile::where('pr_employer_id', Auth::guard('employers')->user()->id)->orderByDesc('id')->paginate(5);
		if (count($check_10) >= 10) {
			return redirect()->route('employer.profile.index')->with('danger', 'Bạn đã tạo 10 bài tuyển dụng');
		}

		$viewData = [
			'jobs' => $jobs,
			'provinces' => $provinces,
			'check_info' => $check_info,
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

		$map = new Map();
		$map->ma_employer_id = get_data_user('employers');
		$map->address = $requestProfile->autocomplete;
		$map->latitude = $requestProfile->latitude;
		$map->longitude = $requestProfile->longitude;
		$map->created_at = Carbon::now();
		$map->updated_at = Carbon::now();
		$map->save();

		return redirect()->back()->with('success', 'Thêm mới bài đăng thành công');
	}

	public function editProfile($id) {
		$jobs = Job::all();
		$provinces = Province::all();
		$employerProfile = EmployerProfile::find($id);
		$map = Map::find($id);

		$viewData = [
			'jobs' => $jobs,
			'provinces' => $provinces,
			'employerProfile' => $employerProfile,
			'map' => $map,
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

		$map = Map::find($id);
		$map->ma_employer_id = get_data_user('employers');
		$map->address = $requestProfile->autocomplete;
		$map->latitude = $requestProfile->latitude;
		$map->longitude = $requestProfile->longitude;
		$map->created_at = Carbon::now();
		$map->updated_at = Carbon::now();
		$map->save();

		return redirect()->back()->with('success', 'Cập nhập bài đăng thành công');
	}

	//Các chức năng
	public function action($action, $id) {
		if ($action) {
			$employerProfile = EmployerProfile::find($id);
			$applie = UserApplied::where('ap_profile_id', $id);
			$userSaveEmployer = SaveProfileEmployer::where('usa_profile_id', $id);
			//$transaction = Transaction::find('tr_employer_id', $id);
			switch ($action) {
			case 'delete':
				$applie->delete();
				$userSaveEmployer->delete();
				//$transaction->delete();
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
