<?php

namespace App\Http\Controllers;

use App\Model\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ContactController extends Controller {
	public function index() {
		return view('contact');
	}
	public function saveContact(Request $request) {
		$data = $request->except('_token');
		$data['created_at'] = $data['updated_at'] = Carbon::now();
		//dd($data);
		Contact::insert($data);

		return redirect()->back()->with('success', 'Cảm ơn bạn đã phản hồi cho chúng tôi');
	}
}
