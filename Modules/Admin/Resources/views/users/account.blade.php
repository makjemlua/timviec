@extends('admin::layouts.master')

@section('content')
<div class="container-fluid">
	<nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.get.index.user') }}">User</a></li>
        <li class="breadcrumb-item active" aria-current="page">Account</li>
      </ol>
    </nav>
    <div class="row">
    	<div class="col-md-4">
    		<form class="form-inline">
    			<div class="form-group">
    				<input type="text" class="form-control" name="search" placeholder="Tên" value="{{ \Request::get('search') }}">
    			</div>
				<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
    		</form>
    	</div>

    </div>

    <div class="row">
	  <div class="col-md-6">
	    <a href ="{{ route('export.user') }}" class="btn btn-info export pull-right" id="export-button"> Export User </a>
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
				<th>Birthday</th>
				<th>Giới tính</th>
				<th>Địa chỉ</th>
				<th>Avatar</th>
				<th>Provider</th>
				<th>Trạng thái</th>
				{{-- <th>Thao tác</th> --}}
			</tr>
		</thead>
		<tbody>
			@if(isset($users))
			<span style="display: none">{{ $a=1 }}</span>
				@foreach($users as $user)
					<tr>
						<td><!-- STT -->
							<b>{{ $a++ }}</b>
						</td>
						<td><!-- Tên -->
							<b>{{ $user->name }}</b>
						</td>
						<td>
							<p>{{ $user->email }}</p>
						</td>
						<td>
							<p>{{ $user->phone }}</p>
						</td>
						<td>
							<p>{{ $user->birthday }}</p>
						</td>
						<td>
							<p>{{ $user->gender }}</p>
						</td>
						<td>
							<p>{{ $user->address }}</p>
						</td>
						<td>
							@if($user->provider)
					            <img id="blah" src="{{ old('avatar',(isset($user->avatar)) ? asset($user->avatar) : asset('images/default.png') ) }}" alt="" class="userimg card-img-top" style="width: 60px;height: 50px">
					        @else
					          <img src="{{ old('avatar', (isset($user->avatar) ? asset(pare_url_file($user->avatar)) : asset('images/default.png') ) ) }}" alt="" class="userimg card-img-top" style="width: 60px;height: 50px">
					        @endif
						</td>
						<td>
							<p>{{ $user->provider }}</p>
						</td>
						<td>
							<a href="{{ route('action.user.account',['active', $user->id]) }}" class="btn {{ $user->getStatus($user->active)['class'] }}">{{ $user->getStatus($user->active)['name'] }}</a>
						</td>
						<td><!-- Thao tác -->
							{{-- <a class="btn btn-primary" href="{{ route('admin.get.detail.account.user', [$user->id]) }}" title="Xem">
								<i class="fa fa-eye" aria-hidden="true"></i> Xem
							</a> --}}
						</td>
					</tr>
				@endforeach
			@endif
		</tbody>
	</table>
	{!! $users->links() !!}
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