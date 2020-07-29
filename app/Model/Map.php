<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Map extends Model {
	protected $table = 'employer_map';
	protected $fillable = ['id', 'ma_profile_id', 'address_address', 'address_latitude', 'address_longitude'];

	public function employer() {
		return $this->belongsTo('App\Model\Employer', 'ma_employer_id', 'id');
	}

	public function profile() {
		return $this->belongsTo('App\Model\EmployerProfile', 'id', 'id');
	}
}
