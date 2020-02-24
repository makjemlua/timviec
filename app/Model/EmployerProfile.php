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
			'class' => 'label-success',
		],
		0 => [
			'name' => 'Private',
			'class' => 'label-danger',
		],
	];

	const HOT_ON = 1; // Bài đăng hot
	const HOT_OFF = 0;

	const ACTIVE_ON = 1; // Duyệt bài đăng
	const ACTIVE_OFF = 0;

	const MOI_ON = 1; // Bài đăng mới
	const MOI_OFF = 0;

	const PROMPT_ON = 1; // Bài đăng tuyển gấp
	const PROMPT_OFF = 0;

	public function employer() {
		return $this->belongsTo('App\Model\Employer', 'pr_employer_id', 'id');
	}

	public function getStatus() {
		return Arr::get($this->status, $this->pr_status, '[N\A]');
	}
}
