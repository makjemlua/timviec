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
</style>
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
			<td><a href="{{ route('employer.detail.userprofile', [$applie->hoso->ge_slug, $applie->hoso->id]) }}">{{ $applie->hoso->ge_title }}</a></td>
			<td>{{ $applie->hoso->ge_profession }}</td>
			<td>{{ $applie->ap_title }}</td>
			<td>{{ date('d-m-Y',strtotime($applie->created_at)) }}</td>
			<td>
				@if($applie->ap_status==0)
				<a class="btn btn-success" href="{{ route('employer.applie.action', ['apply', $applie->id]) }}">
					<i class="fa fa-save" aria-hidden="true"></i> Xác nhận
				</a>
				<a class="btn btn-danger" href="{{ route('employer.applie.action', ['cancel', $applie->id]) }}">
					<i class="fa fa-trash" aria-hidden="true"></i> Từ chối
				</a>
				@elseif($applie->ap_status==1)
				<a class="btn btn-success" href="#">
					<i class="fa fa-save" aria-hidden="true"></i> Đã apply
				</a>
				@elseif($applie->ap_status==2)
				<a class="btn btn-danger" href="#">
					<i class="fa fa-trash" aria-hidden="true"></i> Đã từ chối
				</a>
				@endif
			</td>
		</tr>
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