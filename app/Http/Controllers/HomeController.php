<?php

namespace App\Http\Controllers;

use App\Model\Employer;
use App\Model\EmployerProfile;
use App\Model\Job;
use App\Model\Province;
use App\Model\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller {
	public function index(Request $request) {

		//Bài đăng mới
		$profileNew = EmployerProfile::with('employer:id,em_company,em_avatar,name')
			->where([
				'pr_status' => EmployerProfile::STATUS_ON,
				'pr_active' => EmployerProfile::ACTIVE_ON,
			])->orderBy('id', 'DESC')->paginate(16);

		//Top thương hiệu
		$companys = Employer::where([
			'em_vip' => Employer::VIP_ON,
		])->orderBy('id', 'DESC')->paginate(10);

		$jobs = Job::all();

		$provinces = Province::all();

		$profiles = EmployerProfile::with('employer:id,em_company,em_avatar')
			->where([
				'pr_status' => EmployerProfile::STATUS_ON,
				'pr_active' => EmployerProfile::ACTIVE_ON,
			]);

		//Tim kiem

		if ($request->search && $request->job && $request->province) {
			$profiles = EmployerProfile::with('employer:id,em_company,em_avatar')
				->where([
					'pr_status' => EmployerProfile::STATUS_ON,
					'pr_active' => EmployerProfile::ACTIVE_ON,
				]);

			$profiles->where('pr_title', 'like', '%' . $request->search . '%')->where('pr_career', $request->job)->where('pr_provinces', $request->province);

			$count = $profiles->count();

			$profiles = $profiles->orderByDesc('id')->paginate(5);

			return view('tim-viec-lam', compact('profiles'));
		} elseif ($request->search && $request->job) {
			$profiles = EmployerProfile::with('employer:id,em_company,em_avatar')
				->where([
					'pr_status' => EmployerProfile::STATUS_ON,
					'pr_active' => EmployerProfile::ACTIVE_ON,
				]);

			$profiles->where('pr_title', 'like', '%' . $request->search . '%')->where('pr_career', $request->job);

			$count = $profiles->count();

			$profiles = $profiles->orderByDesc('id')->paginate(5);

			return view('tim-viec-lam', compact('profiles', 'count'));
		} elseif ($request->job && $request->province) {
			$profiles = EmployerProfile::with('employer:id,em_company,em_avatar')
				->where([
					'pr_status' => EmployerProfile::STATUS_ON,
					'pr_active' => EmployerProfile::ACTIVE_ON,
				]);

			$profiles->where('pr_career', $request->job)->where('pr_provinces', $request->province);

			$count = $profiles->count();

			$profiles = $profiles->orderByDesc('id')->paginate(5);

			return view('tim-viec-lam', compact('profiles', 'count'));
		} elseif ($request->search && $request->province) {
			$profiles = EmployerProfile::with('employer:id,em_company,em_avatar')
				->where([
					'pr_status' => EmployerProfile::STATUS_ON,
					'pr_active' => EmployerProfile::ACTIVE_ON,
				]);

			$profiles->where('pr_title', 'like', '%' . $request->search . '%')->where('pr_provinces', $request->province);

			$count = $profiles->count();

			$profiles = $profiles->orderByDesc('id')->paginate(5);

			return view('tim-viec-lam', compact('profiles', 'count'));
		} elseif ($request->search) {
			$profiles = EmployerProfile::with('employer:id,em_company,em_avatar')
				->where([
					'pr_status' => EmployerProfile::STATUS_ON,
					'pr_active' => EmployerProfile::ACTIVE_ON,
				]);

			$profiles->where('pr_title', 'like', '%' . $request->search . '%');

			$count = $profiles->count();

			$profiles = $profiles->orderByDesc('id')->paginate(5);

			return view('tim-viec-lam', compact('profiles', 'count'));
		} elseif ($request->job) {
			$profiles = EmployerProfile::with('employer:id,em_company,em_avatar')
				->where([
					'pr_status' => EmployerProfile::STATUS_ON,
					'pr_active' => EmployerProfile::ACTIVE_ON,
				]);

			$profiles->where('pr_career', $request->job);

			$count = $profiles->count();

			$profiles = $profiles->orderByDesc('id')->paginate(5);

			return view('tim-viec-lam', compact('profiles', 'count'));
		} elseif ($request->province) {
			$profiles = EmployerProfile::with('employer:id,em_company,em_avatar')
				->where([
					'pr_status' => EmployerProfile::STATUS_ON,
					'pr_active' => EmployerProfile::ACTIVE_ON,
				]);

			$profiles->where('pr_provinces', $request->province);

			$count = $profiles->count();

			$profiles = $profiles->orderByDesc('id')->paginate(5);

			return view('tim-viec-lam', compact('profiles', 'count'));
		}

		if ($request->ajax()) {
			return view('home.newajax', compact('profileNew'));
		}

		$tinhtien = 0;
		if ($request->date_from && $request->date_to) {
			$tinhtien = Transaction::whereBetween('created_at', [$request->date_from, $request->date_to])->sum('tr_total');
		}

		$viewData = [
			'profileNew' => $profileNew,
			'companys' => $companys,
			'profiles' => $profiles,
			'jobs' => $jobs,
			'provinces' => $provinces,
			'tinhtien' => $tinhtien,
		];

		return view('home.index', $viewData);
	}

}
