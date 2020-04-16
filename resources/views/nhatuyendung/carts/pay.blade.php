@extends('layouts.app')
@section('content')
<style type="text/css">
	.total
	{
		color: red;
		font-weight: bold;
		font-size: 20px;
	}
	.title
	{
		font-weight: bold;
	}
</style>
<?php
$vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = "http://localhost/timviec/public/cart/thanh-toan-online";
$vnp_TmnCode = "4KRY0AY0"; //Mã website tại VNPAY
$vnp_HashSecret = "GEDLRUNWAXYGESUJNYLRWAHSZUKAEWVW"; //Chuỗi bí mật
?>
<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Candidates Listing</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="">Home</a> / <a href="">Resume Search</a> / <span>Candidates</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->
<div class="container wrapper">
	<div class="row cart-body">
		<form class="form-horizontal" method="POST" action="">
			@csrf
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
				<!--REVIEW ORDER-->
				<div class="panel panel-info">
					<div class="panel-heading">
						Review Order <div class="pull-right"><small><a class="afix-1" href="{{ route('get.list.cart') }}">Edit Cart</a></small></div>
					</div>
					<div class="panel-body">
						@if($carts)
						@foreach($carts as $list)

						<div class="form-group">
							<div class="col-sm-9 col-xs-9">
								<div class="col-xs-12"><span class="title">{{ $list->name }}</span></div><hr />
								<div class="col-xs-12"><small>Thời gian: {{ $list->qty }} Tuần</small></div>
								<input type="hidden" name="qty" value="{{ $list->qty }}">
							</div>
							<div class="col-sm-3 col-xs-3 text-right">
								<h6>
									{{ number_format(($list->qty * $list->price),0,',','.') }} VNĐ
								</h6>
							</div>
						</div>
						<div class="form-group"><hr /></div>
						@endforeach
						@endif

						<div class="form-group">
							<div class="col-xs-12">
								<strong>Tổng thanh toán</strong>
								<div class="pull-right"><span class="total">{{ \Cart::initial(0) }} VNĐ</span></div>
								<?php $total_usd = ceil(\Cart::initial(0));?>
							</div>
						</div>
						<div class="form-group"><hr /></div>
					</div>
				</div>
				<!--REVIEW ORDER END-->
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
				<!--SHIPPING METHOD-->
				<div class="panel panel-info">
					<div class="panel-heading">Thông tin</div>
					<div class="panel-body">
						<div class="form-group">
							<div class="col-md-12">
								<h4>Thông tin khách hàng</h4>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12"><strong>Họ tên:</strong></div>
							<div class="col-md-12">
								<input type="text" name="name" class="form-control" value="{{ get_data_user('employers','name') }}" />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12"><strong>Email Address:</strong></div>
							<div class="col-md-12"><input type="text" name="email_address" class="form-control" value="{{ get_data_user('employers','email') }}" /></div>
						</div>
						<div class="form-group">
							<div class="col-md-12"><strong>Address:</strong></div>
							<div class="col-md-12">
								<input type="text" name="address" class="form-control" value="{{ get_data_user('employers','em_address') }}" />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12"><strong>Phone Number:</strong></div>
							<div class="col-md-12"><input type="text" name="phone" class="form-control" value="{{ get_data_user('employers','em_phone') }}" /></div>
						</div>
						<div class="form-group">
							<div class="col-md-12"><strong>Ghi chú:</strong></div>
							<div class="col-md-12"><textarea class="form-control" id="checkout-mess" name="note" placeholder="Ghi chú thêm."></textarea></div>
						</div>

					</div>
				</div>
				<!--SHIPPING METHOD END-->
				<!--CREDIT CART PAYMENT-->
				<div class="panel panel-info">
					<div class="panel-heading"><span><i class="fa fa-lock"></i></span> Secure Payment</div>
					<div class="panel-body">

						<div class="form-group">
							<div class="col-md-12">
								<span>Thanh toán an toàn bằng thẻ tín dụng</span>
							</div>
						</div>

<?php
$total_pay = str_replace(',', '', \Cart::initial(0));
//đẩy lên url
$vnp_TxnRef = date('YmdHis'); //Mã đơn hàng.
$vnp_OrderInfo = 'Thanh toan hoa don';
$vnp_OrderType = 25000;
$vnp_Amount = $total_pay * 100;
$vnp_Locale = 'vn';
$vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
$inputData = array(
	"vnp_Version" => "2.0.0",
	"vnp_TmnCode" => $vnp_TmnCode,
	"vnp_Amount" => $vnp_Amount,
	"vnp_Command" => "pay",
	"vnp_CreateDate" => date('YmdHis'),
	"vnp_CurrCode" => "VND",
	"vnp_IpAddr" => $vnp_IpAddr,
	"vnp_Locale" => $vnp_Locale,
	"vnp_OrderInfo" => $vnp_OrderInfo,
	"vnp_OrderType" => $vnp_OrderType,
	"vnp_ReturnUrl" => $vnp_Returnurl,
	"vnp_TxnRef" => $vnp_TxnRef,
);
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

$vnp_Url = $vnp_Url . "?" . $query;
if (isset($vnp_HashSecret)) {
	$vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
	$vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
}
?>

						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<button type="submit" class="btn btn-primary btn-submit-fix">Đăng ký dịch vụ <i class="fa fa-credit-card"></i>
								</button>
							</div>
							<a class="btn btn-success" href="<?php echo $vnp_Url ?>" class="beta-btn primary">Thanh toán bằng thẻ <i class="fa fa-credit-card"></i></a>
						</div>
					</div>
				</div>
				<!--CREDIT CART PAYMENT END-->
			</div>

		</form>
	</div>
	<div class="row cart-footer">

	</div>
</div>
@stop