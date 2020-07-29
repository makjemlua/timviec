@extends('admin::layouts.master')

@section('content')
<div class="container-fluid">
	<nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.get.index.employer') }}">Nhà tuyển dụng</a></li>
        <li class="breadcrumb-item active" aria-current="page">Hóa đơn</li>
      </ol>
    </nav>

	<h2 class="page-header">Quản lý hóa đơn
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
				<th>Tổng tiền</th>
				<th>Ngày đăng ký</th>
				<th>Trạng thái</th>
			</tr>
		</thead>
		<tbody>
			@if(isset($transactions))
			<span style="display: none">{{ $a=1 }}</span>
				@foreach($transactions as $transaction)
					<tr>
						<td><!-- STT -->
							<b>{{ $a++ }}</b>
						</td>
						<td><!-- Tên -->
							<b>{{ $transaction->employer->name }}</b>
						</td>
						<td>
							<p>{{ $transaction->employer->email }}</p>
						</td>
						<td>
							<p>{{ $transaction->employer->em_phone }}</p>
						</td>
						<td>
							<p>{{ $transaction->employer->em_company }}</p>
						</td>
						<td>
							<p>{{ $transaction->tr_total }}</p>
						</td>
						<td>
							<p>{{ $transaction->created_at }}</p>
						</td>
						<td>
							@if($transaction->tr_status == 1)
								<a href="" class="btn btn-success">Đã xử lý</a>
							@elseif($transaction->tr_status == 0)
								<a href="{{ route('admin.get.active.transaction', $transaction->id) }}" class="btn btn-danger" onclick="return confirm('Bạn có muốn thực hiện thao tác này ? Nhấn OK để xử lý');">Chưa xử lý</a>
							@endif
						</td>
					</tr>
				@endforeach
			@endif
		</tbody>
	</table>
	{!! $transactions->links() !!}
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