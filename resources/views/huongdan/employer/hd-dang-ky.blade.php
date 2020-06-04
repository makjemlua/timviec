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
		<h3>Hướng dẫn tạo tài khoản nhà tuyển dụng</h3>
		<p>Việc đăng ký tài khoản Nhà tuyển dụng trên Timviecnhanh.xyz rất đơn giản. Bạn chỉ mất 1 phút để thực hiện các bước sau đây:</p>
		<p>Bước 1: Tại trang chủ, bấm vào nút "Đăng ký" ở góc phải màn hình giao diện hoặc <a href="{{ route('register.employer') }}">bấm vào đây »</a></p>
		<img src="{{ asset('images/huongdan/tut1.png') }}" width="800px" alt="placeholder+image">
		<p>Bước 2: Chọn "Đăng ký nhà tuyển dụng"</p>
		<img src="{{ asset('images/huongdan/tut8.png') }}" width="800px" alt="placeholder+image">
		<p>Bước 3: Điền đầy đủ thông tin yêu cầu. Sau đó, bấm vào nút "Đăng ký"</p>
		<img src="{{ asset('images/huongdan/tut9.png') }}" width="500px" alt="placeholder+image">
		<p>Mọi thắc mắc cần hỗ trợ xin vui lòng liên hệ bộ phận hỗ trợ Người tìm việc của Tìm Việc Nhanh:</p>

		<p>Điện thoại: 09 8888 9999 hoặc 09 8765 4321</p>

		<p>Email: ntv@timviecnhanh.xyz</p>

		<p>Chúc bạn sẽ nhanh chóng tìm được công việc phù hợp từ Timviecnhanh.xyz.</p>
	</div>
</div>
@stop