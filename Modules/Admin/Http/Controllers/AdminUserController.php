<?php

namespace Modules\Admin\Http\Controllers;

use App\Model\Degree;
use App\Model\Job;
use App\Model\Language;
use App\Model\Province;
use App\Model\Skill;
use App\Model\UserExperience;
use App\Model\UserGeneralInfo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminUserController extends Controller {
	public function index() {
		return view('admin::users.index');
	}
	public function account(Request $request) {
		$users = User::whereRaw(1);

		if ($request->search) {
			$users->where('name', 'like', '%' . $request->search . '%');
		}

		$users = $users->orderBy('id', 'DESC')->paginate(10);

		$viewData = [
			'users' => $users,
		];
		return view('admin::users.account', $viewData);
	}

	public function profile(Request $request) {
		$userProfiles = UserGeneralInfo::with('user:id,name,email');

		$jobs = Job::all();

		$provinces = Province::all();

		if ($request->search) {
			$userProfiles->where('ge_title', 'like', '%' . $request->search . '%');
		}

		if ($request->cate) {
			$userProfiles->where('ge_profession', $request->cate);
		}

		if ($request->province) {
			$userProfiles->where('ge_provinces', $request->province);
		}

		if ($request->orderby) {
			$orderby = $request->orderby;
			switch ($orderby) {
			case 'name_a':
				$userProfiles->orderBy('ge_title', 'DESC');
				break;
			case 'name_z':
				$userProfiles->orderBy('ge_title', 'ASC');
				break;
			case 'date_desc':
				$userProfiles->orderBy('id', 'ASC');
				break;
			case 'date_asc':
				$userProfiles->orderBy('id', 'DESC');
				break;
			default:
				$userProfiles->orderBy('id', 'DESC');
				break;
			}
		}

		$userProfiles = $userProfiles->paginate(10);

		//dd($userProfiles);

		$viewData = [
			'userProfiles' => $userProfiles,
			'jobs' => $jobs,
			'provinces' => $provinces,
		];
		return view('admin::users.profile', $viewData);
	}

	public function detailProfile($id) {
		$profile = UserGeneralInfo::find($id);
		$profileExp = UserExperience::find($id);
		$degrees = Degree::find($id);
		$languages = Language::find($id);
		$skills = Skill::find($id);

		$viewData = [
			'profile' => $profile,
			'profileExp' => $profileExp,
			'degrees' => $degrees,
			'languages' => $languages,
			'skills' => $skills,
		];
		return view('admin::users.profile-detail', $viewData);
	}

	public function actionAccount($active, $id) {
		if ($active) {
			$user = User::find($id);
			switch ($active) {
			case 'delete':
				$user->delete();
				break;
			case 'active':
				$user->active = $user->active ? 0 : 1;
				$user->save();
				break;
			}
		}
		return redirect()->back();
	}
	public function actionProfile($active, $id) {
		if ($active) {
			$profile = UserGeneralInfo::find($id);
			switch ($active) {
			case 'delete':
				$profile->delete();
				break;
			case 'active':
				$profile->ge_active = $profile->ge_active ? 0 : 1;
				$profile->save();
				break;
			}
		}
		return redirect()->back();
	}
}
