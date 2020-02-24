@extends('users.dashboard')
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
		<h3>Thông tin tài khoản</h3>
		<div class="row">
			<div class="col-md-3">
				<img class="btn-logo" src="{{ asset(pare_url_file($user->avatar)) }}" alt="placeholder+image">
			</div>
			<div class="col-md-9 info">
				<table>
					<tr>
						<td>Họ tên</td>
						<td class="info">{{ $user->name }}</td>
					</tr>
					<tr>
						<td>Giới tính</td>
						<td class="info">{{ $user->gender }}</td>
					</tr>
					<tr>
						<td>Ngày sinh</td>
						<td class="info">{{ date('d-m-Y',strtotime($user->birthday)) }}</td>
					</tr>
					<tr>
						<td>Chỗ ở hiện tại</td>
						<td class="info">{{ $user->address }}</td>
					</tr>
					<tr>
						<td>Số điện thoại</td>
						<td class="info">{{ $user->phone }}</td>
					</tr>
					<tr>
						<td>Email</td>
						<td class="info">{{ $user->email }}</td>
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
					<td>Tiêu đề hồ sơ</td>
					<td class="info">{{ $userProfile->ge_title }}</td>
				</tr>
				<tr>
					<td>Trình độ cao nhất</td>
					<td class="info">{{ $userProfile->ge_level }}</td>
				</tr>
				<tr>
					<td>Số năm kinh nghiệm</td>
					<td class="info">{{ $userProfile->ge_experience }}</td>
				</tr>
				<tr>
					<td>Cấp bậc hiện tại</td>
					<td class="info">{{ $userProfile->ge_position_current }}</td>
				</tr>
				<tr>
					<td>Cấp bậc mong muốn</td>
					<td class="info">{{ $userProfile->ge_position }}</td>
				</tr>
				<tr>
					<td>Ngành nghề mong muốn</td>
					<td class="info">{{ $userProfile->ge_profession }}</td>
				</tr>
				<tr>
					<td>Mong muốn mức lương tối thiểu</td>
					<td class="info">{{ number_format($userProfile->ge_salary_min,0, ',', '.') }} VNĐ</td>
				</tr>
				<tr>
					<td>Nơi làm việc mong muốn</td>
					<td class="info">{{ $userProfile->ge_provinces }}</td>
				</tr>
				<tr>
					<td>Mục tiêu nghề nghiệp</td>
					<td class="info">{{ $userProfile->ge_career }}</td>
				</tr>
			</table>
		</div>
	</div>
	<hr/>
	<div>
		<h3>Kinh nghiệm làm việc</h3>
		<div>
			<table>
				<tr>
					<td>Tháng {{ $userProfileExp->ex_month_from }}-{{ $userProfileExp->ex_year_from }} đến {{ $userProfileExp->ex_month_to }}-{{ $userProfileExp->ex_year_to }}</td>
					<td class="info">{{ $userProfileExp->ex_position_exp }}</td>
				</tr>
				<tr>
					<td>Công ty</td>
					<td class="info">{{ $userProfileExp->ex_company_name }}</td>
				</tr>
				<tr>
					<td>Mô tả công việc</td>
					<td class="info">{{ $userProfileExp->ex_description }}</td>
				</tr>
				<tr>
					<td>Thành tích đạt được</td>
					<td class="info">{{ $userProfileExp->ex_achieve }}</td>
				</tr>
			</table>
		</div>
	</div>
	<hr/>
	<div>
		<h3>Trình độ & Bằng cấp</h3>
		<div>
			<table>
				<tr>
					<td>Năm {{ $degrees->de_year_from }} - Năm {{ $degrees->de_year_to }}</td>
					<td class="info">{{ $degrees->de_level }}</td>
				</tr>
				<tr>
					<td>Đơn vị đào tạo</td>
					<td class="info">{{ $degrees->de_school_name }}</td>
				</tr>
				<tr>
					<td>Chuyên ngành</td>
					<td class="info">{{ $degrees->de_diploma }}</td>
				</tr>
				<tr>
					<td>Loại tốt nghiệp</td>
					<td class="info">{{ $degrees->de_loai_tn }}</td>
				</tr>
			</table>
		</div>
	</div>
	<hr/>
	<div>
		<h3>Ngoại ngữ & Tin học</h3>
		<div>
			<table>
				<tr>
					<td>Ngoại ngữ</td>
					<td class="info">{{ $languages->la_language }}</td>
				</tr>
				<tr>
					<td>Trình độ</td>
					<td class="info">{{ $languages->la_language_level }}</td>
				</tr>
				<tr>
					<td>Nghe</td>
					<td class="info">{{ $languages->la_listen }}</td>
				</tr>
				<tr>
					<td>Đọc</td>
					<td class="info">{{ $languages->la_read }}</td>
				</tr>
				<tr>
					<td>Viết</td>
					<td class="info">{{ $languages->la_write }}</td>
				</tr>
				<tr>
					<td>Nói</td>
					<td class="info">{{ $languages->la_speak }}</td>
				</tr>
			</table>
		</div>
	</div>
	<hr/>
	<div>
		<h3>Kỹ năng & sở trường</h3>
		<div>
			<table>
				<tr>
					<td>Kỹ năng/ Sở trường</td>
					<td class="info">{{ $skills->sk_skill_name }}</td>
				</tr>
				<tr>
					<td>Sở thích</td>
					<td class="info">{{ $skills->sk_interesting }}</td>
				</tr>
				<tr>
					<td>Kỹ năng đặc biệt/ Tài lẻ</td>
					<td class="info">{{ $skills->sk_speial_skill }}</td>
				</tr>
			</table>
		</div>
	</div>
	<hr/>
	<div>
		<a class="label label-primary" href="{{ route('user.profile.update', $userProfile->id) }}">Chỉnh sửa hồ sơ</a>
		<a class="label label-danger pull-right" href="{{ route('user.profile.index') }}">Quay lại</a>
	</div>
</div>
@stop