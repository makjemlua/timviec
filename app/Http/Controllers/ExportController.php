<?php

namespace App\Http\Controllers;

use App\Exports\ExApplied;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ExportController extends Controller {
	//Thống kê user applied
	public function exportApplied(Request $request) {
		return Excel::download(new ExApplied(), 'thong-ke-applied.xlsx');
	}
}
