<?php

namespace App\Exports;

use App\Model\Employer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExEmployer implements FromCollection, WithHeadings {
	public function collection() {
		$employers = Employer::all();
		foreach ($employers as $row) {
			$order[] = array(
				'0' => $row->id,
				'1' => $row->name,
				'2' => $row->email,
				'6' => $row->em_address,
				'3' => $row->em_phone,
				'4' => $row->em_company,
				'5' => $row->em_website,
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
			'Công ty',
			'Website',
			'Ngày tạo',
		];
	}
}
