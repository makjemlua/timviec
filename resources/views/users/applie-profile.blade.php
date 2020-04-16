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
@if($applies)
<table class="table table-hover">
	<thead class="thead-dark">
		<tr>
			<th scope="col">Vị trí</th>
			<th scope="col">Công ty</th>
			<th scope="col">Thời gian</th>
			<th scope="col">Trạng thái</th>
			<th scope="col">Thao tác</th>
		</tr>
	</thead>
	<tbody>
		@foreach($applies as $applie)
		<tr>
			<td><a href="{{ route('employer.thongtin.profile', [$applie->profile->pr_slug, $applie->profile->id]) }}">{{ $applie->ap_title }}</a></td>
			<td>{{ $applie->ap_company }}</td>
			<td>{{ date('d-m-Y',strtotime($applie->created_at)) }}</td>
			<td>
				@if($applie->ap_status == 0)
					<p>Chưa duyệt</p>
				@elseif($applie->ap_status == 1)
					<p>Đã applie</p>
				@else
					<p>Đã từ chối</p>
				@endif
			</td>
			<td>
				<a href="{{ route('user.get.delete.applie', $applie->id) }}">
					<i class="fa fa-trash" aria-hidden="true"></i> Hủy
				</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endif
@stop