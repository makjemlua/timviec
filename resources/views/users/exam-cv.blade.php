@extends('users.dashboard')
@section('content')
<style type="text/css">
	div.card-body
	{
		position: relative;
	}
	img {
		width: 230px;
		transition: all 1s ease;
		-webkit-transition: all 1s ease;
		-moz-transition: all 1s ease;
		-o-transition: all 1s ease;
	}

	img:hover {
	transform: scale(1.5,1.5);
	-webkit-transform: scale(1.5,1.5);
	-moz-transform: scale(1.5,1.5);
	-o-transform: scale(1.5,1.5);
	-ms-transform: scale(1.5,1.5);
	}
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