<?php

namespace App\Http\Controllers;

use App\Model\Degree;
use App\Model\EmployerProfile;
use App\Model\Job;
use App\Model\KinhNghiem;
use App\Model\MucLuong;
use App\Model\Province;
use App\Model\SaveProfileUser;
use App\Model\Skill;
use App\Model\TrinhDo;
use App\Model\UserExperience;
use App\Model\UserGeneralInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class SearchController extends Controller {
	//Việc làm theo ngành nghề
	public function index($slug, $job) {
		//$job = Crypt::decrypt($job);
		$profiles = EmployerProfile::with('employer:id,em_company,em_avatar,name')
			->where([
				'pr_status' => EmployerProfile::STATUS_ON,
				'pr_active' => EmployerProfile::ACTIVE_ON,
			])->where('pr_career', $job)->orderBy('id', 'DESC')->paginate(10);

		$viewData = [
			'profiles' => $profiles,
			'job' => $job,
		];

		return view('search.jobs', $viewData);
	}

	//Việc làm theo khu vực
	public function serachjob($slug, $provinces) {
		//$provinces = Crypt::decrypt($provinces);
		$profiles = EmployerProfile::with('employer:id,em_company,em_avatar,name')
			->where([
				'pr_status' => EmployerProfile::STATUS_ON,
				'pr_active' => EmployerProfile::ACTIVE_ON,
			])->where('pr_provinces', $provinces)->orderBy('id', 'DESC')->paginate(10);

		$viewData = [
			'profiles' => $profiles,
			'provinces' => $provinces,
		];

		return view('search.provinces', $viewData);
	}

	// Xem và tìm kiếm hồ sơ kh
	public function timhoso(Request $request) {
		$jobs = Job::all();
		$provinces = Province::all();
		$mucluong = MucLuong::all();
		$trinhdo = TrinhDo::all();
		$kinhnghiem = KinhNghiem::all();

		$all = $request->all();
		//dd($all);

		$profiles = UserGeneralInfo::with('user:id,name,avatar')

			->where([
				'ge_status' => UserGeneralInfo::STATUS_PUBLIC,
				'ge_active' => UserGeneralInfo::ACTIVE_ON,
			]);

		if ($request->search) {
			$profiles = UserGeneralInfo::with('user:id,name,avatar')
			//Tìm kiếm theo tên
				->where([
					'ge_status' => UserGeneralInfo::STATUS_PUBLIC,
					'ge_active' => UserGeneralInfo::ACTIVE_ON,
				])
				->where('ge_title', 'like', '%' . $request->search . '%')

			//Tìm kiếm theo ngành nghề
				->orWhere([
					'ge_status' => UserGeneralInfo::STATUS_PUBLIC,
					'ge_active' => UserGeneralInfo::ACTIVE_ON,
				])
				->where('ge_profession', 'like', '%' . $request->search . '%')

			//Tìm kiếm theo địa điểm
				->orWhere([
					'ge_status' => UserGeneralInfo::STATUS_PUBLIC,
					'ge_active' => UserGeneralInfo::ACTIVE_ON,
				])
				->where('ge_provinces', 'like', '%' . $request->search . '%');

		}

		// tìm kiếm
		$request->has("job") ? $profiles = $profiles->where("ge_profession", "like", "%" . $request["job"] . "%") : "";
		$request->has("province") ? $profiles = $profiles->where("ge_provinces", "like", "%" . $request["province"] . "%") : "";
		$request->has("trinh") ? $profiles = $profiles->where("ge_level", "like", "%" . $request["trinh"] . "%") : "";
		$request->has("nghiem") ? $profiles = $profiles->where("ge_experience", "like", "%" . $request["nghiem"] . "%") : "";
		$request->has("gt") ? $profiles = $profiles->where("gender", "like", "%" . $request["gt"] . "%") : "";
		//$request->has("nghiem") ? $profiles = $profiles->whereIn("ge_experience", explode(',', $request["nghiem"])) : "";
		if ($request->luong) {
			$luong = $request->luong;
			switch ($luong) {
			case '1':
				$profiles->where('ge_salary_min', '<', 3000000);
				break;
			case '2':
				$profiles->whereBetween('ge_salary_min', [3000000, 4999999]);
				break;
			case '3':
				$profiles->whereBetween('ge_salary_min', [5000000, 6999999]);
				break;
			case '4':
				$profiles->whereBetween('ge_salary_min', [7000000, 9999999]);
				break;
			case '5':
				$profiles->whereBetween('ge_salary_min', [10000000, 11999999]);
				break;
			case '6':
				$profiles->whereBetween('ge_salary_min', [12000000, 14999999]);
				break;
			case '7':
				$profiles->whereBetween('ge_salary_min', [15000000, 19999999]);
				break;
			case '8':
				$profiles->whereBetween('ge_salary_min', [20000000, 24999999]);
				break;
			case '9':
				$profiles->whereBetween('ge_salary_min', [25000000, 29999999]);
				break;
			case '10':
				$profiles->whereBetween('ge_salary_min', [30000000, 39999999]);
				break;
			case '11':
				$profiles->whereBetween('ge_salary_min', [40000000, 49999999]);
				break;
			case '12':
				$profiles->where('ge_salary_min', '>=', 50000000);
				break;
			}
		}
		// end tìm kiếm

		$count = $profiles->count();

		$profiles = $profiles->orderByDesc('id')->paginate(5);

		$viewData = [
			'jobs' => $jobs,
			'provinces' => $provinces,
			'mucluong' => $mucluong,
			'trinhdo' => $trinhdo,
			'kinhnghiem' => $kinhnghiem,
			'profiles' => $profiles,
			'count' => $count,
		];
		return view('nhatuyendung.timhoso', $viewData);

	}

	//Xem chi tiết hồ sơ
	public function viewProfile(Request $request) {
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

			$employersaves = '';
			if (Auth::guard('employers')->check()) {
				$employersaves = SaveProfileUser::where('sa_employer_id', Auth::guard('employers')->user()->id)->orderByDesc('id')->where('sa_profile_id', $id)->get();
			}

			$years = Carbon::parse($info->user->birthday)->age;

			//$usersaves = SaveProfileEmployer::all();

			//$applies = Applied::all();

			// if (Auth::guard('web')->check()) {
			// 	$usersaves = SaveProfileEmployer::where('usa_user_id', Auth::guard('web')->user()->id)->orderByDesc('id')->where('usa_profile_id', $id)->get();
			// 	$applies = Applied::where('ap_user_id', Auth::guard('web')->user()->id)->orderByDesc('id')->where('ap_profile_id', $id)->get();
			// }

			$viewData = [
				'info' => $info,
				'education' => $education,
				'exp' => $exp,
				'skill' => $skill,
				'years' => $years,
				'employersaves' => $employersaves,
				//'sameJob' => $sameJob,
				//'usersaves' => $usersaves,
				//'applies' => $applies,
			];
			return view('profile-detail', $viewData);
		}
	}
}
