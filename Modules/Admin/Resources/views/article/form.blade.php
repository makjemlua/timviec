<form action="" method="POST" id="editProfile" enctype="multipart/form-data">
	@csrf
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="col-md">
	          <input type="hidden" name="id" id="id" value="{{ old('id',isset($article->id) ? $article->id : '') }}">
	        </div>

			<div class="form-group">
				<label for="bo_title">Tên bài viết:</label>
				<input type="text" class="form-control" name="bo_title" value="{{ old('bo_title',isset($article->bo_title) ? $article->bo_title : '') }}" placeholder="Tên bài viết" required>
				@if ($errors->has('bo_title'))
				<div class="error">{{ $errors->first('bo_title') }}</div>
				@endif
			</div>
			<div class="form-group">
				<label for="bo_description">Mô tả:</label>
				<input type="text" class="form-control" name="bo_description" value="{{ old('bo_description',isset($article->bo_description) ? $article->bo_description : '') }}" placeholder="Mô tả" required></input>
				@if ($errors->has('bo_description'))
				<div class="error">{{ $errors->first('bo_description') }}</div>
				@endif
			</div>
			<div class="form-group">
				<label for="bo_content">Nội dung:</label>
				<textarea type="text" class="form-control" name="bo_content" id="bo_content" placeholder="Nội dung" required>{{ old('bo_content',isset($article->bo_content) ? $article->bo_content : '') }}</textarea>
				@if ($errors->has('bo_content'))
				<div class="error">{{ $errors->first('bo_content') }}</div>
				@endif
			</div>
			<div class="form-group">
				<img src="{{ old('bo_avatar',(isset($article->bo_avatar)) ? asset(pare_url_file($article->bo_avatar)) : asset('images/default.png') ) }}" alt="image" id="blah" width="100px" height="100px" required> Slug
			</div>
			<div class="form-group">
				<label for="name">Avatar:</label>
				<input type="file" name="avatar" id="imgInp" class="form-control">
				@if ($errors->has('avatar'))
				<div class="error">{{ $errors->first('avatar') }}</div>
				@endif
			</div>
			<div class="form-group">
				<input type="hidden" name="bo_active" value="0">
				<input type="checkbox" name="bo_active" {{ isset($article->bo_active)&&($article->bo_active)==1 ? 'checked' : '' }} value="1"> <label>Hiển thị</label>
			</div>
			<button type="submit" id="submit" class="btn btn-success">Lưu thông tin</button>
		</div>
	</div>
</form>
@section('script')
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
	CKEDITOR.replace('bo_content');
</script>

{{-- <script>
    $(document).ready(function() {
    	var id = $('#id').val();
	        $.ajaxSetup({
	            headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            }
	        });
	        if(id){
	        $('#editProfile').on('submit', function(e){
	            e.preventDefault();
	            $.ajax({
	                type: "POST",
	                url: "/timviec/public/admincp/article/update/" + id,
	                data: $(this).serialize(),
	                success: function (data) {
	                    alert("Cập nhập thành công");
	                },
	                error:function(error){
	                    console.log(error);
	                }
	            });
	        });
	    }else{
	    	$('#editProfile').on('submit', function(e){
	            e.preventDefault();

	            $.ajax({
	                type: "POST",
	                url: "/timviec/public/admincp/article/create",
	                data: $(this).serialize(),
	                success: function (data) {
	                    alert("Thêm mới thành công");
	                },
	                error:function(error){
	                    console.log(error);
	                }
	            });
	        });
	    }
	});
</script> --}}
@stop