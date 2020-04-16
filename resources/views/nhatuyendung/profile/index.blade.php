@extends('nhatuyendung.dashboard')
@section('content')
<style type="text/css">
	.important
	{
		color: red;
		font-weight: bold;
	}
	.thao-tac
	{
		margin-left: 10px;
	}
</style>
<h3 class="title font-roboto text-primary">
	<span class="text">Quản lý tin tuyển dụng</span>
</h3>
<p>Quý khách đang sử dụng tài khoản <span class="important">LỌC HỒ SƠ</span> bị giới hạn về quyền lợi đăng tin.</p>
<p>Tham gia các gói <a class="important" href="{{ route('get.list.cart') }}">Dịch vụ đăng tin</a> để tuyển dụng nhanh và hiệu quả với nhiều quyền lợi hấp dẫn.</p>
@if(count($employers) == 0)
<h1 style="text-align: center; padding: 10px 10px; color: red;">Bạn chưa có bài đăng nào</h1>
@else
<div class="table-responsive">
<table class="table table-striped table-sm">
	<thead>
		<tr>
			<th>STT</th>
			<th>Hiển thị</th>
			<th>Tên hồ sơ</th>
			<th>Thao tác</th>
			<th>Tình trạng</th>
		</tr>
	</thead>
	<tbody>
		@if($employers)
		<span style="display: none">{{ $a=1 }}</span>
		@foreach($employers as $employer)
		<tr>
			<td>{{ $a++ }}</td>
			<td width="150px">
				<a href="{{ route('employer.get.action.profile',['active', $employer->id]) }}" class="btn {{ $employer->getStatus($employer->pr_status)['class'] }}">{{ $employer->getStatus($employer->pr_status)['name'] }}</a>
			</td>
			<td>
				{{ $employer->pr_title }}
			</td>
			<td width="300px">
				<a class="thao-tac xem btn btn-success" href="{{ route('employer.profile.view', $employer->id) }}" title="Xem hồ sơ">
					<i class="fa fa-eye" aria-hidden="true"></i>Xem
				</a>
				<a class="thao-tac sua btn btn-primary" href="{{ route('employer.profile.update', $employer->id) }}" title="Cập nhập">
					<i class="fa fa-pencil-square-o" aria-hidden="true"></i>Cập nhập
				</a>
				<a class="thao-tac xoa btn btn-danger" href="{{ route('employer.get.action.profile', ['delete', $employer->id]) }}" title="Xóa">
					<i class="fa fa-trash" aria-hidden="true"></i>Xóa
				</a>
			</td>
			<td>
				@if($employer->pr_active == 0)
					<p class="btn btn-danger" title="Hồ sơ của bạn chưa được cấp phép">Chưa duyệt</p>
				@else
					<p class="btn btn-success" title="Hồ sơ của bạn đã được cấp phép">Đã duyệt</p>
				@endif
			</td>
		</tr>
		@endforeach
		@endif
	</tbody>
</table>

</div>
<h6>Tối đa 10 tin</h6>
@endif
@if(count($employers) >= 10)
@else
	<div>
		<a href="{{ route('employer.profile.create') }}" class="btn btn-success">Đăng tin</a>
	</div>
@endif
@stop