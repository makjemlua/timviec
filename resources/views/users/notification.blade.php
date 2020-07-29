@extends('users.dashboard')
@section('content')
<style type="text/css">
	div.label.label-primary
	{
		padding: 10px 10px;
		position: absolute;
		margin-top: 50px;

	}
</style>
<h3 class="title font-roboto text-primary">
	<span class="text">Thông báo</span>
</h3>
<div class="row">
	@if($notifi)
	<?php $a = 1?>
		@foreach($notifi as $noti)
			<div class="form-group">
				<span style="font-weight: bold;">{{ $a++ }} {{ $noti->no_content }}</span>
			</div>
		@endforeach
	@endif
</div>
@stop