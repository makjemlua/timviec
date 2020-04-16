@extends('admin::layouts.master')

@section('content')
<div class="container-fluid">
	<nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.get.list.job') }}">Job</a></li>
        <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
      </ol>
    </nav>
    <div class="row">
    	<div class="col-md-12">
    		<form class="form-inline">
    			<div class="form-group">
    				<input type="text" class="form-control" name="search" placeholder="Tên job" value="{{ \Request::get('search') }}">
    			</div>
				<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
    		</form>
    	</div>
    </div>
	<h2 class="page-header">Quản lý Jobs <a class="btn btn-primary float-right" href="{{ route('admin.get.create.job') }}" title="Thêm mới">
		<i class="fa fa-plus-square" aria-hidden="true"></i> Thêm mới</a>
	</h2>
<div class="table-responsive">
	<table class="table table-striped table-sm">
		<thead>
			<tr>
				<th>STT</th>
				<th>Tên job</th>
				<th>Ngày tạo</th>
				<th>Thao tác</th>
			</tr>
		</thead>
		<tbody>
			@if(isset($jobs))
			<span style="display: none">{{ $a=1 }}</span>
				@foreach($jobs as $job)
					<tr>
						<td><!-- STT -->
							<b>{{ $a++ }}</b>
						</td>
						<td><!-- Tên bài viết -->
							<b>{{ $job->name }}</b>
						</td>
						<td><!-- Ngày tạo -->
							{{ $job->created_at }}
						</td>
						<td><!-- Thao tác -->
							<a class="btn btn-primary" href="{{ route('admin.get.edit.job',$job->id) }}" title="Cập nhập">
								<i class="fa fa-pencil-square-o" aria-hidden="true"></i>Sửa
							</a>
							<a class="btn btn-danger" href="{{ route('admin.get.action.job',['delete', $job->id]) }}" title="Xóa">
								<i class="fa fa-trash" aria-hidden="true"></i>Xóa
							</a>
						</td>
					</tr>
				@endforeach
			@endif
		</tbody>
	</table>
	{!! $jobs->links() !!}
</div>
</div>
@stop