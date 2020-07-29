<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRegisterUser extends FormRequest {
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
			'email' => 'required|unique:users,email,' . $this->id,
			'name' => 'required|min:5|max:30',
			'password' => 'required|min:3',
			'repassword' => 'required|same:password',
			'g-recaptcha-response' => 'required',
		];
	}

	public function messages() {
		return [
			'email.required' => 'Email không được để trống',
			'email.unique' => 'Email đã tồn tại',
			'name.required' => 'Họ tên không được để trống',
			'name.min' => 'Họ tên phải lớn hơn 5 kí tự',
			'name.max' => 'Họ tên phải bé hơn 30 kí tự',
			'password.required' => 'Mật khẩu không được để trống',
			'password.min' => 'Mật khẩu phải lớn hơn 3 kí tự',
			'repassword.required' => 'Mật khẩu xác nhận không được để trống',
			'repassword.same' => 'Mật khẩu phải giống nhau',
			'g-recaptcha-response.required' => 'Vui lòng nhập Captcha',
		];
	}
}
