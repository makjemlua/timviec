@extends('layouts.app')
@section('content')
<style type="text/css">
	.btn-big
	{
		width: 100%;
	}
	.note
	{
		font-size: 14px;
		margin-top: 10px;
		color: #2d82c4;
	}
	.btn-register
	{
		width: 100%;
	}
	.userccount p
	{
		color: #F37911;
		font-size: 20px;
		padding: 10px;
	}
  .userccount
  {
    background-color: #e2c1ff;
  }
</style>
<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Đăng nhập</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="{{ route('home.index') }}">Home</a> / <span>Login</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->
<div class="listpgWraper">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="userccount">
          <div class="socialLogin">
            <h5>Đăng nhập người tìm việc</h5>
           		<img src="{{ asset('images/tim-viec.png') }}" alt="tim-viec">
           	</div>
          <!-- login form -->
          <a class="btn btn-success btn-big" href="{{ route('login.user') }}">Đăng nhập Người tìm việc</a>
          <!-- login form  end-->

          <!-- sign up form -->
          <div class="note"><i class="fa fa-chevron-circle-right"></i> <a href="">Hướng dẫn người tìm việc đăng nhập</a></div>
          <!-- sign up form end-->

        </div>
      </div>


      <div class="col-md-4">
        <div class="userccount">
          <div class="socialLogin">
            <h5>Đăng nhập nhà tuyển dụng</h5>
            	<img src="{{ asset('images/tuyen-dung.png') }}" alt="tuyen-dung">
            </div>

           <a class="btn btn-success btn-big" href="{{ route('login.employer') }}">Đăng nhập Nhà tuyển dụng</a>

          <!-- sign up form -->
          <div class="note"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> <a href="">Hướng dẫn người tuyển dụng đăng nhập</a></div>
          <!-- sign up form end-->

        </div>
      </div>

      <div class="col-md-4">
      	<div class="userccount">
      		<!-- login form -->
			<p class="btn-un">Bạn chưa có tài khoản ?</p>
      		<!-- login form  end-->
			<div class="row">
				<div class="col-md-8"><a class="btn btn-success btn-register" href="{{ route('register.index') }}">Đăng ký</a></div>
				<div class="col-md-4"><img src="{{ asset('images/dang-ky.png') }}" alt="dang-ky" width="50px"></div>
			</div>
			<p>Tham gia ngay và truy cập hàng ngàn công việc hàng đầu!</p>
      	</div>
      </div>
      </div>
    </div>
  </div>
</div>
@stop