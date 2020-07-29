<?php

namespace Modules\Admin\Http\Controllers;

use App\Model\Notification;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;

class AdminNotificationController extends Controller {

	//User
	public function indexUser() {
		$notis = Notification::where('no_check', 1)->paginate(10);
		return view('admin::users.notification', compact('notis'));
	}
	public function storeUser(Request $request) {
		$notifi = new Notification();
		$notifi->no_check = 1;
		$notifi->no_content = $request->no_content;
		$notifi->created_at = Carbon::now();
		$notifi->updated_at = Carbon::now();
		$notifi->save();
		return redirect()->back()->with('success', 'Bạn thêm thông báo');
	}
	public function actionUser($action, $id) {
		if ($action) {
			$notification = Notification::find($id);
			switch ($action) {
			case 'delete':
				$notification->delete();
				break;
			case 'active':
				$notification->no_active = $notification->no_active ? 0 : 1;
				$notification->save();
				break;
			}
		}
		return redirect()->back();
	}

	//Employer
	public function indexEmployer() {
		$notis = Notification::where('no_check', 2)->paginate(10);
		return view('admin::employers.notification', compact('notis'));
	}
	public function storeEmployer(Request $request) {
		$notifi = new Notification();
		$notifi->no_check = 2;
		$notifi->no_content = $request->no_content;
		$notifi->created_at = Carbon::now();
		$notifi->updated_at = Carbon::now();
		$notifi->save();
		return redirect()->back()->with('success', 'Bạn thêm thông báo');
	}
	public function actionEmployer($action, $id) {
		if ($action) {
			$notification = Notification::find($id);
			switch ($action) {
			case 'delete':
				$notification->delete();
				break;
			case 'active':
				$notification->no_active = $notification->no_active ? 0 : 1;
				$notification->save();
				break;
			}
		}
		return redirect()->back();
	}
}
