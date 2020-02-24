<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Language extends Model {
	protected $table = 'user_language';
	protected $guarded = ['*'];
}
