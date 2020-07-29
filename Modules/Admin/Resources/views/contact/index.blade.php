@extends('admin::layouts.master')

@section('content')
<div class="container-fluid">
	<nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="">Liên hệ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
      </ol>
    </nav>
	<h2 class="page-header">Quản lý liên hệ
	</h2>
<div class="table-responsive">
	<table class="table table-striped table-sm">
		<thead>
			<tr>
				<th>STT</th>
				<th>Tên hiển thị</th>
				<th>Email</th>
				<th>Nội dung</th>
				<th>Thao tác</th>
			</tr>
		</thead>
		<tbody>
			@if(isset($contacts))
			<span style="display: none">{{ $a=1 }}</span>
				@foreach($contacts as $contact)
					<tr>
						<td><!-- id sản phẩm -->
							<b>{{ $a++ }}</b>
						</td>
						<td><!-- Tên sản phẩm -->
							<b>{{ $contact->co_name }}</b>
						</td>
						<td><!-- Tên sản phẩm -->
							<b>{{ $contact->co_email }}</b>
						</td>
						<th><!-- Hình ảnh -->
							<b>{{ $contact->co_content }}</b>
						</th>
						<td><!-- Thao tác -->
							<a class="thao-tac xoa btn btn-danger" href="{{ route('admin.get.action.contact',['delete', $contact->id]) }}" title="Xóa">
								<i class="fa fa-trash" aria-hidden="true"></i>Xóa
							</a>
						</td>
					</tr>
				@endforeach
			@endif
		</tbody>
	</table>
</div>
</div>
@stop