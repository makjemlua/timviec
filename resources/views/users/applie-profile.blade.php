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
		@if($applie->profile->pr_active==1 && $applie->profile->pr_status==1)
		<tr>
			<td><a href="{{ route('employer.thongtin.profile', [$applie->profile->pr_slug, $applie->profile->id]) }}">{{ $applie->ap_title }}</a></td>
			<td>{{ $applie->ap_company }}</td>
			<td>{{ date('d-m-Y',strtotime($applie->created_at)) }}</td>
			<td>
				@if($applie->ap_status == 0)
					<a class="btn btn-default" href="#">
						<i class="fa fa-save" aria-hidden="true"></i> Chưa duyệt
					</a>
				@elseif($applie->ap_status == 1)
					<button type="button" class="btn btn-info" data-toggle="modal" data-target=".modal.fade">Đã apply</button>
				@else
					<a class="btn btn-danger" href="#">
						<i class="fa fa-trash" aria-hidden="true"></i> Đã từ chối
					</a>
				@endif
			</td>
			<td>
				@if($applie->ap_status == 0)
				<a class="btn btn-danger" href="{{ route('user.get.delete.applie', $applie->id) }}">
					<i class="fa fa-trash" aria-hidden="true"></i> Hủy
				</a>
				@endif
			</td>
		</tr>
		@endif
		@endforeach
	</tbody>
</table>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">

	  <!-- Modal content-->
	  <div class="modal-content">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <h4 class="modal-title">Chào bạn {{ $applie->user->name }}</h4>
	    </div>
	    <div class="modal-body">
	      <p>Cảm ơn bạn đã nộp hồ sơ ứng tuyển, chúng tôi sẽ liên hệ với bạn trong thời gian ngắn nhất. Thanks !</p>
	    </div>
	    <div class="modal-footer">
	      <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
	    </div>
	  </div>

	</div>
</div>
@endif
@stop