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
        <li class="breadcrumb-item"><a href="{{ route('admin.get.index.user') }}">User</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.get.profile.user') }}">Hồ sơ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Xem</li>
      </ol>
    </nav>

    <div>
		<h3>Thông tin chung</h3>
		<div>
			<table>
				<tr>
					<td>Tiêu đề hồ sơ</td>
					<td class="info">{{ $profile->ge_title }}</td>
				</tr>
				<tr>
					<td>Trình độ cao nhất</td>
					<td class="info">{{ $profile->ge_level }}</td>
				</tr>
				<tr>
					<td>Số năm kinh nghiệm</td>
					<td class="info">{{ $profile->ge_experience }}</td>
				</tr>
				<tr>
					<td>Cấp bậc hiện tại</td>
					<td class="info">{!! $profile->ge_position_current !!}</td>
				</tr>
				<tr>
					<td>Cấp bậc mong muốn</td>
					<td class="info">{{ $profile->ge_position }}</td>
				</tr>
				<tr>
					<td>Ngành nghề mong muốn</td>
					<td class="info">{{ $profile->ge_profession }}</td>
				</tr>
				<tr>
					<td>Mong muốn mức lương tối thiểu</td>
					<td class="info">{{ $profile->ge_salary_min }}</td>
				</tr>
				<tr>
					<td>Nơi làm việc mong muốn</td>
					<td class="info">{{ $profile->ge_provinces }}</td>
				</tr>
				<tr>
					<td>Mục tiêu nghề nghiệp</td>
					<td class="info">{!! $profile->ge_career !!}</td>
				</tr>
			</table>
		</div>

		<h3>Kinh nghiệm làm việc</h3>
		<div>
			<table>
				<tr>
					<td>Tháng {{ $profileExp->ex_month_from }} - {{ $profileExp->ex_year_from }} Đến {{ $profileExp->ex_month_to }} - {{ $profileExp->ex_year_to }}</td>
					<td class="info">{{ $profileExp->pr_title }}</td>
				</tr>
				<tr>
					<td>Công ty</td>
					<td class="info">{{ $profileExp->ex_company_name }}</td>
				</tr>
				<tr>
					<td>Chức danh</td>
					<td class="info">{{ $profileExp->ex_position_exp }}</td>
				</tr>
				<tr>
					<td>Mức lương</td>
					<td class="info">{{ $profileExp->ex_current_salary }}</td>
				</tr>
				<tr>
					<td>Mô tả công việc</td>
					<td class="info">{!! $profileExp->ex_description !!}</td>
				</tr>
				<tr>
					<td>Thành tích đạt được</td>
					<td class="info">{!! $profileExp->ex_achieve !!}</td>
				</tr>
			</table>
		</div>

		<h3>Trình độ & Bằng cấp</h3>
		<div>
			<table>
				<tr>
					<td>Năm {{ $degrees->de_year_from_1 }} - Năm {{ $degrees->de_year_to_1 }}</td>
					<td class="info">{{ $degrees->pr_title }}</td>
				</tr>
				<tr>
					<td>Đơn vị đào tạo</td>
					<td class="info">{{ $degrees->de_school_1 }}</td>
				</tr>
				<tr>
					<td>Trình độ</td>
					<td class="info">{{ $degrees->de_level_1 }}</td>
				</tr>
				<tr>
					<td>Chuyên ngành</td>
					<td class="info">{{ $degrees->de_diploma_1 }}</td>
				</tr>
				<tr>
					<td>Loại tốt nghiệp</td>
					<td class="info">{!! $degrees->de_loai_tn_1 !!}</td>
				</tr>
			</table>
		</div>

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
					<td class="info">{{ $languages->la_speak }}</td>
				</tr>
				<tr>
					<td>Viết</td>
					<td class="info">{{ $languages->la_read }}</td>
				</tr>
				<tr>
					<td>Nói</td>
					<td class="info">{{ $languages->la_write }}</td>
				</tr>
			</table>
		</div>

		<h3>Kĩ năng & sở trường</h3>
		<div>
			<table>
				<tr>
					<td>Kĩ năng/Sở trường</td>
					<td class="info">{{ $skills->sk_skill_1 }}</td>
				</tr>
				<tr>
					<td>Sở thích</td>
					<td class="info">{{ $skills->sk_interesting }}</td>
				</tr>
				<tr>
					<td>Kĩ năng đặc biệt/Tài lẻ</td>
					<td class="info">{{ $skills->sk_speial_skill }}</td>
				</tr>
			</table>
		</div>
	</div>
	<hr/>
</div>
@stop