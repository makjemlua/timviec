<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Employer extends Authenticatable {
	protected $table = 'employers';
	protected $guarded = ['*'];

	protected $dates = ['em_timevip'];

	const VIP_ON = 01; // Duyệt bài đăng
	const VIP_OFF = 00;
}
