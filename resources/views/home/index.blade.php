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
</style>
<!-- Search start -->
<form>
  <div class="searchwrap">
    <div class="container">
      <h3>One million success stories. <span>Start yours today.</span></h3>
      <div class="searchbar row">
        <div class="col-md-5">
          <input type="text" class="form-control" name="search" id="search" value="{{ \Request::get('search') }}" placeholder="Enter Skills or job title">
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
      <!-- button start -->
      <div class="getstarted"><a href="{{ route('home.index') }}"><i class="fa fa-user" aria-hidden="true"></i> Get Started Now</a></div>
      <!-- button end -->

    </div>
  </div>
</form>




<!-- Search End -->
{{-- ------------------------------------------------------------------------ --}}
@if($profileNew)

    <!-- Việc làm mới start -->
    <div class="section greybg">
      <div class="container">
        <!-- title start -->
        <div class="titleTop">
          <h3>Việc làm <span>mới</span></h3>
        </div>
        <!-- title end -->

        <!--Featured Job start-->
        <ul class="jobslist row">

          @foreach($profileNew as $new)

          <!--Job start-->
          <li class="col-md-6">
            <div class="jobint">
              <div class="row">
                <div class="col-md-2 col-sm-2"><img src="{{ old('em_avatar',(isset($new->employer->em_avatar)) ? asset(pare_url_file($new->employer->em_avatar)) : asset('images/default.png') ) }}" alt="Job Name"></div>
                <div class="col-md-7 col-sm-7">
                  <h4><a class="content-1" href="{{ route('employer.thongtin.profile', [$new->pr_slug, $new->id]) }}">{{ $new->pr_title }}</a></h4>
                  <div class="company"><a href="{{ route('employer.thongtin.profile', [$new->pr_slug, $new->id]) }}">{{ $new->employer->em_company }}</a></div>
                  <div class="jobloc"><label class="partTime">{{ $new->pr_salary }}</label>   - <span>{{ $new->pr_provinces }}</span></div>
                </div>
                <div class="col-md-3 col-sm-3"><a href="#" class="applybtn">Apply Now</a></div>
              </div>
            </div>
          </li>
          <!--Job end-->

          @endforeach

        </ul>
        <!--Featured Job end-->

        <!--button start-->
        <div class="viewallbtn"><a href="{{ route('home.index') }}">View All Featured Jobs</a>
        </div>
        <!--button end-->
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

    <ul class="employerList">
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="{{ route('home.index') }}"><img src="images/employers/emplogo1.jpg" alt="Company Name"></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="{{ route('home.index') }}"><img src="images/employers/emplogo2.jpg" alt="Company Name"></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="{{ route('home.index') }}"><img src="images/employers/emplogo3.jpg" alt="Company Name"></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="{{ route('home.index') }}"><img src="images/employers/emplogo4.jpg" alt="Company Name"></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="{{ route('home.index') }}"><img src="images/employers/emplogo5.jpg" alt="Company Name"></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="{{ route('home.index') }}"><img src="images/employers/emplogo6.jpg" alt="Company Name"></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="{{ route('home.index') }}"><img src="images/employers/emplogo7.jpg" alt="Company Name"></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="{{ route('home.index') }}"><img src="images/employers/emplogo8.jpg" alt="Company Name"></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="{{ route('home.index') }}"><img src="images/employers/emplogo9.jpg" alt="Company Name"></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="{{ route('home.index') }}"><img src="images/employers/emplogo10.jpg" alt="Company Name"></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="{{ route('home.index') }}"><img src="images/employers/emplogo11.jpg" alt="Company Name"></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="{{ route('home.index') }}"><img src="images/employers/emplogo12.jpg" alt="Company Name"></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="{{ route('home.index') }}"><img src="images/employers/emplogo13.jpg" alt="Company Name"></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="{{ route('home.index') }}"><img src="images/employers/emplogo14.jpg" alt="Company Name"></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="{{ route('home.index') }}"><img src="images/employers/emplogo15.jpg" alt="Company Name"></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="{{ route('home.index') }}"><img src="images/employers/emplogo16.jpg" alt="Company Name"></a></li>
    </ul>
  </div>
</div>
<!-- Top Thương hiệu ends -->

{{-- ------------------------------------------------------------------------------- --}}

@if($profileHot)
<!-- Việc làm hot start -->
<div class="section greybg">
  <div class="container">
    <!-- title start -->
    <div class="titleTop">
      <h3>Việc làm <span>hot</span></h3>
    </div>
    <!-- title end -->

    <!--Featured Job start-->
    <ul class="jobslist row">
      @foreach($profileHot as $hot)
        <!--Job start-->
        <li class="col-md-6">
          <div class="jobint">
            <div class="row">
              <div class="col-md-2 col-sm-2"><img src="{{ old('em_avatar',(isset($hot->employer->em_avatar)) ? asset(pare_url_file($hot->employer->em_avatar)) : asset('images/default.png') ) }}" alt="Job Name"></div>
              <div class="col-md-7 col-sm-7">
                <h4><a href="{{ route('employer.thongtin.profile', [$hot->pr_slug, $hot->id]) }}">{{ $hot->pr_title }}</a></h4>
                <div class="company"><a href="{{ route('home.index') }}">{{ $hot->employer->em_company }}</a></div>
                <div class="jobloc"><label class="fulltime">{{ $hot->pr_salary }}</label>   - <span>{{ $hot->pr_provinces }}</span></div>
              </div>
              <div class="col-md-3 col-sm-3"><a href="{{ route('home.index') }}" class="applybtn">Apply Now</a></div>
            </div>
          </div>
        </li>
        <!--Job end-->
      @endforeach

    </ul>
    <!--Featured Job end-->

    <!--button start-->
    <div class="viewallbtn"><a href="{{ route('home.index') }}">View All Featured Jobs</a>
    </div>
    <!--button end-->
  </div>
</div>
<!-- Việc làm hot ends -->
@endif

{{-- ------------------------------------------------------------------------------- --}}

@if($profilePrompt)
<!-- Tuyển gấp start -->
<div class="section greybg">
  <div class="container">
    <!-- title start -->
    <div class="titleTop">
      <h3>Tuyển <span>gấp</span></h3>
    </div>
    <!-- title end -->

    <!--Featured Job start-->
    <ul class="jobslist row">
      @foreach($profilePrompt as $prompt)
      <!--Job start-->
      <li class="col-md-6">
        <div class="jobint">
          <div class="row">
            <div class="col-md-2 col-sm-2"><img src="{{ old('em_avatar',(isset($prompt->employer->em_avatar)) ? asset(pare_url_file($prompt->employer->em_avatar)) : asset('images/default.png') ) }}" alt="Job Name"></div>
            <div class="col-md-7 col-sm-7">
              <h4><a href="{{ route('home.index') }}">{{ $prompt->pr_title }}</a></h4>
              <div class="company"><a href="{{ route('employer.thongtin.profile', [$prompt->pr_slug, $prompt->id]) }}">{{ $prompt->employer->em_company }}</a></div>
              <div class="jobloc"><label class="fulltime">{{ $prompt->pr_salary }}</label>   - <span>{{ $prompt->pr_provinces }}</span></div>
            </div>
            <div class="col-md-3 col-sm-3"><a href="{{ route('home.index') }}" class="applybtn">Apply Now</a></div>
          </div>
        </div>
      </li>
      <!--Job end-->
      @endforeach


    </ul>
    <!--Featured Job end-->

    <!--button start-->
    <div class="viewallbtn"><a href="{{ route('home.index') }}">View All Featured Jobs</a>
    </div>
    <!--button end-->
  </div>
</div>
<!-- Tuyển gấp ends -->
@endif

@stop