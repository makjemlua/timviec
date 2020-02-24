<?php

namespace App\Http\Controllers;

use App\Model\UserGeneralInfo;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller {
	public function __construct() {
		$userProfile = UserGeneralInfo::all();
		$viewData = [
			'userProfile' => $userProfile,
		];
		View::share($viewData);
	}
}
