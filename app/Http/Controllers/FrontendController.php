<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;

class FrontendController extends Controller {
	public function __construct() {

		$viewData = [

		];
		View::share($viewData);
	}
}
