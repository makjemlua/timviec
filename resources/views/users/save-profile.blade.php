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
			<th scope="col">Thời gian lưu</th>
		</tr>
	</thead>
	<tbody>
		@foreach($saveProfile as $save)
		<tr>
			<td><a href="{{ route('employer.thongtin.profile', [$save->profile->pr_slug, $save->profile->id]) }}">{{ $save->usa_title }}</a></td>
			<td>{{ $save->usa_company }}</td>
			<td>{{ date('d-m-Y',strtotime($save->created_at)) }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endif
@stop