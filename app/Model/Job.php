<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Job extends Model {
	protected $table = 'user_job';
	protected $guarded = ['*'];
}
