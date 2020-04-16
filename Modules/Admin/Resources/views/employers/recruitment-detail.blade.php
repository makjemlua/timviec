@extends('admin::layouts.master')
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
		border: 1px solid black;
	}
</style>
@section('content')
<div class="container-fluid">
	<nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.get.index.employer') }}">Nhà tuyển dụng</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.get.profile.employer') }}">Bài đăng</a></li>
        <li class="breadcrumb-item active" aria-current="page">Xem</li>
      </ol>
    </nav>

	<div>
		<h3>Thông tin chung</h3>
		<div>
			<table>
				<tr>
					<td>Tiêu đề bài đăng</td>
					<td class="info">{{ $employerProfile->pr_title }}</td>
				</tr>
				<tr>
					<td>Số lượng</td>
					<td class="info">{{ $employerProfile->pr_quantity }}</td>
				</tr>
				<tr>
					<td>Giới tính</td>
					<td class="info">{{ $employerProfile->pr_gender }}</td>
				</tr>
				<tr>
					<td>Mô tả công việc</td>
					<td class="info">{!! $employerProfile->pr_description !!}</td>
				</tr>
				<tr>
					<td>Yêu cầu công việc</td>
					<td class="info">{{ $employerProfile->pr_skill }}</td>
				</tr>
				<tr>
					<td>Tính chất công việc</td>
					<td class="info">{{ $employerProfile->pr_attribute }}</td>
				</tr>
				<tr>
					<td>Trình độ</td>
					<td class="info">{{ $employerProfile->pr_level }}</td>
				</tr>
				<tr>
					<td>Kinh nghiệm</td>
					<td class="info">{{ $employerProfile->pr_experience }}</td>
				</tr>
				<tr>
					<td>Mức lương</td>
					<td class="info">{{ $employerProfile->pr_salary }}</td>
				</tr>
				<tr>
					<td>Hình thức làm việc</td>
					<td class="info">{{ $employerProfile->pr_work_time }}</td>
				</tr>
				<tr>
					<td>Thời gian thử việc</td>
					<td class="info">{{ $employerProfile->pr_probation_time }}</td>
				</tr>
				<tr>
					<td>Quyền lợi</td>
					<td class="info">{{ $employerProfile->pr_benefit }}</td>
				</tr>
				<tr>
					<td>Ngành hiển thị chính</td>
					<td class="info">{{ $employerProfile->pr_career }}</td>
				</tr>
				<tr>
					<td>Ngành hiển thị phụ</td>
					<td class="info">{{ $employerProfile->pr_career_2 }}</td>
				</tr>
				<tr>
					<td>Nơi làm việc</td>
					<td class="info">{{ $employerProfile->pr_provinces }}</td>
				</tr>
				<tr>
					<td>Hết hạn</td>
					<td class="info">{{ $employerProfile->pr_expired_at }}</td>
				</tr>
			</table>
		</div>
	</div>
	<hr/>
</div>
@stop