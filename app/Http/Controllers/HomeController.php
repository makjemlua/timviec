<?php

namespace App\Http\Controllers;

use App\Model\EmployerProfile;
use App\Model\Job;
use App\Model\Province;
use Illuminate\Http\Request;

class HomeController extends Controller {
	public function index(Request $request) {

		//Bài đăng mới
		$profileNew = EmployerProfile::with('employer:id,em_company,em_avatar')
			->where([
				'pr_status' => EmployerProfile::STATUS_ON,
				'pr_active' => EmployerProfile::ACTIVE_ON,
				'pr_moi' => EmployerProfile::MOI_ON,
			])->orderBy('id', 'DESC')->limit(10)->get();

		//Bài đăng hot
		$profileHot = EmployerProfile::with('employer:id,em_company,em_avatar')
			->where([
				'pr_status' => EmployerProfile::STATUS_ON,
				'pr_active' => EmployerProfile::ACTIVE_ON,
				'pr_hot' => EmployerProfile::HOT_ON,
			])->limit(10)->get();

		//Tuyển gấp
		$profilePrompt = EmployerProfile::with('employer:id,em_company,em_avatar')
			->where([
				'pr_status' => EmployerProfile::STATUS_ON,
				'pr_active' => EmployerProfile::ACTIVE_ON,
				'pr_hot' => EmployerProfile::HOT_ON,
			])->limit(10)->get();

		$jobs = Job::all();

		$provinces = Province::all();

		$profiles = EmployerProfile::with('employer:id,em_company,em_avatar')
			->where([
				'pr_status' => EmployerProfile::STATUS_ON,
				'pr_active' => EmployerProfile::ACTIVE_ON,
			]);

		if ($request->search && $request->job && $request->province) {
			$profiles = EmployerProfile::with('employer:id,em_company,em_avatar')
				->where([
					'pr_status' => EmployerProfile::STATUS_ON,
					'pr_active' => EmployerProfile::ACTIVE_ON,
				]);

			$profiles->where('pr_title', 'like', '%' . $request->search . '%')->where('pr_career', $request->job)->where('pr_provinces', $request->province);

			//$profiles->where('pr_career', $request->job);

			$profiles = $profiles->orderByDesc('id')->paginate(5);

			return view('tim-viec-lam', compact('profiles'));
		} elseif ($request->search && $request->job) {
			$profiles = EmployerProfile::with('employer:id,em_company,em_avatar')
				->where([
					'pr_status' => EmployerProfile::STATUS_ON,
					'pr_active' => EmployerProfile::ACTIVE_ON,
				]);

			$profiles->where('pr_title', 'like', '%' . $request->search . '%')->where('pr_career', $request->job);

			$profiles = $profiles->orderByDesc('id')->paginate(5);

			return view('tim-viec-lam', compact('profiles'));
		} elseif ($request->job && $request->province) {
			$profiles = EmployerProfile::with('employer:id,em_company,em_avatar')
				->where([
					'pr_status' => EmployerProfile::STATUS_ON,
					'pr_active' => EmployerProfile::ACTIVE_ON,
				]);

			$profiles->where('pr_career', $request->job)->where('pr_provinces', $request->province);

			$profiles = $profiles->orderByDesc('id')->paginate(5);

			return view('tim-viec-lam', compact('profiles'));
		} elseif ($request->search && $request->province) {
			$profiles = EmployerProfile::with('employer:id,em_company,em_avatar')
				->where([
					'pr_status' => EmployerProfile::STATUS_ON,
					'pr_active' => EmployerProfile::ACTIVE_ON,
				]);

			$profiles->where('pr_title', 'like', '%' . $request->search . '%')->where('pr_provinces', $request->province);
			$profiles = $profiles->orderByDesc('id')->paginate(5);

			return view('tim-viec-lam', compact('profiles'));
		} elseif ($request->search) {
			$profiles = EmployerProfile::with('employer:id,em_company,em_avatar')
				->where([
					'pr_status' => EmployerProfile::STATUS_ON,
					'pr_active' => EmployerProfile::ACTIVE_ON,
				]);

			$profiles->where('pr_title', 'like', '%' . $request->search . '%');
			$profiles = $profiles->orderByDesc('id')->paginate(5);

			return view('tim-viec-lam', compact('profiles'));
		} elseif ($request->job) {
			$profiles = EmployerProfile::with('employer:id,em_company,em_avatar')
				->where([
					'pr_status' => EmployerProfile::STATUS_ON,
					'pr_active' => EmployerProfile::ACTIVE_ON,
				]);

			$profiles->where('pr_career', $request->job);
			$profiles = $profiles->orderByDesc('id')->paginate(5);

			return view('tim-viec-lam', compact('profiles'));
		} elseif ($request->province) {
			$profiles = EmployerProfile::with('employer:id,em_company,em_avatar')
				->where([
					'pr_status' => EmployerProfile::STATUS_ON,
					'pr_active' => EmployerProfile::ACTIVE_ON,
				]);

			$profiles->where('pr_provinces', $request->province);
			$profiles = $profiles->orderByDesc('id')->paginate(5);

			return view('tim-viec-lam', compact('profiles'));
		}

		$viewData = [
			'profileNew' => $profileNew,
			'profileHot' => $profileHot,
			'profilePrompt' => $profilePrompt,
			'profiles' => $profiles,
			'jobs' => $jobs,
			'provinces' => $provinces,
		];

		return view('home.index', $viewData);
	}

}
