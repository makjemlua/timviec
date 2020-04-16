<?php

namespace App\Http\Controllers;

use App\Model\Cart;
use App\Model\Employer;
use App\Model\Order;
use App\Model\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CartController extends Controller {
	public function addCart(Request $request, $id) {
		$carts = Cart::find($id);
		//$tomorrow = mktime(0, 0, 0, date("m"), date("d") + 1, date("Y"));
		// if (!$carts) {
		// 	return redirect('/');
		// }
		// $price = $carts->pri_price;
		// if ($carts->ph_sale) {
		// 	$price = $price * (100 - $carts->ph_sale) / 100;
		// }

		// if ($carts->ph_number == 0) {
		// 	return redirect()->back();
		// }
		\Cart::add([
			'id' => $id,
			'name' => $carts->pri_name,
			'qty' => 1,
			'price' => $carts->pri_price,
			'weight' => 550,
		]);
		return redirect()->back()->with('success', 'Đã thêm đơn đặt phòng');
	}

	public function getListCart() {
		$carts = Cart::all();
		$cartList = \Cart::content();

		$viewData = [
			'carts' => $carts,
			'cartList' => $cartList,
		];

		return view('nhatuyendung.carts.index', $viewData);
	}
	public function updateCart(Request $request) {
		// \Cart::update($key, [
		// 	'qty' => request('qty'),
		// ]);
		// return redirect()->back()->with('success', 'Cập nhập thành công');
		if ($request->ajax()) {
			\Cart::update($request->rowId, $request->qty);
		}
	}

	public function delete($key) {
		\Cart::remove($key);
		return redirect()->back()->with('success', 'Đã xóa thành công');
	}

	//xoa gio hang
	public function destroy() {
		\Cart::destroy();
		return redirect()->back();
	}

	public function destroyRoom() {
		$carts = \Cart::destroy();
		return redirect()->route('home.index');
	}

	public function getFormPay(Request $request) {

		$carts = \Cart::content();
		$viewData = [
			'carts' => $carts,
		];
		return view('nhatuyendung.carts.pay', $viewData);

	}

	public function shoppingCart(Request $request) {
		$qty = $request->qty;
		$timevip = Employer::find(get_data_user('employers', 'id'))->em_timevip;
		if (!isset($timevip)) {
			$timevip = Carbon::now();
		}
		if (isset($timevip) && $timevip < Carbon::now()) {
			$timevip = Carbon::now();
		}

		$timevip->format($timevip);
		//dd($timevip);

		$employers = Employer::where('id', get_data_user('employers', 'id'))
			->update([
				'em_vip' => 01,
				'em_timevip' => $timevip->addWeeks($qty),
			]);
		$totalMoney = str_replace(',', '', \Cart::initial(0));

		$transactionId = Transaction::insertGetId([
			'tr_user_id' => get_data_user('employers'),
			'tr_total' => (int) $totalMoney,
			'tr_note' => $request->note,
			'tr_address' => get_data_user('employers', 'em_address'),
			'tr_phone' => get_data_user('employers', 'em_phone'),
			'tr_username' => get_data_user('employers', 'name'),
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);

		if ($transactionId) {
			$carts = \Cart::content();
			foreach ($carts as $cart) {
				Order::insert([
					'or_transaction_id' => $transactionId,
					'or_name_id' => $cart->id,
					'or_qty' => $cart->qty,
					'or_price' => $cart->price,
					'created_at' => Carbon::now(),
					'updated_at' => Carbon::now(),
				]);
			}
		}
		\Cart::destroy();
		return view('nhatuyendung.carts.complete');

	}

	public function savePay(Request $request) {
		if (isset($request->vnp_ResponseCode) && $request->vnp_ResponseCode == 0) {
			$totalMoney = str_replace(',', '', \Cart::initial(0));

			$transactionId = Transaction::insertGetId([
				'tr_user_id' => get_data_user('employers'),
				'tr_total' => (int) $totalMoney,
				'tr_note' => $request->vnp_OrderInfo,
				'tr_address' => get_data_user('employers', 'em_address'),
				'tr_phone' => get_data_user('employers', 'em_phone'),
				'tr_username' => get_data_user('employers', 'name'),
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			]);

			if ($transactionId) {
				$carts = \Cart::content();
				foreach ($carts as $cart) {
					Order::insert([
						'or_transaction_id' => $transactionId,
						'or_name_id' => $cart->id,
						'or_qty' => $cart->qty,
						'or_price' => $cart->price,
						'created_at' => Carbon::now(),
						'updated_at' => Carbon::now(),
					]);
				}
			}
			\Cart::destroy();
			//return view('nhatuyendung.carts.complete');
			return redirect()->route('home.index');
		}
		return redirect()->back()->with('danger', 'Giao dịch không thành công');

	}

	public function getComplete() {
		return view('nhatuyendung.carts.complete');
	}
}
