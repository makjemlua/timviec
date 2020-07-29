<?php

namespace App\Http\Controllers;

use App\Model\Cart;
use App\Model\Employer;
use App\Model\Order;
use App\Model\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CartController extends Controller {
	private $vnp_TmnCode = "4KRY0AY0"; //Mã website tại VNPAY
	private $vnp_HashSecret = "GEDLRUNWAXYGESUJNYLRWAHSZUKAEWVW"; //Chuỗi bí mật
	private $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
	private $vnp_Returnurl = "http://localhost/timviec/public/cart/complete";
	//private $vnp_Returnurl = "https://timviecnhanh.xyz/cart/complete";
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
		return redirect()->back()->with('success', 'Đã thêm hóa đơn thành công');
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

	public function showFormPay(Request $request) {

		$carts = \Cart::content();

		return view('nhatuyendung.carts.pay', compact('carts'));

	}

	public function savePayOnline(Request $request) {
		$qty = $request->qty;

		$totalMoney = str_replace(',', '', \Cart::initial(0));
		//$totalMoney = str_replace(',', '', \Cart::subtotal(0, 3));

		// Sau khi xử lý xong bắt đầu xử lý online
		error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

		// tham so dau vao
		$inputData = array(
			"vnp_Version" => "2.0.0",
			"vnp_TmnCode" => $this->vnp_TmnCode,
			"vnp_Amount" => $totalMoney * 100, // so tien thanh toan,
			"vnp_Command" => "pay",
			"vnp_CreateDate" => date('YmdHis'),
			"vnp_CurrCode" => "VND",
			"vnp_IpAddr" => $_SERVER['REMOTE_ADDR'], // IP
			"vnp_Locale" => 'vn', // ngon ngu,
			"vnp_OrderInfo" => 'Thanh toan hoa don', // noi dung thanh toan,
			"vnp_OrderType" => 25000, // loai hinh thanh toan
			"vnp_ReturnUrl" => $this->vnp_Returnurl, // duong dan tra ve
			"vnp_TxnRef" => date('YmdHis'), // ma don hang,
		);

		if ($request->bank_code) {
			$inputData['vnp_BankCode'] = $request->bank_code;
		}
		ksort($inputData);
		$query = "";
		$i = 0;
		$hashdata = "";
		foreach ($inputData as $key => $value) {
			if ($i == 1) {
				$hashdata .= '&' . $key . "=" . $value;
			} else {
				$hashdata .= $key . "=" . $value;
				$i = 1;
			}
			$query .= urlencode($key) . "=" . urlencode($value) . '&';
		}

		$vnp_Url = $this->vnp_Url . "?" . $query;
		if ($this->vnp_HashSecret) {
			$vnpSecureHash = hash('sha256', $this->vnp_HashSecret . $hashdata);
			$vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
		}

		$returnData = array(
			'code' => '00',
			'message' => 'success',
			'data' => $vnp_Url,
		);
		return redirect()->to($returnData['data']);
	}

	public function getComplete(Request $request) {
		if ($request->vnp_ResponseCode == '00') {

			$carts = \Cart::content()->first();

			$qty = $carts->qty;

			$bank_code = \Request::get('vnp_BankCode');
			$vnp_OrderInfo = \Request::get('vnp_OrderInfo');

			$totalMoney = str_replace(',', '', \Cart::initial(0));

			$timevip = Employer::find(get_data_user('employers', 'id'))->em_timevip;
			if (!isset($timevip)) {
				$timevip = Carbon::now();
			}
			if (isset($timevip) && $timevip < Carbon::now()) {
				$timevip = Carbon::now();
			}

			$timevip->format($timevip);

			$employers = Employer::where('id', get_data_user('employers', 'id'))
				->update([
					'em_vip' => 01,
					'em_timevip' => $timevip->addWeeks($qty),
				]);

			$transactionId = Transaction::insertGetId([
				'tr_employer_id' => get_data_user('employers'),
				'tr_total' => (int) $totalMoney,
				'tr_note' => $vnp_OrderInfo,
				'tr_address' => get_data_user('employers', 'em_address'),
				'tr_phone' => get_data_user('employers', 'em_phone'),
				'tr_username' => get_data_user('employers', 'name'),
				'tr_email' => get_data_user('employers', 'email'),
				'tr_payment' => $bank_code,
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
			return redirect()->route('cart.thanhcong')->with('success', 'Thanh toán thành công');

		}
		return redirect()->route('get.form.pay_online')->with('danger', 'Thanh toán không thành công');

	}
	public function thanhcong() {
		return view('nhatuyendung.carts.complete');
	}
}
