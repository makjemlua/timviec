<?php

namespace Modules\Admin\Http\Controllers;

use App\Exports\DonHang;
use App\Exports\ExEmployer;
use App\Exports\ExUser;
use Excel;
use Illuminate\Routing\Controller;

class AdminExportController extends Controller {
	//use Exportable;

	//Thống kê đơn hàng
	public function exportDoanhthu() {
		return Excel::download(new DonHang(), 'thong-ke-don-hang.xlsx');
	}

	//Thống kê account user
	public function exportUser() {
		return Excel::download(new ExUser(), 'thong-ke-user.xlsx');
	}

	//Thống kê account employer
	public function exportEmployer() {
		return Excel::download(new ExEmployer(), 'thong-ke-employer.xlsx');
	}

}
