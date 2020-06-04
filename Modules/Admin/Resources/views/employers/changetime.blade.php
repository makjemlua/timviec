
@extends('admin::layouts.master')

@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<div class="container-fluid">
	<nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.get.index.employer') }}">Nhà tuyển dụng</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.get.account.employer') }}">Account</a></li>
        <li class="breadcrumb-item active" aria-current="page">Time vip</li>
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
	<form action="" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="row">
		<div class="col-md-4 col-md-offset-2">
			<div class="form-group">
				<label for="name">
					@if(strtotime($employer->em_timevip) > time())
						<div data-countdown="{{ date('Y/m/d H:i:s',strtotime($employer->em_timevip)) }}"></div>
					@elseif(!isset($employer->em_timevip))
						<p>0</p>
					@else
						<p>0</p>
					@endif
				</label>
				<input type="text" class="form-control" id="datepicker" name="em_timevip" autocomplete="off">
			</div>

			<button type="submit" class="btn btn-success">Lưu thông tin</button>

		</div>
	</div>
</form>
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
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
	$(function(){
	    $("#datepicker").datepicker({
	    	dateFormat: "yy-mm-dd",
	    	minDate: 0,
	    	maxDate: "+30D"
	    });
	});
</script>
@stop