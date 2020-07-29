@extends('nhatuyendung.dashboard')
@section('content')
<style type="text/css">
  h3
  {
    color: blue;
  }
  .thead-dark
  {
    font-weight: bold;
    color: blue;
  }
  a.btn.btn-default
  {
	background-color: #a9a9a9;
  }
</style>
<div class="row">
    	<div class="col-md-6">
    		<form class="form-inline">
    			<div class="form-group">
    				<input type="text" class="form-control" name="search" placeholder="Tên bài đăng" value="{{ \Request::get('search') }}">
    			</div>

    			<div class="form-group">
    				<select class="form-control" name="status">
    							<option value="" {{ \Request::get('status') == "" ? "selected='selected'" : "" }}>
    								Tất cả
    							</option>
    							<option value="1" {{ \Request::get('status') == "1" ? "selected='selected'" : "" }}>
    								Đã applie
    							</option>
    							<option value="2" {{ \Request::get('status') == "2" ? "selected='selected'" : "" }}>
    								Từ chối
    							</option>
    				</select>
    			</div>
    			<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
    		</form>
    	</div>
    	<div class="col-md-6">
    		@if($order->isNotEmpty())
    		<a class="btn btn-primary" href="{{ route('export.applied') }}">Export thông tin</a>
    		@endif
    	</div>
</div>
@if($profileApplie)
<table class="table table-hover">
	<thead class="thead-dark">
		<tr>
			<th scope="col">Tên hồ sơ</th>
			<th scope="col">Vị trí nộp</th>
			<th scope="col">Bài tuyển dụng</th>
			<th scope="col">Thời gian nộp</th>
			<th scope="col">Thao tác</th>
		</tr>
	</thead>
	<tbody>
		@foreach($profileApplie as $applie)
		<tr>
			@if($applie->hoso->ge_active==1)
			<td><a href="{{ route('employer.detail.userprofile', [$applie->hoso->ge_slug, $applie->hoso->id]) }}">{{ $applie->hoso->ge_title }}</a></td>
			<td>{{ $applie->hoso->ge_profession }}</td>
			<td>{{ $applie->ap_title }}</td>
			<td>{{ date('d-m-Y',strtotime($applie->created_at)) }}</td>
			<td>
				@if($applie->ap_status==0)
				<a class="btn btn-success" href="{{ route('employer.applie.action', ['apply', $applie->id]) }}">
					<i class="fa fa-save" aria-hidden="true"></i> Xác nhận
				</a>
				<a class="btn btn-default" href="{{ route('employer.applie.action', ['cancel', $applie->id]) }}">
					<i class="fa fa-trash" aria-hidden="true"></i> Từ chối
				</a>
				@elseif($applie->ap_status==1)
				<a class="btn btn-success" href="#">
					<i class="fa fa-save" aria-hidden="true"></i> Đã apply
				</a>
				<a class="btn btn-danger" href="{{ route('employer.applie.action', ['delete', $applie->id]) }}">Xóa</a>
				@elseif($applie->ap_status==2)
				<a class="btn btn-default" href="#">
					<i class="fa fa-trash" aria-hidden="true"></i> Đã từ chối
				</a>
				<a class="btn btn-danger" href="{{ route('employer.applie.action', ['delete', $applie->id]) }}">Xóa</a>
				@endif
			</td>
		</tr>
		@endif
		@endforeach
	</tbody>
</table>
@endif
<script src="http://code.jquery.com/jquery.js"></script>
<script src="https://cdn.rawgit.com/hilios/jQuery.countdown/2.2.0/dist/jquery.countdown.min.js"></script>
<script>
	$('[data-countdown]').each(function() {
  var $this = $(this), finalDate = $(this).data('countdown');
  $this.countdown(finalDate, function(event) {
    $this.html(event.strftime('%D ngày %H:%M:%S'));
  });
});
</script>
@stop