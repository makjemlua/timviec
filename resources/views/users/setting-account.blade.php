@extends('users.dashboard')
@section('content')
<h3 class="title font-roboto text-primary">
	<span class="text">Cài đặt tài khoản</span>
</h3>
<div class="col-md-12">
  <div class="row">
        <a class="btn btn-success" href="{{ route('user.setting.changepass') }}">Đổi mật khẩu</a>
  </div>
</div>
@stop