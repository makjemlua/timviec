@extends('layouts.app')
@section('content')
@php
  $page = "blogs";
@endphp
<style type="text/css">
  span.content-1
    {
      text-overflow: ellipsis;
      overflow: hidden;
      -webkit-line-clamp: 4;
      -webkit-box-orient: vertical;
      display: -webkit-box;
    }
</style>
<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Góc nghề nghiệp</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="{{ route('home.index') }}">Trang chủ</a> / <span>Góc nghề nghiệp</span></div>
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
          <ul class="blogList">
            @if($articles)
              @foreach($articles as $article)
                <li>
                  <div class="row">
                    <div class="col-md-5">
                      <div class="postimg"><img src="{{ asset(pare_url_file($article->bo_avatar)) }}" alt="Blog Title">
                      </div>
                    </div>
                    <div class="col-md-7">
                      <div class="post-header">
                        <h4><a href="{{ route('get.detail.news', [$article->bo_slug, $article->id]) }}">{{ $article->bo_title }}</a></h4>
                        <div class="postmeta">By : <span>{{ $article->admin->name }} </span> </div>
                      </div>
                      <span class="content-1">{{ $article->bo_description }}</span>
                      <a href="{{ route('get.detail.news', [$article->bo_slug, $article->id]) }}" class="readmore">Đọc thêm</a> </div>
                  </div>
                </li>
              @endforeach
            @endif
          </ul>
        </div>

        <!-- Pagination -->
        <div class="pagiWrap">
          <div class="row">
            <div class="col-md-4 col-sm-6">
              <div class="showreslt">Hiển thị 1-3</div>
            </div>
            <div class="col-md-8 col-sm-6 text-right">
              {!! $articles->links() !!}
            </div>
          </div>
        </div>
      </div>
      {{-- <div class="col-md-4">
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
              <li>
                <div class="media-left"> <a href="#"><img src="images/blog/1.jpg" alt="Blog Title"></a> </div>
                <div class="media-body"> <a class="media-heading" href="#">Integer vel magna urna. Vestibulum id nisi</a> <span>Dec 18, 2016</span> </div>
              </li>
              <li>
                <div class="media-left"> <a href="#"><img src="images/blog/2.jpg" alt="Blog Title"></a> </div>
                <div class="media-body"> <a class="media-heading" href="#">Integer vel magna urna. Vestibulum id nisi</a> <span>Dec 18, 2016</span> </div>
              </li>
              <li>
                <div class="media-left"> <a href="#"><img src="images/blog/3.jpg" alt="Blog Title"></a> </div>
                <div class="media-body"> <a class="media-heading" href="#">Integer vel magna urna. Vestibulum id nisi</a> <span>Dec 18, 2016</span> </div>
              </li>
              <li>
                <div class="media-left"> <a href="#"><img src="images/blog/4.jpg" alt="Blog Title"></a> </div>
                <div class="media-body"> <a class="media-heading" href="#">Integer vel magna urna. Vestibulum id nisi</a> <span>Dec 18, 2016</span> </div>
              </li>
            </ul>
          </div>
        </div>
      </div> --}}
    </div>
  </div>
</div>
@stop