@extends('layouts.app')
@section('content')
<style type="text/css">
  .commnetsfrm
  {
    padding: 0;
  }
  .commnetsfrm .btn
  {
    margin-top: 10px;
    font-size: 10px;
    padding: 8px 12px;
  }
</style>
<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Blog Detail</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#">Home</a> / <span>Post Name</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->
<div class="listpgWraper">
  <div class="container">

    <!-- Blog start -->
    <div class="row">
      <div class="col-md-8">
        <!-- Blog List start -->
        <div class="blogWraper">
          <div class="blogList blogdetailbox">
            <div class="postimg"><img src="{{ asset(pare_url_file($articleDetail->bo_avatar)) }}" alt="Blog Title">
            </div>
            <div class="post-header margin-top30">
              <h4><a href="#">{{ $articleDetail->bo_title }}</a></h4>
              <div class="postmeta">By : <span>{{ $articleDetail->admin->name }} </span> </div>
            </div>
            <p>
            	{!! $articleDetail->bo_content !!}
            </p>
          </div>
          <div class="comments margin-top30">
            <h4>Comments</h4>
            <ul class="media-list">
              <!-- COMMENTS -->


              @include('blogs.commentsDisplay')


            </ul>

            <!-- LEAVE COMMENTS -->
            <div class="commnetsfrm">
              <h4>Leave Your Comments</h4>
              <form action="{{ route('post.rating.article', $articleDetail) }}" method="GET">
                @csrf
                <ul class="row">
                  <li class="col-sm-12">
                    <label>
                      <textarea name="ra_content" class="form-control" placeholder="MESSAGE" required></textarea>
                    </label>
                  </li>
                  <li class="col-sm-12">
                    <button type="submit" class="btn margin-top-20">SEND</button>
                  </li>
                </ul>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <!-- Side Bar -->
        <div class="sidebar">
          <!-- Search -->
          <div class="widget">
            <h5 class="widget-title">Search</h5>
            <div class="search">
              <form>
                <input type="text" class="form-control" placeholder="Search">
                <button type="submit" class="btn"><i class="fa fa-search"></i></button>
              </form>
            </div>
          </div>
          <!-- Recent Posts -->
          <div class="widget">
            <h5 class="widget-title">Recent Posts</h5>
            <ul class="papu-post">
            	@if($articles)
            		@foreach($articles as $article)
		              <li>
		                <div class="media-left"> <a href="{{ route('get.detail.news', [$article->bo_slug, $article->id]) }}"><img src="{{ asset(pare_url_file($article->bo_avatar)) }}" alt="Blog Title"></a> </div>
		                <div class="media-body"> <a class="media-heading" href="{{ route('get.detail.news', [$article->bo_slug, $article->id]) }}">{{ $article->bo_title }}</a> <span>{{ date('d-m-Y',strtotime($article->created_at)) }}</span> </div>
		              </li>
	              @endforeach
              	@endif
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
  $("div.scrollable").scroll();
</script>
@stop