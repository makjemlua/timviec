@extends('users.dashboard')
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
@if($saveProfile)
<table class="table table-hover">
	<thead class="thead-dark">
		<tr>
			<th scope="col">Vị trí</th>
			<th scope="col">Công ty</th>
			<th scope="col">Hạn nộp</th>
			<th scope="col">Thời gian lưu</th>
			<th scope="col">Thao tác</th>
		</tr>
	</thead>
	<tbody>
		@foreach($saveProfile as $save)
		@if($save->profile->pr_active==1)
		<tr>
			<td><a href="{{ route('employer.thongtin.profile', [$save->profile->pr_slug, $save->profile->id]) }}">{{ $save->profile->pr_title }}</a></td>
			<td>{{ $save->usa_company }}</td>
			<td>{{ date('d-m-Y',strtotime($save->usa_expired_at)) }}</td>
			<td>{{ date('d-m-Y',strtotime($save->created_at)) }}</td>
			<td>
				<a class="btn btn-danger" href="{{ route('user.get.delete.save', $save->id) }}">
					<i class="fa fa-trash" aria-hidden="true"></i> Xóa
				</a>
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