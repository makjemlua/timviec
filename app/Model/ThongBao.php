<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class ThongBao extends Authenticatable {
	protected $table = 'admin_thongbao';
	protected $guarded = ['*'];

	public function user() {
		return $this->belongsTo(User::class, 'th_user_id');
	}

	public function employer() {
		return $this->belongsTo(Employer::class, 'th_employer_id');
	}

}
