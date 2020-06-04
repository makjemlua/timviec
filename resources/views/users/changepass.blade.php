@extends('users.dashboard')
@section('content')
<style type="text/css">
	.error
	{
		font-size: 15px;
		color: red;
		width: 100%;
	}
</style>
<h3 class="title font-roboto text-primary">
	<span class="text">Cài đặt tài khoản</span>
</h3>
<form action="" method="POST">
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
			<input type="submit" class="btn btn-success" value="Xác nhận">
		</div>
	</div>
</form>
@endsection
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