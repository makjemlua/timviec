<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestPasswordAdmin;
use App\Http\Requests\RequestRoleAdmin;
use App\Model\Admin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminRoleController extends Controller {
	public function index(Request $request) {
		$admins = Admin::whereRaw(1);

		$admins = $admins->paginate(5);

		$viewData = [
			'admins' => $admins,
		];
		return view('admin::role.index', $viewData);
	}
	public function create() {
		return view('admin::role.create');
	}
	public function store(RequestRoleAdmin $requestRole) {
		$admin = new Admin();
		$admin->name = $requestRole->name;
		$admin->email = $requestRole->email;
		$admin->password = bcrypt('12345');
		$admin->role = $requestRole->role;
		$admin->active = $requestRole->input('active');
		$admin->created_at = Carbon::now();
		$admin->updated_at = Carbon::now();
		$admin->save();
		return redirect()->back()->with('success', 'Thêm thành công');

	}
	public function edit($id) {
		$admin = Admin::find($id);
		return view('admin::role.update', compact('admin'));
	}
	public function update(Request $requestRole, $id) {
		$admin = Admin::find($id);

		$admin->name = $requestRole->name;
		$admin->role = $requestRole->role;
		$admin->active = $requestRole->input('active');
		$admin->created_at = Carbon::now();
		$admin->updated_at = Carbon::now();
		$admin->save();
		return redirect()->back()->with('success', 'Cập nhập thành công');
	}

	public function editpass() {
		$admin = Admin::find(get_data_user('admins'));
		return view('admin::role.changepass', compact('admin'));
	}
	public function updatepass(RequestPasswordAdmin $requestPass) {
		if (Hash::check($requestPass->password_old, get_data_user('admins', 'password'))) {
			$admin = Admin::find(get_data_user('admins'));
			$admin->password = bcrypt($requestPass->password);
			$admin->save();
			return redirect()->back()->with('success', 'Cập nhập thành công');
		}
		return redirect()->back()->with('danger', 'Mật khẩu cũ không đúng');

	}
	public function action($action, $id) {
		if ($action) {
			$admin = Admin::find($id);
			switch ($action) {
			case 'delete':
				$admin->delete();
				break;
			case 'active':
				$admin->active = $admin->active ? 0 : 1;
				$admin->save();
				break;
			}
		}
		return redirect()->back();
	}
}
