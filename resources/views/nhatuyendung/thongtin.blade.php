@extends('layouts.app')
@section('content')
<style type="text/css">
  form
  {
    padding: 0 5px;
  }
  input.btn
  {
    font-weight: bold;
    background-color: #46e761;
  }
  input.btn:hover
  {
    color: white;
    background-color: blue;
  }
  div.jobButtons
  {
        display: inline-flex;
  }
</style>
<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Job Detail</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="">Home</a> / <span>Job Name</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->

<div class="listpgWraper">
  <div class="container">

    <!-- Job Header start -->
    <div class="job-header">
      <div class="jobinfo">
        <div class="row">
          <div class="col-md-8">
            <h2>{{ $info->pr_title }}</h2>
            <div class="ptext">Ngày đăng: {{ $info->created_at }}</div>
            <div class="salary">Lương tháng: <strong>{{ $info->pr_salary }}</strong></div>
          </div>
          <div class="col-md-4">
            <div class="companyinfo">
              <div class="companylogo"><img src="{{ old('em_avatar',(isset($info->employer->em_avatar)) ? asset(pare_url_file($info->employer->em_avatar)) : asset('images/default.png') ) }}" alt="your alt text" width="65px" height="52px"></div>
              <div class="title"><a href="">{{ $info->employer->em_company }}</a></div>
              <div class="ptext">{{ $info->employer->em_address }}</div>
              <div class="opening"><a href="">{{ $info->pr_quantity }} cơ hội việc làm</a></div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="jobButtons">
        @if(Auth::guard('web')->check()) {{-- Nếu tồn tại user thì mới cho lưu --}}
          @if(!$applies->count() > 0) {{-- Nếu chưa lưu thì mới cho lưu --}}
          <form action="{{ url('/nop-ho-so/{slug}-{id}')}}" method="POST">
            @csrf
            <input type="hidden" name="ap_profile_id" value="{{ $info->id }}">
            <input type="hidden" name="ap_title" value="{{ $info->pr_title }}">
            <input type="hidden" name="ap_name" value="{{ $info->employer->name }}">
            <input type="hidden" name="ap_company" value="{{ $info->employer->em_company }}">
            <input type="hidden" name="ap_career" value="{{ $info->pr_career }}">
            <input type="hidden" name="ap_provinces" value="{{ $info->pr_provinces }}">
            <input class="btn" type="submit" name="applies" value="Nộp hồ sơ">
          </form>
          @else
            <a href="#" class="btn"><i class="fa fa-envelope" aria-hidden="true"></i> Đã nộp hồ sơ</a>
          @endif
        @endif

        @if(Auth::guard('web')->check()) {{-- Nếu tồn tại user thì mới cho lưu --}}
          @if(!$usersaves->count() > 0) {{-- Nếu chưa lưu thì mới cho lưu --}}
          <form action="{{ url('/luu-viec-lam/{slug}-{id}')}}" method="POST">
            @csrf
            <input type="hidden" name="usa_profile_id" value="{{ $info->id }}">
            <input type="hidden" name="usa_title" value="{{ $info->pr_title }}">
            <input type="hidden" name="usa_company" value="{{ $info->employer->em_company }}">
            <input type="hidden" name="usa_career" value="{{ $info->pr_career }}">
            <input class="btn" type="submit" name="usersaves" value="Lưu việc làm">
          </form>
          @else
            <a href="#" class="btn"><i class="fa fa-envelope" aria-hidden="true"></i> Đã lưu</a>
          @endif
        @endif
      </div>
    </div>

    <!-- Job Detail start -->
    <div class="row">
      <div class="col-md-8">
        <!-- Job Description start -->
        <div class="job-header">
          <div class="contentbox">
            <h3>Chi tiết công việc</h3>
            <p>{!! $info->pr_description !!}</p>
            <h3>Yêu cầu</h3>
            <p>{!! $info->pr_skill !!}</p>
            <h3>Quyền lợi</h3>
            <p>{!! $info->pr_benefit !!}</p>
            <h3>Thông tin liên hệ</h3>
            <ul>
              <li>Người liên hệ: {{ $info->employer->name }}</li>
              <li>Địa chỉ: {{ $info->employer->em_address }}</li>
              <li>Email: {{ $info->employer->email }}</li>
              <li>Số điện thoại: {{ $info->employer->em_phone }}</li>
              <li>Hình thức liên hệ: {{ $info->employer->em_contact_type }}</li>
            </ul>
          </div>
        </div>
        <!-- Job Description end -->
		@if($sameJob)
        <!-- related jobs start -->
        <div class="relatedJobs">
          <h3>Việc làm tương tự</h3>
          <ul class="searchList">

	          	@foreach($sameJob as $job)
		            <!-- Job start -->
		            <li>
		            <div class="row">
		              <div class="col-md-8 col-sm-8">
		                <div class="jobimg"><img src="{{ old('em_avatar',(isset($job->employer->em_avatar)) ? asset(pare_url_file($job->employer->em_avatar)) : asset('images/default.png') ) }}" alt="Job Name"></div>
		                <div class="jobinfo">
		                  <h3><a href="{{ route('employer.thongtin.profile', [$job->pr_slug, $job->id]) }}">{{ $job->pr_title }}</a></h3>
		                  <div class="companyName"><a href="{{ route('employer.thongtin.profile', [$job->pr_slug, $job->id]) }}">{{ $job->employer->em_company }}</a></div>
		                  <div class="location"><label class="fulltime">{{ $job->pr_salary }}</label>   - <span>{{ $job->pr_provinces }}</span></div>
		                </div>
		                <div class="clearfix"></div>
		              </div>
		              <div class="col-md-4 col-sm-4">
		                <div class="listbtn"><a href="">Apply Now</a></div>
		              </div>
		            </div>
		          </li>
		            <!-- Job end -->
	            @endforeach

          </ul>
        </div>
		@endif


      </div>
      <!-- related jobs end -->

      <div class="col-md-4">
        <!-- Job Detail start -->
        <div class="job-header">
          <div class="jobdetail">
            <h3>Chi tiết công việc</h3>
            <ul class="jbdetail">
              <li class="row">
                <div class="col-md-6 col-xs-6">Job Id</div>
                <div class="col-md-6 col-xs-6"><span>EMP{{ $info->id }}</span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">Khu vực</div>
                <div class="col-md-6 col-xs-6"><span>{{ $info->pr_provinces }}</span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">Company</div>
                <div class="col-md-6 col-xs-6"><a href="">{{ $info->employer->em_company }}</a></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">Trạng thái</div>
                <div class="col-md-6 col-xs-6"><span>Đang tuyển</span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">Hình thức làm việc</div>
                <div class="col-md-6 col-xs-6"> <span>{{ $info->pr_work_time }}</span> </div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">Ngành nghề</div>
                <div class="col-md-6 col-xs-6"><span>{{ $info->pr_career }}</span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">Số lượng</div>
                <div class="col-md-6 col-xs-6"><span>{{ $info->pr_quantity }}</span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">Trình độ</div>
                <div class="col-md-6 col-xs-6"><span>{{ $info->pr_level }}</span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">Y/c kinh nghiệm</div>
                <div class="col-md-6 col-xs-6"><span>{{ $info->pr_experience }}</span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">Giới tính</div>
                <div class="col-md-6 col-xs-6"><span>{{ $info->pr_gender }}</span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">Tính chất công việc</div>
                <div class="col-md-6 col-xs-6"><span>{{ $info->pr_attribute }}</span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">Thời hạn</div>
                <div class="col-md-6 col-xs-6"><span>{{ $info->pr_expired_at }}</span></div>
              </li>
            </ul>
          </div>
        </div>

        <!-- Contact Company start -->
        <div class="job-header">
          <div class="jobdetail">
            <h3>Liên hệ công ty</h3>
            <div class="formpanel">
              <div class="formrow">
                <input type="text" class="form-control" placeholder="Your Name">
              </div>
              <div class="formrow">
                <input type="text" class="form-control" placeholder="Your Email">
              </div>
              <div class="formrow">
                <input type="text" class="form-control" placeholder="Phone">
              </div>
              <div class="formrow">
                <input type="text" class="form-control" placeholder="Subject">
              </div>
              <div class="formrow">
                <textarea class="form-control" placeholder="Message"></textarea>
              </div>
              <input type="submit" class="btn" value="Gửi">
            </div>
          </div>
        </div>

        <!-- Google Map start -->
        <div class="job-header">
          <div class="jobdetail">
            <h3>Google Map</h3>
            <div class="gmap">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.85762996266!2d106.6853084146229!3d10.822205392290451!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174deb3ef536f31%3A0x8b7bb8b7c956157b!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2hp4buHcCBUUC5IQ00!5e0!3m2!1svi!2s!4v1582530176833!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop