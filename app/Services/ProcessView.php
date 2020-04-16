<?php

namespace App\Services;

class ProcessView {

	public static function view($table, $column, $key, $id) {
		$ipAdress = get_client_ip();
		$timeNow = time();
		// Lấy view sau 1h
		$throttleTime = 60 * 60;
		$key = $key . '_' . md5($ipAdress) . '_' . $id;
		if (\Session::exists($key)) {
			$timeBefore = \Session::get($key);
			if ($timeBefore + $throttleTime > $timeNow) {
				return false;
			}
		}
		\Session::put($key, $timeNow);

		\DB::table($table)->where('id', $id)->increment($column);
	}
}

?>