@extends('layouts.app')
@section('content')
<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Blog</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="{{ route('home.index') }}">Home</a> / <span>Blog</span></div>
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
            <li>
              <div class="row">
                <div class="col-md-5">
                  <div class="postimg"><img src="images/blog/1.jpg" alt="Blog Title">
                    <div class="date"> 17 SEP</div>
                  </div>
                </div>
                <div class="col-md-7">
                  <div class="post-header">
                    <h4><a href="{{ route('home.index') }}">Duis ultricies aliquet mauris</a></h4>
                    <div class="postmeta">By : <span>Luck Walker </span> Category : <a href="{{ route('home.index') }}">Movers, Shifting, Packers </a></div>
                  </div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eu nulla eget nisl dapibus finibus. Maecenas quis sem vel neque rhoncus dignissim. Ut et eros rhoncus...</p>
                  <a href="{{ route('home.index') }}" class="readmore">Read More</a> </div>
              </div>
            </li>
            <li>
              <div class="row">
                <div class="col-md-5">
                  <div class="postimg"><img src="images/blog/2.jpg" alt="Blog Title">
                    <div class="date"> 17 SEP</div>
                  </div>
                </div>
                <div class="col-md-7">
                  <div class="post-header">
                    <h4><a href="{{ route('home.index') }}">Duis ultricies aliquet mauris</a></h4>
                    <div class="postmeta">By : <span>Luck Walker </span> Category : <a href="{{ route('home.index') }}">Movers, Shifting, Packers </a></div>
                  </div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eu nulla eget nisl dapibus finibus. Maecenas quis sem vel neque rhoncus dignissim. Ut et eros rhoncus...</p>
                  <a href="{{ route('home.index') }}" class="readmore">Read More</a> </div>
              </div>
            </li>
            <li>
              <div class="row">
                <div class="col-md-5">
                  <div class="postimg"><img src="images/blog/3.jpg" alt="Blog Title">
                    <div class="date"> 17 SEP</div>
                  </div>
                </div>
                <div class="col-md-7">
                  <div class="post-header">
                    <h4><a href="{{ route('home.index') }}">Duis ultricies aliquet mauris</a></h4>
                    <div class="postmeta">By : <span>Luck Walker </span> Category : <a href="{{ route('home.index') }}">Movers, Shifting, Packers </a></div>
                  </div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eu nulla eget nisl dapibus finibus. Maecenas quis sem vel neque rhoncus dignissim. Ut et eros rhoncus...</p>
                  <a href="{{ route('home.index') }}" class="readmore">Read More</a> </div>
              </div>
            </li>
            <li>
              <div class="row">
                <div class="col-md-5">
                  <div class="postimg"><img src="images/blog/4.jpg" alt="Blog Title">
                    <div class="date"> 17 SEP</div>
                  </div>
                </div>
                <div class="col-md-7">
                  <div class="post-header">
                    <h4><a href="{{ route('home.index') }}">Duis ultricies aliquet mauris</a></h4>
                    <div class="postmeta">By : <span>Luck Walker </span> Category : <a href="{{ route('home.index') }}">Movers, Shifting, Packers </a></div>
                  </div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eu nulla eget nisl dapibus finibus. Maecenas quis sem vel neque rhoncus dignissim. Ut et eros rhoncus...</p>
                  <a href="{{ route('home.index') }}" class="readmore">Read More</a> </div>
              </div>
            </li>
            <li>
              <div class="row">
                <div class="col-md-5">
                  <div class="postimg"><img src="images/blog/1.jpg" alt="Blog Title">
                    <div class="date"> 17 SEP</div>
                  </div>
                </div>
                <div class="col-md-7">
                  <div class="post-header">
                    <h4><a href="{{ route('home.index') }}">Duis ultricies aliquet mauris</a></h4>
                    <div class="postmeta">By : <span>Luck Walker </span> Category : <a href="{{ route('home.index') }}">Movers, Shifting, Packers </a></div>
                  </div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eu nulla eget nisl dapibus finibus. Maecenas quis sem vel neque rhoncus dignissim. Ut et eros rhoncus...</p>
                  <a href="{{ route('home.index') }}" class="readmore">Read More</a> </div>
              </div>
            </li>
            <li>
              <div class="row">
                <div class="col-md-5">
                  <div class="postimg"><img src="images/blog/2.jpg" alt="Blog Title">
                    <div class="date"> 17 SEP</div>
                  </div>
                </div>
                <div class="col-md-7">
                  <div class="post-header">
                    <h4><a href="{{ route('home.index') }}">Duis ultricies aliquet mauris</a></h4>
                    <div class="postmeta">By : <span>Luck Walker </span> Category : <a href="{{ route('home.index') }}">Movers, Shifting, Packers </a></div>
                  </div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eu nulla eget nisl dapibus finibus. Maecenas quis sem vel neque rhoncus dignissim. Ut et eros rhoncus...</p>
                  <a href="{{ route('home.index') }}" class="readmore">Read More</a> </div>
              </div>
            </li>
            <li>
              <div class="row">
                <div class="col-md-5">
                  <div class="postimg"><img src="images/blog/3.jpg" alt="Blog Title">
                    <div class="date"> 17 SEP</div>
                  </div>
                </div>
                <div class="col-md-7">
                  <div class="post-header">
                    <h4><a href="{{ route('home.index') }}">Duis ultricies aliquet mauris</a></h4>
                    <div class="postmeta">By : <span>Luck Walker </span> Category : <a href="{{ route('home.index') }}">Movers, Shifting, Packers </a></div>
                  </div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eu nulla eget nisl dapibus finibus. Maecenas quis sem vel neque rhoncus dignissim. Ut et eros rhoncus...</p>
                  <a href="{{ route('home.index') }}" class="readmore">Read More</a> </div>
              </div>
            </li>
            <li>
              <div class="row">
                <div class="col-md-5">
                  <div class="postimg"><img src="images/blog/4.jpg" alt="Blog Title">
                    <div class="date"> 17 SEP</div>
                  </div>
                </div>
                <div class="col-md-7">
                  <div class="post-header">
                    <h4><a href="{{ route('home.index') }}">Duis ultricies aliquet mauris</a></h4>
                    <div class="postmeta">By : <span>Luck Walker </span> Category : <a href="{{ route('home.index') }}">Movers, Shifting, Packers </a></div>
                  </div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eu nulla eget nisl dapibus finibus. Maecenas quis sem vel neque rhoncus dignissim. Ut et eros rhoncus...</p>
                  <a href="{{ route('home.index') }}" class="readmore">Read More</a> </div>
              </div>
            </li>
          </ul>
        </div>

        <!-- Pagination -->
        <div class="pagiWrap">
          <div class="row">
            <div class="col-md-4 col-sm-6">
              <div class="showreslt">Showing 1-10</div>
            </div>
            <div class="col-md-8 col-sm-6 text-right">
              <ul class="pagination">
                <li class="active"><a href="{{ route('home.index') }}">1</a></li>
                <li><a href="{{ route('home.index') }}">2</a></li>
                <li><a href="{{ route('home.index') }}">3</a></li>
                <li><a href="{{ route('home.index') }}">4</a></li>
                <li><a href="{{ route('home.index') }}">5</a></li>
                <li><a href="{{ route('home.index') }}">6</a></li>
                <li><a href="{{ route('home.index') }}">7</a></li>
                <li><a href="{{ route('home.index') }}">8</a></li>
              </ul>
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
          <!-- Categories -->
          <div class="widget">
            <h5 class="widget-title">Categories</h5>
            <ul class="categories">
              <li><a href="{{ route('home.index') }}">Popular posts</a></li>
              <li><a href="{{ route('home.index') }}">Productivity</a></li>
              <li><a href="{{ route('home.index') }}">Resumes</a></li>
              <li><a href="{{ route('home.index') }}">Women</a></li>
              <li><a href="{{ route('home.index') }}">Top Companies</a></li>
              <li><a href="{{ route('home.index') }}">Popular posts</a></li>
              <li><a href="{{ route('home.index') }}">Productivity</a></li>
              <li><a href="{{ route('home.index') }}">Resumes</a></li>
            </ul>
          </div>
          <!-- Recent Posts -->
          <div class="widget">
            <h5 class="widget-title">Recent Posts</h5>
            <ul class="papu-post">
              <li>
                <div class="media-left"> <a href="{{ route('home.index') }}"><img src="images/blog/1.jpg" alt="Blog Title"></a> </div>
                <div class="media-body"> <a class="media-heading" href="https://www.sharjeelanjum.com/html/jobs-portal/demo/blog.html#">Integer vel magna urna. Vestibulum id nisi</a> <span>Dec 18, 2016</span> </div>
              </li>
              <li>
                <div class="media-left"> <a href="{{ route('home.index') }}"><img src="images/blog/2.jpg" alt="Blog Title"></a> </div>
                <div class="media-body"> <a class="media-heading" href="https://www.sharjeelanjum.com/html/jobs-portal/demo/blog.html#">Integer vel magna urna. Vestibulum id nisi</a> <span>Dec 18, 2016</span> </div>
              </li>
              <li>
                <div class="media-left"> <a href="{{ route('home.index') }}"><img src="images/blog/3.jpg" alt="Blog Title"></a> </div>
                <div class="media-body"> <a class="media-heading" href="https://www.sharjeelanjum.com/html/jobs-portal/demo/blog.html#">Integer vel magna urna. Vestibulum id nisi</a> <span>Dec 18, 2016</span> </div>
              </li>
              <li>
                <div class="media-left"> <a href="{{ route('home.index') }}"><img src="images/blog/4.jpg" alt="Blog Title"></a> </div>
                <div class="media-body"> <a class="media-heading" href="https://www.sharjeelanjum.com/html/jobs-portal/demo/blog.html#">Integer vel magna urna. Vestibulum id nisi</a> <span>Dec 18, 2016</span> </div>
              </li>
            </ul>
          </div>
          <!-- Archives Posts -->
          <div class="widget">
            <h5 class="widget-title">Archives</h5>
            <ul class="archive">
              <li><a href="{{ route('home.index') }}">June 2015<span>10</span></a></li>
              <li><a href="{{ route('home.index') }}">May 2015<span>21</span></a></li>
              <li><a href="{{ route('home.index') }}">April2015 <span>58</span></a></li>
              <li><a href="{{ route('home.index') }}">March 2015 <span>25</span></a></li>
            </ul>
          </div>
          <!-- Photos -->
          <div class="widget">
            <h5 class="widget-title">Photos Streem</h5>
            <ul class="photo-steam">
              <li><a href="{{ route('home.index') }}"><img src="images/blog/1.jpg" alt=""></a></li>
              <li><a href="{{ route('home.index') }}"><img src="images/blog/2.jpg" alt=""></a></li>
              <li><a href="{{ route('home.index') }}"><img src="images/blog/3.jpg" alt=""></a></li>
              <li><a href="{{ route('home.index') }}"><img src="images/blog/4.jpg" alt=""></a></li>
              <li><a href="{{ route('home.index') }}"><img src="images/blog/4.jpg" alt=""></a></li>
              <li><a href="{{ route('home.index') }}"><img src="images/blog/3.jpg" alt=""></a></li>
              <li><a href="{{ route('home.index') }}"><img src="images/blog/2.jpg" alt=""></a></li>
              <li><a href="{{ route('home.index') }}"><img src="images/blog/1.jpg" alt=""></a></li>
            </ul>
          </div>
          <!-- Tags -->
          <div class="widget">
            <h5 class="widget-title">Tags</h5>
            <ul class="tags">
              <li><a href="{{ route('home.index') }}">Amazing </a></li>
              <li><a href="{{ route('home.index') }}">Envato </a></li>
              <li><a href="{{ route('home.index') }}">Themes </a></li>
              <li><a href="{{ route('home.index') }}">Responsiveness </a></li>
              <li><a href="{{ route('home.index') }}">Developer </a></li>
              <li><a href="{{ route('home.index') }}">Mobile </a></li>
              <li><a href="{{ route('home.index') }}">IOS </a></li>
              <li><a href="{{ route('home.index') }}">Design </a></li>
              <li><a href="{{ route('home.index') }}">Jobs </a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop