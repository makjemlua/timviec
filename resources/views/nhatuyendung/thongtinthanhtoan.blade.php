@extends('nhatuyendung.dashboard')
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
<h3 class="title font-roboto text-primary">
	<span class="text">Hóa đơn thanh toán</span>
</h3>
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
							<a class="btn btn-success" href="#">Đã thanh toán</a>
						</td>
					</tr>
				@endforeach
			@endif
		</tbody>
	</table>
	{!! $transactions->links() !!}
</div>
@stop