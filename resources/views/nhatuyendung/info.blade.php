@extends('nhatuyendung.dashboard')
@section('content')
<style type="text/css">
hr
{
	border-top: 1px solid #f00;
}
</style>
<form action="" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="box-content">
		<h3 class="title font-roboto text-primary">
			<span class="text">Thông tin tài khoản</span>
		</h3>
		<div class="row">
			<div class="col-md-3">
				<div class="card" style="width: 18rem;">
					<img src="{{ asset(pare_url_file($employers->em_avatar)) }}" class="card-img-top" alt="..." >
					<div>
						<input type="file" name="avatar">
					</div>
				</div>
			</div>
			<div class="col-md-9">
				<header class="block-title">

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Name</label>
								<input type="text" name="name" class="form-control" value="{{ old('name', isset($employers->name) ? $employers->name : '') }}" placeholder="User Name">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Email</label>
								<input type="text" name="email" class="form-control" value="{{ old('email', isset($employers->email) ? $employers->email : '') }}" placeholder="Email" readonly>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Số điện thoại</label>
								<input type="text" name="em_phone" class="form-control" value="{{ old('em_phone', isset($employers->em_phone) ? $employers->em_phone : '') }}" placeholder="Phone">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Địa chỉ</label>
								<input type="text" name="em_address" class="form-control" value="{{ old('em_address', isset($employers->em_address) ? $employers->em_address : '') }}" placeholder="Address">
							</div>
						</div>
					</div>
				</header>
			</div>
		</div>
	</div>
	<hr/>
	<div>
		<h3 class="title font-roboto text-primary">
			<span class="text">Thông tin công ty</span>
		</h3>
		<div class="row">
			<div class="col-md-12">
				<header class="block-title">

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Tên công ty</label>
								<input type="text" name="em_company" class="form-control" value="{{ old('em_company', isset($employers->em_company) ? $employers->em_company : '') }}" placeholder="User Name">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Quy mô nhân sự</label>
								<select class="form-control" name="em_scale">
									<option value="{{ old('em_scale',isset($employers->em_scale) ? $employers->em_scale : '') }}">
				                        {{ old('em_scale',isset($employers->em_scale) ? $employers->em_scale : 'Chọn quy mô') }}
				                      </option>
									<option value="Dưới 20 người">Dưới 20 người</option>
									<option value="20 - 150 người">20 - 150 người</option>
									<option value="150 - 300 người">150 - 300 người</option>
									<option value="Trên 300 người">Trên 300 người</option>
								</select>
							</div>
						</div>
						<div class="col-md-9">
							<div class="form-group">
								<label>Sơ lược công ty</label>
								<textarea name="em_description" class="form-control">{{ old('em_description', isset($employers->em_description) ? $employers->em_description : '') }}</textarea>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Website</label>
								<input type="text" name="em_website" class="form-control" value="{{ old('email', isset($employers->email) ? $employers->email : '') }}" placeholder="Address">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Hình thức liên hệ</label>
								<select class="form-control" name="em_contact_type">
									<option value="{{ old('em_contact_type',isset($employers->em_contact_type) ? $employers->em_contact_type : '') }}">
				                        {{ old('em_contact_type',isset($employers->em_contact_type) ? $employers->em_contact_type : 'Chọn hình thức') }}
				                      </option>
									<option value="Mọi hình thức">Mọi hình thức</option>
									<option value="Ưu tiên nộp trực tiếp">Ưu tiên nộp trực tiếp</option>
									<option value="Qua email">Qua email</option>
									<option value="Qua điện thoại">Qua điện thoại</option>
									<option value="Qua bưu điện">Qua bưu điện</option>
								</select>
							</div>
						</div>
					</div>
					<input type="submit" class="btn btn-success mx-auto d-block" name="submit" value="Cập nhập">
				</header>
			</div>
		</div>
	</div>
</form>
@stop