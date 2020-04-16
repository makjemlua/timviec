<?php

namespace App\Model;

use App\Model\Employer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class EmployerProfile extends Model {

	protected $table = 'employer_profile';
	protected $guarded = ['*'];

	const STATUS_ON = 1; //cho phép hiển thị bài đăng
	const STATUS_OFF = 0;

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

	const ACTIVE_ON = 1; // Duyệt bài đăng
	const ACTIVE_OFF = 0;

	protected $active = [
		1 => [
			'name' => 'Duyệt',
			'class' => 'btn-success',
		],
		0 => [
			'name' => 'Chưa duyệt',
			'class' => 'btn-danger',
		],
	];

	public function employer() {
		return $this->belongsTo('App\Model\Employer', 'pr_employer_id', 'id');
	}

	public function getStatus() {
		return Arr::get($this->status, $this->pr_status, '[N\A]');
	}

	public function getActive() {
		return Arr::get($this->active, $this->pr_active, '[N\A]');
	}
}
