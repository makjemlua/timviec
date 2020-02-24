<?php

namespace App\Model;

use App\Model\UserGeneralInfo;
use Illuminate\Database\Eloquent\Model;

class UserExperience extends Model {
	protected $table = 'user_experience';
	protected $guarded = ['*'];

	public function general() {
		return $this->belongsTo(UserGeneralInfo::class, 'ex_general_id');
	}
}
