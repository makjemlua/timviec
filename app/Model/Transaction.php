<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {
	protected $table = 'transactions';
	protected $guarded = ['*'];

	const STATUS_DONE = 1;
	const STATUS_DEFAULT = 0;
	const TYPE_CART = 1;
	const TYPE_PAY = 2;
}
