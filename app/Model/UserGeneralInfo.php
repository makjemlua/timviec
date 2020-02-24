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
			'name' => 'Public',
			'class' => 'label-success',
		],
		0 => [
			'name' => 'Private',
			'class' => 'label-danger',
		],
	];

	public function getStatus() {
		return Arr::get($this->status, $this->ge_status, '[N\A]');
	}

	// public function user() {
	// 	return $this->belongsTo(User::class, 'ge_user_id');
	// }
	public function user() {
		return $this->belongsTo('App\User', 'ge_user_id', 'id');
	}
}
