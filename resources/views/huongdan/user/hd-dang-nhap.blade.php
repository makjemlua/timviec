@extends('layouts.app')
@section('content')
<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Hướng dẫn</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="{{ route('home.index') }}">Home</a> / <span>Hướng dẫn</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->
<div class="inner-page">
  	<div class="container">
		<h3>Hướng dẫn đăng nhập người tìm việc</h3>
		<p>Đăng nhập ngay tài khoản người tìm việc trên website Timviecnhanh.xyz bằng vài thao tác đơn giản dưới đây:</p>
		<p>Bước 1: Bấm vào nút "Đăng nhập" ở góc phải màn hình trang chủ hoặc <a href="{{ route('login.user') }}">bấm vào đây »</a></p>
		<img src="{{ asset('images/huongdan/tut4.png') }}" width="800px" alt="placeholder+image">
		<p>Bước 2: Khi màn hình đăng nhập hiện ra, bạn bấm vào nút "Đăng nhập Người tìm việc"</p>
		<img src="{{ asset('images/huongdan/tut5.png') }}" width="800px" alt="placeholder+image">
		<p>Bước 3: Điền thông tin Email và Mật khẩu. Sau đó bấm vào nút "Đăng nhập"</p>
		<img src="{{ asset('images/huongdan/tut6.png') }}" width="500px" alt="placeholder+image">
		<p>Sau khi đăng nhập thành công, màn hình trả về đúng trang trước khi bạn đăng nhập. Đồng thời, lúc này bạn sẽ nhìn thấy tài khoản ở góc phải màn hình </p>
		<img src="{{ asset('images/huongdan/tut7.png') }}" width="200px" alt="placeholder+image">

		<p>Mọi thắc mắc cần hỗ trợ xin vui lòng liên hệ bộ phận hỗ trợ Người tìm việc của Tìm Việc Nhanh:</p>

		<p>Điện thoại: 09 8888 9999 hoặc 09 8765 4321</p>

		<p>Email: ntv@timviecnhanh.xyz</p>

		<p>Chúc bạn sẽ nhanh chóng tìm được công việc phù hợp từ Timviecnhanh.xyz.</p>
	</div>
</div>
@stop