<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Employer extends Authenticatable {
	protected $table = 'employers';
	protected $guarded = ['*'];
	// protected $fillable = [
	// 	'name', 'email', 'password', 'em_avatar', 'em_phone', 'em_address', 'em_provider', 'em_provider_id',
	// ];
}
