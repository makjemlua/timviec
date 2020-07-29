<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Notification extends Model {
	protected $table = 'admin_notification';
	protected $guarded = ['*'];

	const STATUS_PUBLIC = 0; // Duyệt thông báo
	const STATUS_PRIVATE = 1;

	protected $status = [

		0 => [
			'name' => 'Ẩn danh',
			'class' => 'btn-secondary',
		],
		1 => [
			'name' => 'Hiển thị',
			'class' => 'btn-primary',
		],

	];
	public function getStatus() {
		return Arr::get($this->status, $this->no_active, '[N\A]');
	}
}
