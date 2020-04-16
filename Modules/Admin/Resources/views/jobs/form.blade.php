<form action="" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="row">
		<div class="col-md-4 col-md-offset-2">
			<div class="form-group">
				<label for="name">Tên job:</label>
				<input type="text" class="form-control" name="name" value="{{ old('name',isset($job->name) ? $job->name : '') }}" placeholder="Tên job">
				@if ($errors->has('name'))
				<div class="error">{{ $errors->first('name') }}</div>
				@endif
			</div>
			<button type="submit" class="btn btn-success">Lưu thông tin</button>
		</div>
	</div>
</form>
@section('script')
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
	CKEDITOR.replace('bo_content');
</script>
@stop