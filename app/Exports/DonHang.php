<?php

namespace App\Exports;

use App\Model\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DonHang implements FromCollection, WithHeadings {
	public function collection() {
		$transactions = Transaction::all();
		foreach ($transactions as $row) {
			$order[] = array(
				'0' => $row->id,
				'1' => $row->tr_username,
				'2' => $row->tr_phone,
				'3' => $row->tr_address,
				'4' => $row->tr_email,
				'5' => $row->created_at,
				'6' => number_format($row->tr_total),
			);
		}

		return (collect($order));
	}

	public function headings(): array
	{
		return [
			'id',
			'Tên',
			'Số điện thoại',
			'Địa chỉ',
			'Email',
			'Ngày giao dịch',
			'Tổng tiền',
		];
	}
}
