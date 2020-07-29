@extends('admin::layouts.master')

@section('content')
<div class="container-fluid">
	<nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.get.index.employer') }}">Nhà tuyển dụng</a></li>
        <li class="breadcrumb-item active" aria-current="page">Thông báo</li>
      </ol>
    </nav>

	<h2 class="page-header">Quản lý thông báo
	</h2>
<div class="table-responsive">
	<table class="table table-striped table-sm">
		<thead>
			<tr>
				<th><input type="checkbox" id="checkAll"> Check</th>
				<th>STT</th>
				<th>Nội dung</th>
				<th>Thao tác</th>
			</tr>
		</thead>
		<tbody>
			@if(isset($notis))
			<span style="display: none">{{ $a=1 }}</span>
				@foreach($notis as $noti)
					<tr>
						<td>
							<b><input type="checkbox" id="checkItem"></b>
						</td>
						<td><!-- STT -->
							<b>{{ $a++ }}</b>
						</td>
						<td><!-- Tên -->
							<b>{{ $noti->no_content }}</b>
						</td>
						<td><!-- Trạng thái -->
							<a href="{{ route('admin.get.action.employer.notification',['active', $noti->id]) }}" class="btn {{ $noti->getStatus($noti->no_active)['class'] }}">{{ $noti->getStatus($noti->no_active)['name'] }}</a>
						</td>
						<td><!-- Thao tác -->
							<a class="btn btn-danger" href="{{ route('admin.get.action.employer.notification',['delete', $noti->id]) }}" title="Xoá">
								<i class="fa fa-trash" aria-hidden="true"></i> Xoá
							</a>
						</td>
					</tr>
				@endforeach
			@endif
		</tbody>
	</table>
	{!! $notis->links() !!}
</div>

<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Thông báo user</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST">
      	@csrf
	      <div class="modal-body mx-3">
	        <div class="md-form mb-5">
	          <i class="fas fa-envelope prefix grey-text"></i>
	          <input type="text" id="defaultForm-text" name="no_content" class="form-control validate" required>
	          <label data-error="wrong" data-success="right" for="defaultForm-text">Nội dung</label>
	        </div>

	        {{-- <div class="md-form mb-4">
	          <i class="fas fa-lock prefix grey-text"></i>
	          <input type="password" id="defaultForm-pass" class="form-control validate">
	          <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>
	        </div> --}}

	      </div>
	      <div class="modal-footer d-flex justify-content-center">
	        <button class="btn btn-default" type="submit">Xác nhận</button>
	      </div>
	  </form>
    </div>
  </div>
</div>

<div class="text-center">
  <a href="" class="btn btn-success btn-rounded mb-4" data-toggle="modal" data-target="#modalLoginForm">Thêm thông báo</a>
</div>
<script src="http://code.jquery.com/jquery.js"></script>
<script type="text/javascript">
	$("#checkAll").click(function () {
     $('input:checkbox').not(this).prop('checked', this.checked);
 });
</script>
@stop