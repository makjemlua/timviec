@extends('users.dashboard')
@section('content')
<style type="text/css">
	a.btn.btn-primary.huongdan
	{
		margin-top: 10px;
		width: 300px;
	}
</style>
<h3 class="title font-roboto text-primary">
	<span class="text">Hướng dẫn thao tác</span>
</h3>
<div class="col-md-12">
  <div class="row">
        <a class="btn btn-primary huongdan" href="{{ route('user.huongdan.taotaikhoan') }}">1. Hướng dẫn đăng ký tài khoản</a><br>
        <a class="btn btn-primary huongdan" href="{{ route('user.huongdan.dangnhap') }}">2. Hướng dẫn đăng nhập tài khoản</a><br>
        <a class="btn btn-primary huongdan" href="#">3. Hướng dẫn đổi mật khẩu</a><br>
        <a class="btn btn-primary huongdan" href="#">4. Hướng dẫn tìm kiếm tin tuyển dụng</a><br>
        <a class="btn btn-primary huongdan" href="#">5. Hướng dẫn nộp hồ sơ</a>
  </div>
</div>
@stop