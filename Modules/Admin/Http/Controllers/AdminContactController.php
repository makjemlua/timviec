<?php

namespace Modules\Admin\Http\Controllers;

use App\Model\Contact;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminContactController extends Controller {
	public function index(Request $request) {
		$contacts = Contact::whereRaw(1);

		$contacts = $contacts->orderBy('id', 'DESC')->paginate(10);

		$viewData = [
			'contacts' => $contacts,
		];
		return view('admin::contact.index', $viewData);
	}
	public function action($action, $id) {
		if ($action) {
			$contact = Contact::find($id);
			switch ($action) {
			case 'delete':
				$contact->delete();
				break;
			}
		}
		return redirect()->back();
	}
}
