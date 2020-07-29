<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRoleAdmin extends FormRequest {
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
			'email' => 'required|unique:admins,email,' . $this->id,
			'name' => 'required|min:5|max:10',
			'role' => 'required',
		];
	}

	public function messages() {
		return [
			'email.required' => 'Email không được để trống',
			'email.unique' => 'Email đã tồn tại',
			'name.required' => 'Họ tên không được để trống',
			'name.min' => 'Họ tên phải lớn hơn 5 kí tự',
			'name.max' => 'Họ tên phải bé hơn 10 kí tự',
			'role.required' => 'Role không được để trống',
		];
	}
}