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