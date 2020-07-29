<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestBlogAdmin extends FormRequest {
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
			//'email' => 'required|unique:users,email,' . $this->id,
			'bo_title' => 'required',
			'bo_description' => 'required',
			'bo_content' => 'required',
			'avatar' => 'required',
		];
	}

	public function messages() {
		return [
			//'email.required' => 'Email không được để trống',
			//'email.unique' => 'Email đã tồn tại',
			'bo_title.required' => 'Tiêu đề không được để trống',
			'bo_description.required' => 'Mô tả không được để trống',
			'bo_content.required' => 'Nội dung không được để trống',
			'avatar.required' => 'Hình ảnh không được để trống',
		];
	}
}