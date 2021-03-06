<?php

namespace App\Http\Controllers;

use App\Model\Degree;
use App\Model\Job;
use App\Model\Language;
use App\Model\Province;
use App\Model\SaveProfileUser;
use App\Model\Skill;
use App\Model\UserApplied;
use App\Model\UserExperience;
use App\Model\UserGeneralInfo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserProfileController extends Controller {

	//Trang hiển thị danh sách hồ sơ
	public function index() {

		$userProfile = UserGeneralInfo::where('ge_user_id', Auth::guard('web')->user()->id)->orderByDesc('id')->paginate(5);

		$count1 = UserGeneralInfo::where('ge_user_id', get_data_user('web', 'id'))->where('ge_status', 1)->count();

		$check = Auth::guard('web')->user();

		$applied = UserApplied::where('ap_user_id', Auth::guard('web')->user()->id)->count();

		//dd($applied);

		$viewData = [
			'userProfile' => $userProfile,
			'count1' => $count1,
			'check' => $check,
			'applied' => $applied,
		];

		return view('users.profile.index', $viewData);
	}

	//Xem hồ sơ
	public function view($id) {
		$user = Auth::guard('web')->user();
		$userProfile = UserGeneralInfo::find($id);
		$userProfileExp = UserExperience::find($id);
		$degrees = Degree::find($id);
		$languages = Language::find($id);
		$skills = Skill::find($id);
		$viewData = [
			'userProfile' => $userProfile,
			'userProfileExp' => $userProfileExp,
			'user' => $user,
			'degrees' => $degrees,
			'languages' => $languages,
			'skills' => $skills,
		];
		return view('users.profile.view', $viewData);
	}

	//Trang tạo thông tin hồ sơ
	public function createProfile() {
		$jobs = Job::all();
		$provinces = Province::all();
		$check = Auth::guard('web')->user();
		if ($check->name == null || $check->phone == null || $check->birthday == null || $check->gender == null || $check->address == null || $check->avatar == null) {
			return redirect()->route('user.info')->with('danger', 'Bạn chưa nhập đầy đủ thông tin');
		}

		$check_2 = UserGeneralInfo::where('ge_user_id', Auth::guard('web')->user()->id)->orderByDesc('id')->paginate(5);
		if (count($check_2) >= 2) {
			return redirect()->route('user.profile.index')->with('danger', 'Bạn đã tạo 2 hồ sơ');
		}

		$viewData = [
			'jobs' => $jobs,
			'provinces' => $provinces,
			'check' => $check,
		];
		return view('users.profile.create', $viewData);
	}

	public function saveProfile(Request $requestProfile) {

		//Lấy thông tin chung
		$userProfile = new UserGeneralInfo();
		$userProfile->ge_user_id = Auth::guard('web')->user()->id;
		$userProfile->ge_title = $requestProfile->ge_title;
		$userProfile->ge_slug = Str::slug($requestProfile->ge_title);
		$userProfile->ge_level = $requestProfile->ge_level;
		$userProfile->ge_experience = $requestProfile->ge_experience;
		$userProfile->ge_position_current = $requestProfile->ge_position_current;
		$userProfile->ge_position = $requestProfile->ge_position;
		$userProfile->ge_profession = $requestProfile->ge_profession;
		$userProfile->ge_salary_min = $requestProfile->ge_salary_min;
		$userProfile->ge_provinces = $requestProfile->ge_provinces;
		$userProfile->ge_career = $requestProfile->ge_career;
		$userProfile->created_at = Carbon::now();
		$userProfile->updated_at = Carbon::now();
		$userProfile->save();

		//Lấy thông tin kinh nghiệm
		$userProfileExp = new UserExperience();
		$userProfileExp->ex_user_id = Auth::guard('web')->user()->id;
		$userProfileExp->ex_company_name = $requestProfile->ex_company_name;
		$userProfileExp->ex_position_exp = $requestProfile->ex_position_exp;
		$userProfileExp->ex_month_from = $requestProfile->ex_month_from;
		$userProfileExp->ex_year_from = $requestProfile->ex_year_from;
		$userProfileExp->ex_month_to = $requestProfile->ex_month_to;
		$userProfileExp->ex_year_to = $requestProfile->ex_year_to;
		$userProfileExp->ex_current_salary = $requestProfile->ex_current_salary;
		$userProfileExp->ex_description = $requestProfile->ex_description;
		$userProfileExp->ex_achieve = $requestProfile->ex_achieve;
		$userProfileExp->created_at = Carbon::now();
		$userProfileExp->updated_at = Carbon::now();
		$userProfileExp->save();

		//Lấy thông trình độ & bằng cấp
		$degrees = new Degree();
		$degrees->de_user_id = Auth::guard('web')->user()->id;
		$degrees->de_level_1 = $requestProfile->de_level_1;
		$degrees->de_school_1 = $requestProfile->de_school_1;
		$degrees->de_year_from_1 = $requestProfile->de_year_from_1;
		$degrees->de_year_to_1 = $requestProfile->de_year_to_1;
		$degrees->de_diploma_1 = $requestProfile->de_diploma_1;
		$degrees->de_loai_tn_1 = $requestProfile->de_loai_tn_1;

		$degrees->de_level_2 = $requestProfile->de_level_2;
		$degrees->de_school_2 = $requestProfile->de_school_2;
		$degrees->de_year_from_2 = $requestProfile->de_year_from_2;
		$degrees->de_year_to_2 = $requestProfile->de_year_to_2;
		$degrees->de_diploma_2 = $requestProfile->de_diploma_2;
		$degrees->de_loai_tn_2 = $requestProfile->de_loai_tn_2;

		$degrees->created_at = Carbon::now();
		$degrees->updated_at = Carbon::now();
		$degrees->save();

		//Lấy thông tin ngoại ngữ & tin học
		$languages = new Language();
		$languages->la_user_id = Auth::guard('web')->user()->id;
		$languages->la_language = $requestProfile->la_language;
		$languages->la_language_level = $requestProfile->la_language_level;
		$languages->la_listen = $requestProfile->la_listen;
		$languages->la_speak = $requestProfile->la_speak;
		$languages->la_read = $requestProfile->la_read;
		$languages->la_write = $requestProfile->la_write;
		$languages->created_at = Carbon::now();
		$languages->updated_at = Carbon::now();
		$languages->save();

		//Lấy thông tin kỹ năng & sở trường
		$skills = new Skill();
		$skills->sk_user_id = Auth::guard('web')->user()->id;

		$skills->sk_skill_1 = $requestProfile->sk_skill_1;
		$skills->sk_percent_1 = $requestProfile->sk_percent_1;

		$skills->sk_skill_2 = $requestProfile->sk_skill_2;
		$skills->sk_percent_2 = $requestProfile->sk_percent_2;

		$skills->sk_skill_3 = $requestProfile->sk_skill_3;
		$skills->sk_percent_3 = $requestProfile->sk_percent_3;

		$skills->sk_skill_4 = $requestProfile->sk_skill_4;
		$skills->sk_percent_4 = $requestProfile->sk_percent_4;

		$skills->sk_interesting = $requestProfile->sk_interesting;
		$skills->sk_speial_skill = $requestProfile->sk_speial_skill;
		$skills->created_at = Carbon::now();
		$skills->updated_at = Carbon::now();
		$skills->save();
		return redirect()->back()->with('success', 'Thêm mới hồ sơ thành công');
	}

	//Trang chỉnh sửa thông tin hồ sơ
	public function editProfile($id) {
		$jobs = Job::all();
		$provinces = Province::all();
		$userProfile = UserGeneralInfo::find($id);
		$userProfileExp = UserExperience::find($id);
		$degrees = Degree::find($id);
		$languages = Language::find($id);
		$skills = Skill::find($id);

		$viewData = [
			'jobs' => $jobs,
			'userProfile' => $userProfile,
			'userProfileExp' => $userProfileExp,
			'degrees' => $degrees,
			'languages' => $languages,
			'skills' => $skills,
			'provinces' => $provinces,
		];
		return view('users.profile.update', $viewData);
	}

	public function updateProfile(Request $requestProfile, $id) {

		//Update thông tin chung
		$userProfile = UserGeneralInfo::find($id);
		$userProfile->ge_title = $requestProfile->ge_title;
		$userProfile->ge_slug = Str::slug($requestProfile->ge_title);
		$userProfile->ge_level = $requestProfile->ge_level;
		$userProfile->ge_experience = $requestProfile->ge_experience;
		$userProfile->ge_position_current = $requestProfile->ge_position_current;
		$userProfile->ge_position = $requestProfile->ge_position;
		$userProfile->ge_profession = $requestProfile->ge_profession;
		$userProfile->ge_salary_min = $requestProfile->ge_salary_min;
		$userProfile->ge_provinces = $requestProfile->ge_provinces;
		$userProfile->ge_career = $requestProfile->ge_career;
		$userProfile->created_at = Carbon::now();
		$userProfile->updated_at = Carbon::now();
		$userProfile->save();

		//Update thông tin kinh nghiệm
		$userProfileExp = UserExperience::find($id);
		$userProfileExp->ex_company_name = $requestProfile->ex_company_name;
		$userProfileExp->ex_position_exp = $requestProfile->ex_position_exp;
		$userProfileExp->ex_month_from = $requestProfile->ex_month_from;
		$userProfileExp->ex_year_from = $requestProfile->ex_year_from;
		$userProfileExp->ex_month_to = $requestProfile->ex_month_to;
		$userProfileExp->ex_year_to = $requestProfile->ex_year_to;
		$userProfileExp->ex_current_salary = $requestProfile->ex_current_salary;
		$userProfileExp->ex_description = $requestProfile->ex_description;
		$userProfileExp->ex_achieve = $requestProfile->ex_achieve;
		$userProfileExp->created_at = Carbon::now();
		$userProfileExp->updated_at = Carbon::now();
		$userProfileExp->save();

		//Update thông trình độ & bằng cấp
		$degrees = Degree::find($id);
		$degrees->de_level_1 = $requestProfile->de_level_1;
		$degrees->de_school_1 = $requestProfile->de_school_1;
		$degrees->de_year_from_1 = $requestProfile->de_year_from_1;
		$degrees->de_year_to_1 = $requestProfile->de_year_to_1;
		$degrees->de_diploma_1 = $requestProfile->de_diploma_1;
		$degrees->de_loai_tn_1 = $requestProfile->de_loai_tn_1;

		$degrees->de_level_2 = $requestProfile->de_level_2;
		$degrees->de_school_2 = $requestProfile->de_school_2;
		$degrees->de_year_from_2 = $requestProfile->de_year_from_2;
		$degrees->de_year_to_2 = $requestProfile->de_year_to_2;
		$degrees->de_diploma_2 = $requestProfile->de_diploma_2;
		$degrees->de_loai_tn_2 = $requestProfile->de_loai_tn_2;
		$degrees->created_at = Carbon::now();
		$degrees->updated_at = Carbon::now();
		$degrees->save();

		//Update thông tin ngoại ngữ & tin học
		$languages = Language::find($id);
		$languages->la_language = $requestProfile->la_language;
		$languages->la_language_level = $requestProfile->la_language_level;
		$languages->la_listen = $requestProfile->la_listen;
		$languages->la_speak = $requestProfile->la_speak;
		$languages->la_read = $requestProfile->la_read;
		$languages->la_write = $requestProfile->la_write;
		$languages->la_word = $requestProfile->la_word;
		$languages->la_powerpoint = $requestProfile->la_powerpoint;
		$languages->la_excel = $requestProfile->la_excel;
		$languages->la_outlook = $requestProfile->la_outlook;
		$languages->la_other_skill = $requestProfile->la_other_skill;
		$languages->la_special_achieve = $requestProfile->la_special_achieve;
		$languages->created_at = Carbon::now();
		$languages->updated_at = Carbon::now();
		$languages->save();

		//Update thông tin kỹ năng & sở trường
		$skills = Skill::find($id);

		$skills->sk_skill_1 = $requestProfile->sk_skill_1;
		$skills->sk_percent_1 = $requestProfile->sk_percent_1;

		$skills->sk_skill_2 = $requestProfile->sk_skill_2;
		$skills->sk_percent_2 = $requestProfile->sk_percent_2;

		$skills->sk_skill_3 = $requestProfile->sk_skill_3;
		$skills->sk_percent_3 = $requestProfile->sk_percent_3;

		$skills->sk_skill_4 = $requestProfile->sk_skill_4;
		$skills->sk_percent_4 = $requestProfile->sk_percent_4;

		$skills->sk_interesting = $requestProfile->sk_interesting;
		$skills->sk_speial_skill = $requestProfile->sk_speial_skill;
		$skills->created_at = Carbon::now();
		$skills->updated_at = Carbon::now();
		$skills->save();

		return redirect()->back()->with('success', 'Cập nhập hồ sơ thành công');
	}

	//Các chức năng
	public function action($action, $id) {
		if ($action) {
			$userProfile = UserGeneralInfo::find($id);
			$userProfileExp = UserExperience::find($id);
			$degrees = Degree::find($id);
			$languages = Language::find($id);
			$skills = Skill::find($id);
			$EmployerSaveProfile = SaveProfileUser::where('sa_profile_id', $id);
			$userApplie = UserApplied::where('ap_hoso_id', $id);
			switch ($action) {
			case 'delete':
				$EmployerSaveProfile->delete();
				$userApplie->delete();
				$userProfileExp->delete();
				$degrees->delete();
				$languages->delete();
				$skills->delete();
				$userProfile->delete();

				break;
			case 'active':
				$userProfile->ge_status = $userProfile->ge_status ? 0 : 1;
				$userProfile->save();
				break;
			}
			return redirect()->back();
		}
	}
}
