<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Arr;

class Admin extends Authenticatable {
	protected $table = 'admins';
	protected $guarded = ['*'];

	const STATUS_PUBLIC = 1;
	const STATUS_PRIVATE = 0;
	protected $status = [
		1 => [
			'name' => 'Public',
			'class' => 'btn-success',
		],
		0 => [
			'name' => 'Private',
			'class' => 'btn-danger',
		],
	];
	public function getStatus() {
		return Arr::get($this->status, $this->active, '[N\A]');
	}
}
