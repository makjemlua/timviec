<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestPasswordEmployer extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'password_old' => 'required',
			'password' => 'required|min:3',
			'password_comfirm' => 'required|same:password',
		];
	}
	public function messages() {
		return [
			'password_old.required' => 'Mật khẩu không được để trống',
			'password.required' => 'Mật khẩu không được để trống',
			'password.min' => 'Mật khẩu phải lớn hơn 3 kí tự',
			'password_comfirm.required' => 'Mật khẩu không được để trống',
			'password_comfirm.same' => 'Mật khẩu phải giống nhau',
		];
	}
}
