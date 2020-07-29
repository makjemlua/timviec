<?php
if (!function_exists('upload_image')) {
/**
 * @param $file [tên file trùng tên input]
 * @param array $extend [ định dạng file có thể upload được]
 * @return array|int [ tham số trả về là 1 mảng - nếu lỗi trả về int ]
 */
	function upload_image($file, $folder = '', array $extend = array()) {
		$code = 1;
// lay duong dan anh
		$baseFilename = public_path() . '/uploads/' . $_FILES[$file]['name'];
// thong tin file
		$info = new SplFileInfo($baseFilename);
// duoi file
		$ext = strtolower($info->getExtension());
// kiem tra dinh dang file
		if (!$extend) {
			$extend = ['png', 'jpg', 'jpeg'];
		}
		if (!in_array($ext, $extend)) {
			return $data['code'] = 0;
		}
// Tên file mới
		$nameFile = str_replace('.' . $ext, '', strtolower($info->getFilename()));
		$filename = md5(time()) . '_' . Str::slug($nameFile) . '.' . $ext;
// thu muc goc de upload
		$path = public_path() . '/uploads/';
		if (!\File::exists($path)) {
			mkdir($path, 0777, true);
		}
// di chuyen file vao thu muc uploads
		move_uploaded_file($_FILES[$file]['tmp_name'], $path . $filename);
		$data = [
			'name' => $filename,
			'code' => $code,
			'path_img' => 'uploads/' . $filename,
		];
		return $data;
	}
}
if (!function_exists('pare_url_file')) {
	function pare_url_file($image, $folder = '') {
		if (!$image) {
			return '/images/default.png';
		}
		$explode = explode('__', $image);
		if (isset($explode[0])) {
			$time = str_replace('_', '/', $explode[0]);
			return '/uploads/' . $image;
		}
	}
}
if (!function_exists('get_data_user')) {
	function get_data_user($type, $field = 'id') {
		return Auth::guard($type)->user() ? Auth::guard($type)->user()->$field : '';
	}
}
function uploadimg() {
	request()->validate(
		[
			'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		]
	);
	$imageName = time() . '.' . request()->image->getClientOriginalExtension();
	request()->image->move(('images/upload'), $imageName);
	return '/upload/images/' . $imageName;
}

// Function to get the client IP address
if (!function_exists('get_client_ip')) {
	function get_client_ip() {
		$ipaddress = '';
		if (getenv('HTTP_CLIENT_IP')) {
			$ipaddress = getenv('HTTP_CLIENT_IP');
		} else if (getenv('HTTP_X_FORWARDED_FOR')) {
			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		} else if (getenv('HTTP_X_FORWARDED')) {
			$ipaddress = getenv('HTTP_X_FORWARDED');
		} else if (getenv('HTTP_FORWARDED_FOR')) {
			$ipaddress = getenv('HTTP_FORWARDED_FOR');
		} else if (getenv('HTTP_FORWARDED')) {
			$ipaddress = getenv('HTTP_FORWARDED');
		} else if (getenv('REMOTE_ADDR')) {
			$ipaddress = getenv('REMOTE_ADDR');
		} else {
			$ipaddress = 'UNKNOWN';
		}

		return $ipaddress;
	}
}
