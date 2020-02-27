<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Applied extends Model {
	protected $table = 'employer_applied';
	protected $guarded = ['*'];

	public function user() {
		return $this->belongsTo('App\User', 'ap_user_id', 'id');
	}

	public function profile() {
		return $this->belongsTo('App\Model\EmployerProfile', 'ap_profile_id', 'id');
	}
}
