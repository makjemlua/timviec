<?php

namespace Modules\Admin\Http\Controllers;

use App\Model\EmployerProfile;
use App\Model\Job;
use App\Model\Province;
use DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminEmployerController extends Controller {
	public function index() {
		return view('admin::employers.index');
	}

	//Xem tài khoản
	public function account(Request $request) {
		$employers = DB::table('employers');

		if ($request->search) {
			$employers->where('name', 'like', '%' . $request->search . '%');
		}
		if ($request->cate) {
			$employers->where('em_vip', $request->cate);
		}

		$employers = $employers->orderBy('id', 'DESC')->paginate(10);

		$viewData = [
			'employers' => $employers,
		];
		return view('admin::employers.account', $viewData);
	}

	//Bài đăng tuyển dụng
	public function recruitment(Request $request) {

		$employerProfiles = EmployerProfile::with('employer:id,name,em_company,em_vip,em_timevip');

		$jobs = Job::all();

		$provinces = Province::all();

		if ($request->search) {
			$employerProfiles->where('pr_title', 'like', '%' . $request->search . '%');
		}

		if ($request->cate) {
			$employerProfiles->where('pr_career', $request->cate);
		}

		if ($request->province) {
			$employerProfiles->where('pr_provinces', $request->province);
		}

		if ($request->orderby) {
			$orderby = $request->orderby;
			switch ($orderby) {
			case 'name_a':
				$employerProfiles->orderBy('pr_title', 'DESC');
				break;
			case 'name_z':
				$employerProfiles->orderBy('pr_title', 'ASC');
				break;
			case 'date_desc':
				$employerProfiles->orderBy('id', 'ASC');
				break;
			case 'date_asc':
				$employerProfiles->orderBy('id', 'DESC');
				break;
			default:
				$employerProfiles->orderBy('id', 'DESC');
				break;
			}
		}

		$employerProfiles = $employerProfiles->paginate(10);

		//dd($employerProfiles);

		$viewData = [
			'employerProfiles' => $employerProfiles,
			'jobs' => $jobs,
			'provinces' => $provinces,
		];
		return view('admin::employers.recruitment', $viewData);
	}

	//Xem chi tiết bài đăng
	public function detailProfile($id) {
		$employerProfile = EmployerProfile::find($id);
		$viewData = [
			'employerProfile' => $employerProfile,
		];
		return view('admin::employers.recruitment-detail', $viewData);
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
				$employerProfile->pr_active = $employerProfile->pr_active ? 0 : 1;
				$employerProfile->save();
				break;
			}
			return redirect()->back();
		}
	}
}
