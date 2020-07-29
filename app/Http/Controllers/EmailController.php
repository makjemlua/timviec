<?php

namespace App\Http\Controllers;

use App\Mail\MailNotify;
use Mail;
use Response;

class EmailController extends Controller {
	public function sendEmail() {
		$user = auth()->user();
		Mail::to($user)->send(new MailNotify($user));

		if (Mail::failures()) {
			return response()->Fail('Sorry! Please try again latter');
		} else {
			return response()->json('Great! Successfully send in your mail');
		}
	}
}
