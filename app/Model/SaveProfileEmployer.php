<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class SaveProfileEmployer extends Model {
	protected $table = 'user_saveprofile';
	protected $guarded = ['*'];

	public function user() {
		return $this->belongsTo('App\User', 'usa_user_id', 'id');
	}

	public function profile() {
		return $this->belongsTo('App\Model\EmployerProfile', 'usa_profile_id', 'id');
	}
}
