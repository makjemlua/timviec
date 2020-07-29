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

<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Hóa đơn</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="">Home</a> / <a href="">Nhà tuyển dụng</a> / <span>Hóa đơn</span></div>
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
								<input type="text" name="name" class="form-control" value="{{ get_data_user('employers','name') }}" readonly />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12"><strong>Email Address:</strong></div>
							<div class="col-md-12"><input type="text" name="email_address" class="form-control" value="{{ get_data_user('employers','email') }}" readonly/></div>
						</div>
						<div class="form-group">
							<div class="col-md-12"><strong>Address:</strong></div>
							<div class="col-md-12">
								<input type="text" name="address" class="form-control" value="{{ get_data_user('employers','em_address') }}" readonly/>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12"><strong>Phone Number:</strong></div>
							<div class="col-md-12"><input type="text" name="phone" class="form-control" value="{{ get_data_user('employers','em_phone') }}" readonly/></div>
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
                                <label for="bank_code">Ngân hàng</label>
                                <select name="bank_code" id="bank_code" required class="form-control">
                                    <option value="">Không chọn</option>
                                    <option value="NCB"> Ngan hang NCB</option>
                                    <option value="AGRIBANK"> Ngan hang Agribank</option>
                                    <option value="SCB"> Ngan hang SCB</option>
                                    <option value="SACOMBANK">Ngan hang SacomBank</option>
                                    <option value="EXIMBANK"> Ngan hang EximBank</option>
                                    <option value="MSBANK"> Ngan hang MSBANK</option>
                                    <option value="NAMABANK"> Ngan hang NamABank</option>
                                    <option value="VNMART"> Vi dien tu VnMart</option>
                                    <option value="VIETINBANK">Ngan hang Vietinbank</option>
                                    <option value="VIETCOMBANK"> Ngan hang VCB</option>
                                    <option value="HDBANK">Ngan hang HDBank</option>
                                    <option value="DONGABANK"> Ngan hang Dong A</option>
                                    <option value="TPBANK"> Ngân hàng TPBank</option>
                                    <option value="OJB"> Ngân hàng OceanBank</option>
                                    <option value="BIDV"> Ngân hàng BIDV</option>
                                    <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                                    <option value="VPBANK"> Ngan hang VPBank</option>
                                    <option value="MBBANK"> Ngan hang MBBank</option>
                                    <option value="ACB"> Ngan hang ACB</option>
                                    <option value="OCB"> Ngan hang OCB</option>
                                    <option value="IVB"> Ngan hang IVB</option>
                                    <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                                </select>
                            </div>
                        </div>

						<div class="form-group">
							<div class="col-md-12">
								<button type="submit" class="btn btn-success">Xác nhận thông tin</button>
							</div>
						</div>
{{ \Request::get('vnp_BankCode') }}
					</div>
				</div>
				<!--CREDIT CART PAYMENT END-->
			</div>

		</form>
	</div>
	<div class="row cart-footer">

	</div>
</div>
</body>
@stop
