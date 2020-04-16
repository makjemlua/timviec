<?php

namespace App\Model;

use App\Model\Comment;
use App\Model\Employer;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
	protected $table = 'comments';
	protected $guarded = ['*'];

	public function user() {
		return $this->belongsTo(User::class, 'ra_user_id');
	}

	public function employer() {
		return $this->belongsTo(Employer::class, 'ra_employer_id');
	}

	public function replies() {
		return $this->hasMany(Comment::class, 'ra_parent_id');
	}
}
