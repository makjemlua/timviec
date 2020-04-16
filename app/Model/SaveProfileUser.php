<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SaveProfileUser extends Model {
	protected $table = 'employer_saveprofile';
	protected $guarded = ['*'];

	public function employer() {
		return $this->belongsTo('App\User', 'sa_employer_id', 'id');
	}

	public function profile() {
		return $this->belongsTo('App\Model\UserGeneralInfo', 'sa_profile_id', 'id');
	}
}
