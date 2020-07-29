<?php

namespace Modules\Admin\Http\Controllers;

use App\Exports\CsvExport;
use App\Model\Admin;
use App\Model\Transaction;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller {
	/**
	 * Display a listing of the resource.
	 * @return Response
	 */
	public function index(Request $request) {

		$totalTransaction = Transaction::select('id')->count();

		$totalTransactionDone = Transaction::where('tr_status', Transaction::STATUS_DONE)->select('id')->count();

		$totalTransactionWait = Transaction::where('tr_status', Transaction::STATUS_DEFAULT)->select('id')->count();

		$role = Auth::guard('admins')->user();

		//Doanh thu ngay
		$moneyDay = Transaction::whereDay('updated_at', date('d'))->where('tr_status', Transaction::STATUS_DEFAULT)->sum('tr_total');

		//Doanh thu tuan
		//$moneyWeek = Transaction::where('updated_at', Carbon::now()->weekOfYear)->where('tr_status', Transaction::STATUS_DEFAULT)->sum('tr_total');

		//Doanh thu thang
		$moneyMonth = Transaction::whereMonth('updated_at', date('m'))->where('tr_status', Transaction::STATUS_DEFAULT)->sum('tr_total');

		//Doanh thu nam
		$moneyYear = Transaction::whereYear('updated_at', date('Y'))->where('tr_status', Transaction::STATUS_DEFAULT)->sum('tr_total');

		$dataMoney = [
			[
				"name" => "Doanh thu ngày",
				"y" => (int) $moneyDay,
			],
			// [
			//  "name" => "Doanh thu tuần",
			//  "y" => (int) $moneyWeek,
			// ],
			[
				"name" => "Doanh thu tháng",
				"y" => (int) $moneyMonth,
			],
			[
				"name" => "Doanh thu năm",
				"y" => (int) $moneyYear,
			],
		];

		$tinhtien = -1;
		$date_from = -1;
		$date_to = -1;
		if ($request->date_from && $request->date_to) {
			$date_from = $request->date_from;
			$date_to = $request->date_to;
			$tinhtien = Transaction::whereBetween('created_at', [$request->date_from, $request->date_to])->sum('tr_total');
		}

		$viewData = [
			'totalTransaction' => $totalTransaction,
			'totalTransactionDone' => $totalTransactionDone,
			'totalTransactionWait' => $totalTransactionWait,
			'role' => $role,
			'dataMoney' => json_encode($dataMoney),
			'date_from' => $date_from,
			'date_to' => $date_to,
			'tinhtien' => $tinhtien,
		];

		return view('admin::index', $viewData);
	}

	public function csv_export() {
		$headers = ['Tên khách hàng', 'Địa chỉ', 'Số điện thoại', 'Ngày đặt phòng', 'Tổng tiền'];
		return Excel::download(new CsvExport, 'booking.xlsx', null, $headers);
	}

	/**
	 * Show the form for creating a new resource.
	 * @return Response
	 */
	public function create() {
		return view('admin::create');
	}

	/**
	 * Store a newly created resource in storage.
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request) {
		//
	}

	/**
	 * Show the specified resource.
	 * @param int $id
	 * @return Response
	 */
	public function show($id) {
		return view('admin::show');
	}

	/**
	 * Show the form for editing the specified resource.
	 * @param int $id
	 * @return Response
	 */
	public function edit($id) {
		return view('admin::edit');
	}

	/**
	 * Update the specified resource in storage.
	 * @param Request $request
	 * @param int $id
	 * @return Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * @param int $id
	 * @return Response
	 */
	public function destroy($id) {
		//
	}
}
