<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Arr;

class User extends Authenticatable {
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $table = 'users';
	protected $guarded = ['*'];

	// protected $hidden = [
	// 	'password', 'remember_token',
	// ];

	// protected $casts = [
	// 	'email_verified_at' => 'datetime',
	// ];

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
