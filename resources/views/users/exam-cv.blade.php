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
<div class="row">
	<div class="col-md-4">
		<div class="card-body">
			<img src="http://dummyimage.com/800x600/4d494d/686a82.gif&text=placeholder+image" alt="placeholder+image">
			<a class="label label-primary" href="">Download</a>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card-body">
			<img src="http://dummyimage.com/800x600/4d494d/686a82.gif&text=placeholder+image" alt="placeholder+image">
			<a class="label label-primary" href="">Download</a>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card-body">
			<img src="http://dummyimage.com/800x600/4d494d/686a82.gif&text=placeholder+image" alt="placeholder+image">
			<a class="label label-primary" href="">Download</a>
		</div>
	</div>
</div>
@stop