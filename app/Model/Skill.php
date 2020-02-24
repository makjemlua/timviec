<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model {
	protected $table = 'user_skills';
	protected $guarded = ['*'];
}
