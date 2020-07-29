<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model {
	protected $table = 'chat';
	protected $guarded = ['*'];

	public function user() {
		return $this->belongsTo('App\User', 'ch_from', 'id');
	}

	public function userToEmployer() {
		return $this->belongsTo('App\Model\Employer', 'ch_to', 'id');
	}

	public function employer() {
		return $this->belongsTo('App\Model\Employer', 'ch_from', 'id');
	}

	public function employerToUser() {
		return $this->belongsTo('App\User', 'ch_to', 'id');
	}

}
