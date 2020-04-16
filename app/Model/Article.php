<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Article extends Model {
	protected $table = 'admin_blogs';
	protected $guarded = ['*'];

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
	public function getStatus() {
		return Arr::get($this->status, $this->bo_active, '[N\A]');
	}

	public function admin() {
		return $this->belongsTo('App\Model\Admin', 'bo_admin_id', 'id');
	}

	public function comments() {
		return $this->hasMany(Comment::class)->whereNull('ra_parent_id');
	}
}
