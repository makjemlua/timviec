<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserApplied extends Model {
	protected $table = 'user_applied';
	protected $guarded = ['*'];

	public function user() {
		return $this->belongsTo('App\User', 'ap_user_id', 'id');
	}

	public function profile() {
		return $this->belongsTo('App\Model\EmployerProfile', 'ap_profile_id', 'id');
	}

	public function hoso() {
		return $this->belongsTo('App\Model\UserGeneralInfo', 'ap_hoso_id', 'id');
	}

	const DEFAULT = 0; // Duyệt nộp hồ sơ
	const APPLY = 1;
	const CANCEL = 2;

	protected $status = [
		1 => [
			'name' => 'Đã duyệt',
			'class' => 'btn-success',
		],
		2 => [
			'name' => 'Từ chối',
			'class' => 'btn-danger',
		],
		0 => [
			'name' => 'Chưa duyệt',
			'class' => 'btn-default',
		],
	];
	public function getStatus() {
		return Arr::get($this->status, $this->ap_status, '[N\A]');
	}
}
