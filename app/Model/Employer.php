<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Arr;

class Employer extends Authenticatable {
	protected $table = 'employers';
	protected $guarded = ['*'];

	protected $dates = ['em_timevip'];

	const VIP_ON = 01; // Duyệt vip
	const VIP_OFF = 00;

	protected $vip = [
		1 => [
			'name' => 'Vip',
			'class' => 'btn-success',
		],
		0 => [
			'name' => 'Không',
			'class' => 'btn-danger',
		],
	];
	public function getStatus() {
		return Arr::get($this->vip, $this->em_vip, '[N\A]');
	}

	const STATUS_PUBLIC = 1;
	const STATUS_PRIVATE = 0;
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
	public function getStatuss() {
		return Arr::get($this->status, $this->active, '[N\A]');
	}
}
