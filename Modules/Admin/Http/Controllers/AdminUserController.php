<?php

namespace Modules\Admin\Http\Controllers;

use App\Model\Job;
use App\Model\Province;
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

	public function accountDetail($id) {
		$user = User::find($id);
		$viewData = [
			'user' => $user,
		];
		return view('admin::users.account-detail', compact('user'));
	}

	public function profile(Request $request) {
		$userProfiles = UserGeneralInfo::with('user:id,name');

		$jobs = Job::all();

		$provinces = Province::all();

		if ($request->search) {
			$userProfiles->where('pr_title', 'like', '%' . $request->search . '%');
		}

		if ($request->cate) {
			$userProfiles->where('pr_career', $request->cate);
		}

		if ($request->province) {
			$userProfiles->where('pr_provinces', $request->province);
		}

		if ($request->orderby) {
			$orderby = $request->orderby;
			switch ($orderby) {
			case 'name_a':
				$userProfiles->orderBy('pr_title', 'DESC');
				break;
			case 'name_z':
				$userProfiles->orderBy('pr_title', 'ASC');
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
		$viewData = [
			'profile' => $profile,
		];
		return view('admin::users.profile-detail', compact('profile'));
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
