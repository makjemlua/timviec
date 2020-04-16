@extends('admin::layouts.master')

@section('content')
<div class="container-fluid">
	<nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.get.index.employer') }}">Nhà tuyển dụng</a></li>
        <li class="breadcrumb-item active" aria-current="page">Account</li>
      </ol>
    </nav>
    <div class="row">
    	<div class="col-md-4">
    		<form class="form-inline">
    			<div class="form-group">
    				<input type="text" class="form-control" name="search" placeholder="Tên" value="{{ \Request::get('search') }}">
    			</div>
    			<div class="form-group">
    				<select class="form-control" name="cate">
    					<option value="">Tất cả</option>
						<option value="01" {{ \Request::get('cate') == '01' ? "selected=selected" : "" }}>vip</option>
						<option value="00" {{ \Request::get('cate') == '00' ? "selected=selected" : "" }}>Normal</option>
    				</select>
    			</div>
				<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
    		</form>
    	</div>

    </div>
	<h2 class="page-header">Quản lý nhà tuyển dụng
	</h2>
<div class="table-responsive">
	<table class="table table-striped table-sm">
		<thead>
			<tr>
				<th>STT</th>
				<th>Tên</th>
				<th>email</th>
				<th>Phone</th>
				<th>Công ty</th>
				<th>Vip</th>
				<th>Time vip</th>
				<th>Trạng thái</th>
				<th>Thao tác</th>
			</tr>
		</thead>
		<tbody>
			@if(isset($employers))
			<span style="display: none">{{ $a=1 }}</span>
				@foreach($employers as $employer)
					<tr>
						<td><!-- STT -->
							<b>{{ $a++ }}</b>
						</td>
						<td><!-- Tên -->
							<b>{{ $employer->name }}</b>
						</td>
						<td>
							<p>{{ $employer->email }}</p>
						</td>
						<td>
							<p>{{ $employer->em_phone }}</p>
						</td>
						<td>
							<p>{{ $employer->em_company }}</p>
						</td>
						<td><!-- Trạng thái -->
							@if($employer->em_vip == 01)
								<span class="status--process">Vip</span>
							@elseif($employer->em_vip == 00)
								<span class="status-process">0</span>
							@endif
						</td>
						<td><!-- Time -->
							@if(strtotime($employer->em_timevip) > time())
								<div data-countdown="{{ date('Y/m/d H:i:s',strtotime($employer->em_timevip)) }}"></div>
							@elseif(!isset($employer->em_timevip))
								<p>0</p>
							@else
								<p>0</p>
							@endif
						</td>
						<td>
							<p class="btn btn-success">Public</p>
						</td>
						<td><!-- Thao tác -->
							<a class="thao-tac xoa btn btn-danger" href="" title="Khóa">
								<i class="fa fa-trash" aria-hidden="true"></i> Khóa
							</a>
						</td>
					</tr>
				@endforeach
			@endif
		</tbody>
	</table>
	{!! $employers->links() !!}
</div>
</div>
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
<script>
    $(function(){
        $('.orderby').change(function(){
            $("#form_order").submit();
        })
    })
</script>
@stop