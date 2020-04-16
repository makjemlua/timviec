<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class UserGeneralInfo extends Model {
	protected $table = 'user_generalinfo';
	protected $guarded = ['*'];

	const STATUS_PUBLIC = 1;
	const STATUS_PRIVATE = 0;

	protected $status = [
		1 => [
			'name' => 'Hiển thị',
			'class' => 'btn-success',
		],
		0 => [
			'name' => 'Tắt',
			'class' => 'btn-danger',
		],
	];

	const ACTIVE_ON = 1; // Duyệt bài đăng
	const ACTIVE_OFF = 0;

	protected $active = [
		1 => [
			'name' => 'Duyệt',
			'class' => 'btn-success',
		],
		0 => [
			'name' => 'Không',
			'class' => 'btn-danger',
		],
	];

	public function getStatus() {
		return Arr::get($this->status, $this->ge_status, '[N\A]');
	}
	public function getActive() {
		return Arr::get($this->active, $this->ge_active, '[N\A]');
	}

	// public function user() {
	// 	return $this->belongsTo(User::class, 'ge_user_id');
	// }
	public function user() {
		return $this->belongsTo('App\User', 'ge_user_id', 'id');
	}

	public function scopeSearchJob($query, $job) {
		$query->whereHas('job', function ($q) use ($job) {
			//$q->where('ge_profession', 'like', "%{$job}%");
			$q->with(with('user:id,name,avatar'))
				->where([
					'ge_status' => UserGeneralInfo::STATUS_PUBLIC,
					'ge_active' => UserGeneralInfo::ACTIVE_ON,
				]);

			$q->where('ge_profession', 'like', "%{$job}%");
		});
	}

	public function scopeSearchProvince($query, $province) {
		$query->whereHas('province', function ($q) use ($province) {
			//$q->where('ge_provinces', 'like', "%{$province}%");
			$q->with(with('user:id,name,avatar'))
				->where([
					'ge_status' => UserGeneralInfo::STATUS_PUBLIC,
					'ge_active' => UserGeneralInfo::ACTIVE_ON,
				]);

			$q->where('ge_provinces', 'like', "%{$province}%");
		});
	}
}
