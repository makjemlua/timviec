@extends('layouts.app')
@section('content')

<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Đăng ký dịch vụ</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="">Home</a> / <a href="">Nhà tuyển dụng</a> / <span>Thanh toán</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->
<div class="container wrapper">
  <h4>
  	<p><span style="color: red;">Giao dịch thành công</span> cảm ơn bạn đã sử dụng dịch vụ, chúng tôi sẽ liên hệ với bạn trong thời gian tới.</p>
    <p>Mọi thắc mắc xin liên hệ số điện thoại: 09 8888 9999</p>
    <p>Email: timviecnhanh.xyz@gmail.com</p>
  	<a href="{{ route('home.index') }}">Quay lại trang chủ</a>
  </h4>
</div>
@stop