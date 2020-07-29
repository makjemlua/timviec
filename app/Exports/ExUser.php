<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExUser implements FromCollection, WithHeadings {
	public function collection() {
		$users = User::all();
		foreach ($users as $row) {
			$order[] = array(
				'0' => $row->id,
				'1' => $row->name,
				'2' => $row->email,
				'3' => $row->phone,
				'4' => $row->birthday,
				'5' => $row->gender,
				'6' => $row->address,
				'7' => $row->created_at,
			);
		}

		return (collect($order));
	}

	public function headings(): array
	{
		return [
			'id',
			'Tên',
			'Email',
			'Số điện thoại',
			'Ngày sinh',
			'Giới tính',
			'Địa chỉ',
			'Ngày tạo',
		];
	}
}
