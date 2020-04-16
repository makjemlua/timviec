@extends('admin::layouts.master')

@section('content')
<div class="container-fluid">
	<nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.get.list.role') }}">Admin</a></li>
        <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
      </ol>
    </nav>

	<h2 class="page-header">Quản lý tài khoản admin <a class="thao-tac them label label-primary float-right" href="{{ route('admin.get.create.role') }}" title="Thêm mới">
		<i class="fa fa-plus-square" aria-hidden="true"></i> Thêm mới</a>
	</h2>
<div class="table-responsive">
	<table class="table table-striped table-sm">
		<thead>
			<tr>
				<th>STT</th>
				<th>Tên</th>
				<th>Email</th>
				<th>Quyền</th>
				<th>Trạng thái</th>
				<th>Ngày tạo</th>
				<th>Thao tác</th>
			</tr>
		</thead>
		<tbody>
			@if(isset($admins))
			<span style="display: none">{{ $a=1 }}</span>
				@foreach($admins as $admin)
					<tr>
						<td><!-- STT -->
							<b>{{ $a++ }}</b>
						</td>
						<td style="width: 200px"><!-- Tên bài viết -->
							<b>{{ $admin->name }}</b>
						</td>
						<td style="width: 200px"><!-- Tên bài viết -->
							<b>{{ $admin->email }}</b>
						</td>
						<td style="width: 200px"><!-- Mô tả -->
							@if($admin->role == 2)
								Admin
							@elseif($admin->role == 1)
								Mod
							@elseif($admin->role == 0)
								User
							@endif

						</td>
						<td><!-- Trạng thái -->
							<a href="{{ route('admin.get.action.role',['active', $admin->id]) }}" class="btn {{ $admin->getStatus($admin->active)['class'] }}">{{ $admin->getStatus($admin->active)['name'] }}</a>
						</td>
						<td><!-- Ngày tạo -->
							{{ $admin->created_at }}
						</td>
						<td><!-- Thao tác -->
							<a class="thao-tac sua btn btn-primary" href="{{ route('admin.get.edit.role', [$admin->id]) }}" title="Cập nhập">
								<i class="fa fa-pencil-square-o" aria-hidden="true"></i>Sửa
							</a>
							<a class="thao-tac sua btn btn-success" href="{{ route('admin.get.edit.pass') }}" title="Đổi MK">
								<i class="fa fa-pencil-square-o" aria-hidden="true"></i>Đổi MK
							</a>
						</td>
					</tr>
				@endforeach
			@endif
		</tbody>
	</table>
	{!! $admins->links() !!}
</div>
</div>
@stop