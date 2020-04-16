@extends('admin::layouts.master')

@section('content')
<style type="text/css">
	.error
	{
		font-size: 15px;
		color: red;
		width: 100%;
	}
</style>
<div class="container-fluid">
	<nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.get.list.role') }}">Admin</a></li>
        <li class="breadcrumb-item active" aria-current="page">Đổi mật khẩu</li>
      </ol>
    </nav>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

	</div>


<form action="" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="form-group">
				<label for="password_old">Mật khẩu cũ:</label>
				<input type="password" class="form-control" name="password_old" value="{{ old('password_old') }}" placeholder="Mật khẩu cũ">
				<a href="javascript:;void(0)"><i class="fa fa-eye"></i></a>
				@if ($errors->has('password_old'))
				<div class="error">{{ $errors->first('password_old') }}</div>
				@endif
			</div>
			<div class="form-group">
				<label for="password">Mật khẩu mới:</label>
				<input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Mật khẩu mới">
				<a href="javascript:;void(0)"><i class="fa fa-eye"></i></a>
				@if ($errors->has('password'))
				<div class="error">{{ $errors->first('password') }}</div>
				@endif
			</div>
			<div class="form-group">
				<label for="password_comfirm">Nhập lại mật khẩu mới:</label>
				<input type="password" class="form-control" name="password_comfirm" value="{{ old('password_comfirm') }}" placeholder="Mật khẩu mới">
				<a href="javascript:;void(0)"><i class="fa fa-eye"></i></a>
				@if ($errors->has('password_comfirm'))
				<div class="error">{{ $errors->first('password_comfirm') }}</div>
				@endif
			</div>
			<button type="submit" class="btn btn-success">Xác nhận</button>
		</div>
	</div>
</form>

</div>
@stop
@section('script')
<script>
	$(function(){
		$(".form-group a").click(function(){
			let $this = $(this);

			if($this.hasClass('active'))
			{
				$this.parents('.form-group').find('input').attr('type', 'password')
				$this.removeClass('active');
			}
			else
			{
				$this.parents('.form-group').find('input').attr('type', 'text')
				$this.addClass('active');
			}
		})
	})
</script>
@stop