@extends('layouts.app')
@section('content')
<style type="text/css">
  a.content-1
  {
    text-overflow: ellipsis;
    overflow: hidden;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    display: -webkit-box;
  }
  input.btn
  {
    font-weight: bold;
  }
  input.btn:hover
  {
    color: white;
    background-color: blue;
  }
  .jobslist li
  {
    margin-top: 0;
  }
</style>
<!-- Search start -->

<form>
  <div class="searchwrap">
    <div class="container">
      <h3>Tìm kiếm hàng ngàn công việc <span>Bắt đầu thôi.</span></h3>
      <div class="searchbar row">
        <div class="col-md-5">
          <input type="text" class="form-control" name="search" id="search" value="{{ \Request::get('search') }}" placeholder="Nhập từ khóa cần tìm">
        </div>
        <div class="col-md-3">
          <select class="form-control" name="job">
            <option value="">Tất cả ngành nghề</option>
            @if(isset($jobs))
              @foreach($jobs as $job)
                <option value="{{ $job->name }}" {{ \Request::get('job') == $job->name ? "selected='selected'" : "" }}>{{ $job->name }}</option>
              @endforeach
            @endif
          </select>
        </div>
        <div class="col-md-2">
          <select class="form-control" name="province">
            <option value="">Tất cả tỉnh thành</option>
            @if(isset($provinces))
              @foreach($provinces as $province)
                <option value="{{ $province->name }}" {{ \Request::get('province') == $province->name ? "selected='selected'" : "" }}>{{ $province->name }}</option>
              @endforeach
            @endif
          </select>
        </div>
        <div class="col-md-2">
          <input type="submit" class="btn" value="Search Job">
        </div>
      </div>

    </div>
  </div>
</form>





<!-- Search End -->
{{-- ------------------------------------------------------------------------ --}}


@if($profileNew)

    <!-- Việc làm mới start -->
    <div class="section greybg">
      <div class="container" id="tag_container">
        @include('home.newajax')
    </div>
  </div>
    <!-- Việc làm mới ends -->
@endif
{{-- ------------------------------------------------------------------------------- --}}

<!-- Top Thương hiệu start -->
<div class="section greybg">
  <div class="container">
    <!-- title start -->
    <div class="titleTop">
      <h3>Top <span>Thương hiệu</span></h3>
    </div>
    <!-- title end -->
    @if($companys)

    <ul class="employerList">
      @foreach($companys as $company)
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ $company->em_company }}"><a href="#"><img src="{{ old('em_avatar',(isset($company->em_avatar)) ? asset(pare_url_file($company->em_avatar)) : asset('images/default.png') ) }}" alt="Company Name"></a></li>
      @endforeach

    </ul>
    @endif
  </div>
</div>
<!-- Top Thương hiệu ends -->


{{-- ------------------------------------------------------------------------------- --}}

<!-- Popular Searches start -->
<div class="section">
  <div class="container">
    <!-- title start -->
    <div class="titleTop">
      <h3>Việc làm theo <span>khu vực</span></h3>
    </div>
    <!-- title end -->
    <div class="topsearchwrap row">
      <div class="col-md-12">
        <!--Categories start-->
        <ul class="row catelist">
          @foreach($provinces as $province)
            <li class="col-md-3 col-sm-3"><a href="{{ route('search.province', [$province->slug, $province->name]) }}">{{ $province->name }}</a></li>
          @endforeach
        </ul>
        <!--Categories end-->
      </div>

    </div>
  </div>
</div>
<!-- Popular Searches ends -->

{{-- ------------------------------------------------------------------------------- --}}

<!-- Popular Searches start -->
<div class="section">
  <div class="container">
    <!-- title start -->
    <div class="titleTop">
      <h3>Việc làm theo <span>ngành nghề</span></h3>
    </div>
    <!-- title end -->
    <div class="topsearchwrap row">
      <div class="col-md-12">
        <!--Categories start-->
        <ul class="row catelist">
          @foreach($jobs as $job)
            <li class="col-md-3 col-sm-3"><a href="{{ route('search.index', [$job->slug, $job->name]) }}">{{ $job->name }}</a></li>
          @endforeach
        </ul>
        <!--Categories end-->
      </div>

    </div>
  </div>
</div>
<!-- Popular Searches ends -->

{{-- ------------------------------------------------------------------------------- --}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
    $(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            }else{
                getData(page);
            }
        }
    });
    $(document).ready(function()
    {
        $(document).on('click', '.pagination a',function(event)
        {
            event.preventDefault();
            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
            var myurl = $(this).attr('href');
            var page=$(this).attr('href').split('page=')[1];
            getData(page);
        });
    });
    function getData(page){
        $.ajax(
        {
            url: '?page=' + page,
            type: "get",
            datatype: "html"
        }).done(function(data){
            $("#tag_container").empty().html(data);
            location.hash = page;
        }).fail(function(jqXHR, ajaxOptions, thrownError){
              alert('Không có dữ liệu trả về');
        });
    }
</script>

@stop