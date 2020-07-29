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
        <li class="breadcrumb-item"><a href="{{ route('admin.get.index.user') }}">User</a></li>
        <li class="breadcrumb-item active" aria-current="page">Hồ sơ</li>
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
	<h2 class="page-header">Quản lý user
	</h2>
<div class="table-responsive">
	<table class="table table-striped table-sm">
		<thead>
			<tr>
				<th>STT</th>
				<th>Tên hồ sơ</th>
				<th>Vị trí</th>
				<th>Tên người đăng</th>
				<th>Email</th>
				<th>Địa chỉ</th>
				<th>Trạng thái</th>
				<th>Thao tác</th>
			</tr>
		</thead>
		<tbody>
			@if(isset($userProfiles))
			<span style="display: none">{{ $a=1 }}</span>
				@foreach($userProfiles as $profile)
					<tr>
						<td><!-- STT -->
							<b>{{ $a++ }}</b>
						</td>
						<td><!-- Tên -->
							<b>{{ $profile->ge_title }}</b>
						</td>
						<td>
							<p>{{ $profile->ge_profession }}</p>
						</td>
						<td>
							<p>{{ $profile->user->name }}</p>
						</td>
						<td>
							<p>{{ $profile->user->email }}</p>
						</td>
						<td>
							<p>{{ $profile->ge_provinces }}</p>
						</td>
						<td>
							<a href="#" class="btn {{ $profile->getStatus($profile->ge_status)['class'] }}">{{ $profile->getStatus($profile->ge_status)['name'] }}</a>
						</td>
						<td><!-- Thao tác -->
							<a href="{{ route('action.user.profile',['active', $profile->id]) }}" class="btn {{ $profile->getActive($profile->ge_active)['class'] }}">{{ $profile->getActive($profile->ge_active)['name'] }}</a>
							<a href="{{ route('admin.get.detail.profile.user',[$profile->id]) }}" class="btn btn-primary">Xem</a>
						</td>
					</tr>
				@endforeach
			@endif
		</tbody>
	</table>
	{!! $userProfiles->links() !!}
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