@extends('users.dashboard')
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
	<span class="text">Hồ sơ của bạn</span>
</h3>
<p>Bạn được tạo tối đa <span class="important">02 hồ sơ</span></p>
<p>Tất cả các hồ sơ ở trạng thái "Đã duyệt" đều có thể sử dụng để "Nộp hồ sơ" trực tuyến</p>
@if(count($userProfile) == 0)
<h1 style="text-align: center; padding: 10px 10px; color: red;">Bạn chưa có hồ sơ nào</h1>
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
		@if($userProfile)
		<span style="display: none">{{ $a=1 }}</span>
		@foreach($userProfile as $userProfiles)
		<tr>
			<td>{{ $a++ }}</td>
			<td width="150px">
				<a href="{{ route('user.get.action.profile',['active', $userProfiles->id]) }}" class="label {{ $userProfiles->getStatus($userProfiles->ge_status)['class'] }}">{{ $userProfiles->getStatus($userProfiles->ge_status)['name'] }}</a>
			</td>
			<td>
				{{ $userProfiles->ge_title }}
			</td>
			<td width="300px">
				<a class="thao-tac xem label label-success" href="{{ route('user.profile.view', $userProfiles->id) }}" title="Xem hồ sơ">
					<i class="fa fa-eye" aria-hidden="true"></i>Xem
				</a>
				<a class="thao-tac sua label label-primary" href="{{ route('user.profile.update', $userProfiles->id) }}" title="Cập nhập">
					<i class="fa fa-pencil-square-o" aria-hidden="true"></i>Cập nhập
				</a>
				<a class="thao-tac xoa label label-danger" href="{{ route('user.get.action.profile', ['delete', $userProfiles->id]) }}" title="Xóa">
					<i class="fa fa-trash" aria-hidden="true"></i>Xóa
				</a>
			</td>
			<td>
				@if($userProfiles->ge_active == 0)
					<p class="label label-danger" title="Hồ sơ của bạn chưa được cấp phép">Chưa duyệt</p>
				@else
					<p class="label label-success" title="Hồ sơ của bạn đã được cấp phép">Đã duyệt</p>
				@endif
			</td>
		</tr>
		@endforeach
		@endif
	</tbody>
</table>

</div>
@endif
@if(count($userProfile) >= 2)
@else
	<div>
		<a href="{{ route('user.profile.create') }}" class="btn btn-success">Tạo hồ sơ mới</a>
	</div>
@endif
@stop