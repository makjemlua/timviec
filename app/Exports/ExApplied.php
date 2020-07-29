<?php

namespace App\Exports;

use App\Model\UserApplied;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExApplied implements FromCollection, WithHeadings {
	public function collection() {
		$applies = UserApplied::with('user:id,name,email,address,phone')->with('hoso:id,ge_title')->where('ap_employer_id', get_data_user('employers'))->where('ap_status', 1)->get();
		foreach ($applies as $row) {
			$order[] = array(
				'0' => $row->id,
				'1' => $row->user->name,
				'2' => $row->user->email,
				'6' => $row->user->address,
				'3' => $row->user->phone,
				'4' => $row->hoso->ge_title,
				'5' => $row->ap_title,
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
			'Địa chỉ',
			'Số điện thoại',
			'Tên hồ sơ',
			'Tên bài tuyển dụng',
			'Ngày tạo',
		];
	}
}
