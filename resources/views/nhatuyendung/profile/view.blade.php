@extends('nhatuyendung.dashboard')
@section('content')
<style type="text/css">
	td.info
	{
		color: blue;
		font-weight: bold;
		font-size: 15px;
		padding-left: 25px;
		line-height: 25px;
		width: 500px;
	}
	td
	{
		line-height: 25px;
		width: 220px;
	}
	hr
	{
		border-top: 1px solid #f00;
	}
	img.btn-logo
	{
		width: 190px;
		height: 150px;
	}
</style>
<div>
	<div>
		<h3>Thông tin công ty</h3>
		<div class="row">
			<div class="col-md-3">
				<img class="btn-logo" src="{{ asset(pare_url_file($employers->em_avatar)) }}" alt="placeholder+image">
			</div>
			<div class="col-md-9 info">
				<table>
					<tr>
						<td>Họ tên</td>
						<td class="info">{{ $employers->name }}</td>
					</tr>
					<tr>
						<td>Địa chỉ</td>
						<td class="info">{{ $employers->em_address }}</td>
					</tr>
					<tr>
						<td>Số điện thoại</td>
						<td class="info">{{ $employers->em_phone }}</td>
					</tr>
					<tr>
						<td>Email</td>
						<td class="info">{{ $employers->email }}</td>
					</tr>
					<tr>
						<td>Công ty</td>
						<td class="info">{{ $employers->em_company }}</td>
					</tr>
					<tr>
						<td>Website</td>
						<td class="info">{{ $employers->em_website }}</td>
					</tr>

				</table>
			</div>
		</div>
	</div>
	<hr/>
	<div>
		<h3>Thông tin chung</h3>
		<div>
			<table>
				<tr>
					<td>Tiêu đề bài đăng</td>
					<td class="info">{{ $profiles->pr_title }}</td>
				</tr>
				<tr>
					<td>Số lượng</td>
					<td class="info">{{ $profiles->pr_quantity }}</td>
				</tr>
				<tr>
					<td>Giới tính yêu cầu</td>
					<td class="info">{{ $profiles->pr_gender }}</td>
				</tr>
				<tr>
					<td>Mô tả công việc</td>
					<td class="info"><hr/>{!! $profiles->pr_description !!}</td>
				</tr>
				<tr>
					<td>Yêu cầu công việc</td>
					<td class="info"><hr/>{!! $profiles->pr_skill !!}</td>
				</tr>
				<tr>
					<td>Tính chất công việc</td>
					<td class="info"><hr/>{{ $profiles->pr_attribute }}</td>
				</tr>
				<tr>
					<td>Trình độ</td>
					<td class="info">{{ $profiles->pr_level }} VNĐ</td>
				</tr>
				<tr>
					<td>Kinh nghiệm</td>
					<td class="info">{{ $profiles->pr_experience }}</td>
				</tr>
				<tr>
					<td>Mức lương</td>
					<td class="info">{{ $profiles->pr_salary }}</td>
				</tr>
				<tr>
					<td>Hình thức làm việc</td>
					<td class="info">{{ $profiles->pr_work_time }}</td>
				</tr>
				<tr>
					<td>Thời gian thử việc</td>
					<td class="info">{{ $profiles->pr_probation_time }}</td>
				</tr>
				<tr>
					<td>Quyền lợi</td>
					<td class="info"><hr/>{!! $profiles->pr_benefit !!}</td>
				</tr>
				<tr>
					<td>Ngành nghề chính</td>
					<td class="info"><hr/>{{ $profiles->pr_career }}</td>
				</tr>
				<tr>
					<td>Ngành nghề phụ</td>
					<td class="info">{{ $profiles->pr_career_2 }}</td>
				</tr>
				<tr>
					<td>Nơi làm việc</td>
					<td class="info">{{ $profiles->pr_provinces }}</td>
				</tr>
				<tr>
					<td>Hết hạn</td>
					<td class="info">{{ $profiles->pr_expired_at }}</td>
				</tr>
			</table>
		</div>
	</div>
	<hr/>
	<div>
		<a class="btn btn-primary" href="{{ route('employer.profile.update', $profiles->id) }}">Chỉnh sửa bài tuyển dụng</a>
		<a class="btn btn-danger pull-right" href="{{ route('employer.profile.index') }}">Quay lại</a>
	</div>
</div>

@stop