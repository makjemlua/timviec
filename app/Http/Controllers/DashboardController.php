<?php

namespace App\Http\Controllers;

use App\Model\SaveProfileEmployer;
use App\Model\UserGeneralInfo;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller {
	public function __construct() {
		$userProfile = UserGeneralInfo::all();
		$saveProfile = SaveProfileEmployer::all();
		$viewData = [
			'userProfile' => $userProfile,
			'saveProfile' => $saveProfile,
		];
		View::share($viewData);
	}
}
