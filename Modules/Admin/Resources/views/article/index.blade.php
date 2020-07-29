@extends('admin::layouts.master')
@section('content')
<style type="text/css">
	.content-1
	  {
	    text-overflow: ellipsis;
	    overflow: hidden;
	    -webkit-line-clamp: 4;
	    -webkit-box-orient: vertical;
	    display: -webkit-box;
	  }
</style>
<div class="container-fluid">
	<nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.get.list.article') }}">Bài viết</a></li>
        <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
      </ol>
    </nav>
    <div class="row">
    	<div class="col-md-12">
    		<form class="form-inline">
    			<div class="form-group">
    				<input type="text" class="form-control" name="search" placeholder="Tên bài viết" value="{{ \Request::get('search') }}">
    			</div>
				<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
    		</form>
    	</div>
    </div>
	<h2 class="page-header">Quản lý bài viết <a class="thao-tac them label label-primary float-right" href="{{ route('admin.get.create.article') }}" title="Thêm mới">
		<i class="fa fa-plus-square" aria-hidden="true"></i> Thêm mới</a>
	</h2>
<div class="table-responsive">
	<table class="table table-striped table-sm">
		<thead>
			<tr>
				<th>STT</th>
				<th>Tên bài viết</th>
				<th>Hình ảnh</th>
				<th>Mô tả</th>
				<th>Trạng thái</th>
				<th>Ngày tạo</th>
				<th>Thao tác</th>
			</tr>
		</thead>
		<tbody>
			@if(isset($articles))
			<span style="display: none">{{ $a=1 }}</span>
				@foreach($articles as $article)
				<div class="col-md">
		          <input type="hidden" name="id" id="id" value="{{ old('id',isset($article->id) ? $article->id : '') }}">
		        </div>
					<tr>
						<td><!-- STT -->
							<b>{{ $a++ }}</b>
						</td>
						<td style="width: 200px"><!-- Tên bài viết -->
							<b><a href="{{ route('get.detail.news', [$article->bo_slug, $article->id]) }}" target="_blank">{{ $article->bo_title }}</a></b>
						</td>
						<td>
							<img src="{{ asset(pare_url_file($article->bo_avatar)) }}" alt="image" width="120px" height="80px">
						</td>
						<td style="width: 400px"><!-- Mô tả -->
							<span class="content-1">{{ $article->bo_description }}</span>
						</td>
						<td><!-- Trạng thái -->
							<a href="{{ route('admin.get.action.article',['active', $article->id]) }}" class="btn {{ $article->getStatus($article->bo_active)['class'] }} status">{{ $article->getStatus($article->bo_active)['name'] }}</a>
						</td>
						<td><!-- Ngày tạo -->
							{{ $article->created_at }}
						</td>
						<td><!-- Thao tác -->
							<a class="thao-tac sua btn btn-primary" href="{{ route('admin.get.edit.article',$article->id) }}" title="Cập nhập">
								<i class="fa fa-pencil-square-o" aria-hidden="true"></i>Sửa
							</a>
							<a class="thao-tac xoa btn btn-danger" id="deleteItem" href="{{ route('admin.get.action.article',['delete', $article->id]) }}" title="Xóa">
								<i class="fa fa-trash" aria-hidden="true"></i>Xóa
							</a>
						</td>
					</tr>
				@endforeach
			@endif
		</tbody>
	</table>
	{!! $articles->links() !!}
</div>
</div>
@stop
@section('script')
<script type="text/javascript">
// $('.xoa').click(function (e) {
// 	e.preventDefault();
//   var id = $('#id').val();
//   var el = this;
//   var token = $("meta[name='csrf-token']").attr("content");
//   $.ajax({
//     url: "/timviec/public/admincp/article/delete/" + id,
//     type: 'GET',
//     data: {
//             _token: token,
//                 id: id
//         },
//     success: function(response){
//       $(el).closest( "tr" ).remove();
//       alert("Xóa thành công");
//     }
//   });
// });

// $('.status').click(function (e) {
// 	e.preventDefault();
//   var id = $('#id').val();
//   var el = this;
//   var token = $("meta[name='csrf-token']").attr("content");
//   $.ajax({
//     url: "/timviec/public/admincp/article/active/" + id,
//     type: 'GET',
//     data: {
//             _token: token,
//                 id: id
//         },
//     success: function(response){

// 	}
//   });
// });
</script>
@stop