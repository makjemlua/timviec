<?php

namespace Modules\Admin\Http\Controllers;

use App\Model\Employer;
use App\Model\EmployerProfile;
use App\Model\Job;
use App\Model\Province;
use App\Model\Transaction;
use DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;

class AdminEmployerController extends Controller {
	public function index() {
		$maps = EmployerProfile::with('employer:id,em_company,em_avatar')->with('map:id,address,latitude,longitude')->where('pr_active', 1)->where('pr_status', 1)->get();
		$encrypted = $maps->toJson();

		$a = Employer::where('em_vip', 0)->pluck('id');
		if ($a->isEmpty()) {
			$a = 0;
		}

		// $han_vip = EmployerProfile::with('employer:id,name')->where('employer_profile.pr_employer_id', $a);

		// dd($han_vip);
		return view('admin::employers.index', compact('maps', 'han_vip'));
	}

	//Xem tài khoản
	public function account(Request $request) {
		$employers = Employer::whereRaw(1);

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

		if ($request->active) {
			$employerProfiles->where('pr_active', '=', $request->active);
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

	//Hóa đơn thanh toán
	public function hoaDon() {
		$transactions = Transaction::with('employer:id,name,email,em_phone,em_company')->orderBy('id', 'DESC')->paginate(5);
		$viewData = [
			'transactions' => $transactions,
		];
		return view('admin::employers.hoadon', $viewData);
	}

	//Xử lý hóa đơn
	public function actionTransaction($id) {
		$transaction = Transaction::find($id);
		//Cap nhap trang thai don phong
		$transaction->tr_status = Transaction::STATUS_DONE;
		$transaction->save();
		return redirect()->back()->with('success', 'Xử lý đơn hàng thành công');
	}

	//Trang thay đổi thời gian vip
	public function viewvip($id) {
		$employer = DB::table('employers')->find($id);

		$viewData = [
			'employer' => $employer,
		];
		return view('admin::employers.changetime', $viewData);
	}
	public function changevip(Request $request, $id) {
		$employer = Employer::find($id);
		$employer->em_timevip = $request->em_timevip;
		$employer->updated_at = Carbon::now();
		$employer->save();
		return redirect()->back()->with('success', 'Cập nhập thành công');
	}
	public function actionVip($active, $id) {
		if ($active) {
			$employer = Employer::find($id);
			switch ($active) {
			case 'vip':
				$employer->em_vip = $employer->em_vip ? 0 : 1;
				$employer->save();
				break;
			}
		}
		return redirect()->back();
	}

	public function actionAccount($active, $id) {
		if ($active) {
			$employer = Employer::find($id);
			switch ($active) {
			case 'delete':
				$employer->delete();
				break;
			case 'active':
				$employer->active = $employer->active ? 0 : 1;
				$employer->save();
				break;
			}
		}
		return redirect()->back();
	}
}
