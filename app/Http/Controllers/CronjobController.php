<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CronjobController extends Controller {
	public function ResetVip() {
		$reset = DB::table('employers')->whereDate('em_timevip', '<', Carbon::now()->toDateTimeString());
		//dd($reset);
		if ($reset) {
			$a = $reset->update(['em_vip' => 0]);
		}
		//return view('cronjob.resetvip');
	}
}
