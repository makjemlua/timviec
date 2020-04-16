<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model {
	protected $table = 'price_list';
	protected $guarded = ['*'];
}
