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

<!-- Việc làm mới start -->
    <div class="section greybg">
      <div class="container" id="tag_container">
        <!-- title start -->
        <div class="titleTop">
          <h3>Việc làm <span>{{ $job }}</span></h3>
        </div>
        <!-- title end -->

        <!--Featured Job start-->
        <ul class="jobslist row">

          @foreach($profiles as $profile)

            <li class="col-md-6">
              <div class="jobint">
                <div class="row">
                  <div class="col-md-2 col-sm-2"><img src="{{ old('em_avatar',(isset($profile->employer->em_avatar)) ? asset(pare_url_file($profile->employer->em_avatar)) : asset('images/default.png') ) }}" alt="Job Name" width="60px" height="60px"></div>
                  <div class="col-md-7 col-sm-7">
                    <h4><a class="content-1" href="{{ route('employer.thongtin.profile', [$profile->pr_slug, $profile->id]) }}" title="{{ $profile->pr_title }}">{{ $profile->pr_title }}</a></h4>
                    <div class="company"><a href="{{ route('employer.thongtin.profile', [$profile->pr_slug, $profile->id]) }}">{{ $profile->employer->em_company }}</a></div>
                    <div class="jobloc"><label class="partTime">{{ $profile->pr_salary }}</label>   - <span>{{ $profile->pr_provinces }}</span></div>
                  </div>
                </div>
              </div>
            </li>


          @endforeach

        </ul>
        <!--Featured Job end-->
        {!! $profiles->links() !!}
    </div>
  </div>
@stop