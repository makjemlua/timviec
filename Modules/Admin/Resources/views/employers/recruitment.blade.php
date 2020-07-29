@extends('admin::layouts.master')
<style type="text/css">
	s
	{
		color: red;
		font-size: 14px;
	}
</style>
@section('content')
<div class="container-fluid">
	<nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.get.index.employer') }}">Nhà tuyển dụng</a></li>
        <li class="breadcrumb-item active" aria-current="page">Bài đăng</li>
      </ol>
    </nav>
    <div class="row">
    	<div class="col-md-10">
    		<form class="form-inline">
    			<div class="form-group">
    				<input type="text" class="form-control" name="search" placeholder="Tên bài đăng" value="{{ \Request::get('search') }}">
    			</div>
    			<div class="form-group">
    				<select class="form-control" name="cate">
    					@if(isset($jobs))
    					<option value="">Tất cả - Nghề nghiệp</option>
    						@foreach($jobs as $job)
    							<option value="{{ $job->name }}" {{ \Request::get('cate') == $job->name ? "selected='selected'" : "" }}>{{ $job->name }}</option>
    						@endforeach
    					@endif
    				</select>
    			</div>

    			<div class="form-group">
    				<select class="form-control" name="province">
    					@if(isset($provinces))
    					<option value="">Tất cả - Địa điểm</option>
    						@foreach($provinces as $province)
    							<option value="{{ $province->name }}" {{ \Request::get('province') == $province->name ? "selected='selected'" : "" }}>{{ $province->name }}</option>
    						@endforeach
    					@endif
    				</select>
    			</div>

    			<div class="form-group">
    				<select class="form-control" name="active">
    							<option value="" {{ \Request::get('active') == "" ? "selected='selected'" : "" }}>
    								Tất cả - Duyệt bài
    							</option>
    							<option value="1" {{ \Request::get('active') == "1" ? "selected='selected'" : "" }}>
    								Duyệt
    							</option>
    							<option value="00" {{ \Request::get('active') == "00" ? "selected='selected'" : "" }}>
    								Chưa duyệt
    							</option>
    				</select>
    			</div>

    			{{-- <div class="form-group">
    				<select class="form-control" name="province">
    					<option value="">Tất cả - Duyệt bài</option>
    						@foreach($provinces as $province)
    							<option value="{{ $province->name }}" {{ \Request::get('province') == $province->name ? "selected='selected'" : "" }}>{{ $province->name }}</option>
    						@endforeach
    				</select>
    			</div> --}}
				<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
    		</form>
    	</div>
    	<div class="col-md-2">
			<form class="form-inline" id="form_order" method="GET">
                <div class="form-group">
                    <select class="orderby form-control" name="orderby">
                        <option {{ Request::get('orderby') == "name_a" || !Request::get('orderby') ? "selected='selected'" : "" }} value="name_a">Tên (A - Z)</option>
                        <option {{ Request::get('orderby') == "name_z" ? "selected='selected'" : "" }} value="name_z">Tên (Z - A)</option>
                        <option {{ Request::get('orderby') == "date_desc" ? "selected='selected'" : "" }} value="date_desc">Ngày (Cũ - Mới)</option>
                        <option {{ Request::get('orderby') == "date_asc" ? "selected='selected'" : "" }} value="date_asc">Ngày (Mới - Cũ)</option>
                    </select>
                </div>
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
				<th>Tên bài tuyển dụng</th>
				<th>Vị trí</th>
				<th>Thời hạn</th>
				<th>Tên người đăng</th>
				<th>Công ty</th>
				<th>Địa chỉ</th>
				<th>Vip</th>
				<th>Time vip</th>
				<th>Trạng thái</th>
				<th>Thao tác</th>
			</tr>
		</thead>
		<tbody>
			@if(isset($employerProfiles))
			<span style="display: none">{{ $a=1 }}</span>
				@foreach($employerProfiles as $employerProfile)
					<tr>
						<td><!-- STT -->
							<b>{{ $a++ }}</b>
						</td>
						<td><!-- Tên -->
							<b>{{ $employerProfile->pr_title }}</b>
						</td>
						<td>
							<p>{{ $employerProfile->pr_career }}</p>
						</td>
						<td>
							@if(strtotime($employerProfile->pr_expired_at) > time())
								<p>{{ $employerProfile->pr_expired_at }}</p>
							@else
								<s>{{ $employerProfile->pr_expired_at }}</s>
							@endif
						</td>
						<td>
							<p>{{ $employerProfile->employer->name }}</p>
						</td>
						<td>
							<p>{{ $employerProfile->employer->em_company }}</p>
						</td>
						<td>
							<p>{{ $employerProfile->pr_provinces }}</p>
						</td>
						<td><!-- Trạng thái -->
							@if($employerProfile->employer->em_vip == 01)
								<span class="status--process">Vip</span>
							@else
								<span class="status-process">0</span>
							@endif
						</td>
						<td><!-- Time -->
							@if(strtotime($employerProfile->employer->em_timevip) > time())
								<div data-countdown="{{ date('Y/m/d H:i:s',strtotime($employerProfile->employer->em_timevip)) }}"></div>
							@elseif(!isset($employerProfile->employer->em_timevip))
								<p>0</p>
							@else
								<p>0</p>
							@endif
						</td>
						<td>
							<a href="{{ route('action.employer.profile',['active', $employerProfile->id]) }}" class="btn {{ $employerProfile->getActive($employerProfile->pr_active)['class'] }}">{{ $employerProfile->getActive($employerProfile->pr_active)['name'] }}</a>
						</td>
						<td><!-- Thao tác -->
							<a class="btn btn-primary" href="{{ route('admin.get.detail.profile.employer', [$employerProfile->id]) }}">
								Xem
							</a>
						</td>
					</tr>
				@endforeach
			@endif
		</tbody>
	</table>
	{!! $employerProfiles->links() !!}
</div>
</div>
<script src="{{ asset('js/jquery.js') }}"></script>
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