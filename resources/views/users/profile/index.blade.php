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
	.fa.fa-exclamation-triangle
	{
		color: red;
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
<table class="table table-striped table-sm" id="myForm">
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
				@if($count1 == 1)
					@if($userProfiles->ge_status == 1)
						@if($applied == 0)
						<a href="{{ route('user.get.action.profile',['active', $userProfiles->id]) }}" class="btn {{ $userProfiles->getStatus($userProfiles->ge_status)['class'] }}">
							{{ $userProfiles->getStatus($userProfiles->ge_status)['name'] }}
						</a>
							@if ($check->name == null || $check->phone == null || $check->birthday == null || $check->gender == null || $check->address == null || $check->avatar == null)
								<i class="fa fa-exclamation-triangle" title="Vui lòng cập nhập thêm thông tin để được duyệt nhanh hơn."></i>

							@endif
						@else
							<a href="#" class="btn btn-success" onclick="alert('Bạn đã nộp hồ sơ này, không thể tắt trạng thái');">Hiển thị</a>
						@endif
					@endif
				@else
					<a href="{{ route('user.get.action.profile',['active', $userProfiles->id]) }}" class="btn {{ $userProfiles->getStatus($userProfiles->ge_status)['class'] }}">{{ $userProfiles->getStatus($userProfiles->ge_status)['name'] }}</a>
				@endif
			</td>
			<td>
				{{ $userProfiles->ge_title }}
			</td>
			<td width="300px">
				<a class="thao-tac xem btn btn-success" href="{{ route('user.profile.view', $userProfiles->id) }}" title="Xem hồ sơ">
					<i class="fa fa-eye" aria-hidden="true"></i>Xem
				</a>
				<a class="thao-tac sua btn btn-primary" href="{{ route('user.profile.update', $userProfiles->id) }}" title="Cập nhập">
					<i class="fa fa-pencil-square-o" aria-hidden="true"></i>Cập nhập
				</a>
				<a class="thao-tac xoa btn btn-danger" href="{{ route('user.get.action.profile', ['delete', $userProfiles->id]) }}" title="Xóa">
					<i class="fa fa-trash" aria-hidden="true"></i>Xóa
				</a>
			</td>
			<td>
				@if($userProfiles->ge_active == 0)
					<p class="btn btn-danger" title="Hồ sơ của bạn chưa được cấp phép" onclick="alert('Bạn cần phải chờ cho admin duyệt hồ sơ của bạn');">Chưa duyệt</p>
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
@endif
@if(count($userProfile) >= 2)
@else
	@if ($check->name == null || $check->phone == null || $check->birthday == null || $check->gender == null || $check->address == null || $check->avatar == null)
		<div>
			<a href="#" class="btn btn-success" onclick="alert('Vui lòng cập nhập đầy đủ thông tin để tạo hồ sơ');">Tạo hồ sơ mới</a>
		</div>
	@else
		<div>
			<a href="{{ route('user.profile.create') }}" class="btn btn-success">Tạo hồ sơ mới</a>
		</div>
	@endif
@endif
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
	$('#myForm input').on('change', function() {
	   alert($('input[name=radioName]:checked', '#myForm').val());
	});
</script>
@stop