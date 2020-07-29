@extends('layouts.app')
@section('content')
<style type="text/css">
  b
  {
    font-weight: bold;
  }
  div.jobButtons
  {
        display: inline-flex;
  }
  input.btn
  {
    font-weight: bold;
    background-color: #46e761;
    margin-right: 10px;
  }
  input.btn:hover
  {
    color: white;
    background-color: blue;
  }
</style>
<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Hồ sơ</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="{{ route('home.index') }}">Trang chủ</a> / <span>Hồ sơ</span></div>
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
          <div class="col-md-8 col-sm-8">
            <!-- Candidate Info -->
            <div class="candidateinfo">
              <div class="userPic"><img src="{{ asset(pare_url_file($info->user->avatar)) }}" alt="" width="100px" height="90px"></div>
              <div class="title">{{ $info->user->name }}</div>
              <div class="desi">{{ $info->ge_position_current }}</div>
              <div class="loctext"> <h3>{{ $info->ge_title }}</h3></div>
              <div class="loctext"><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $info->user->address }}</div>
              <div class="clearfix"></div>
            </div>
          </div>
          <div class="col-md-4 col-sm-4">
            <!-- Candidate Contact -->
            <div class="candidateinfo">
              <div class="loctext"><i class="fa fa-phone" aria-hidden="true"></i> {{ $info->user->phone }}</div>
              <div class="loctext"><i class="fa fa-envelope" aria-hidden="true"></i> {{ $info->user->email }}</div>
              <div class="loctext"><i class="fa fa-birthday-cake"></i> {{ $info->user->birthday }}</div>
              <div class="cadsocial"> <a href="http://www.twitter.com/" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a> <a href="http://www.plus.google.com/" target="_blank"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a> <a href="http://www.facebook.com/" target="_blank"> <i class="fa fa-facebook-square" aria-hidden="true"></i></a> <a href="https://www.pinterest.com/" target="_blank"><i class="fa fa-pinterest-square" aria-hidden="true"></i></a> <a href="https://www.linkedin.com/" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a> </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Buttons -->
      <div class="jobButtons">

{{--         <a href="#" class="btn apply"><i class="fa fa-paper-plane" aria-hidden="true"></i> Hire Me</a>
 --}}
{{--         <a href="{{ route('get.pdf', [$info->ge_slug, $info->id]) }}" class="btn"><i class="fa fa-download" aria-hidden="true"></i> Download CV</a>
 --}}
        {{-- <a href="#" class="btn"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save User</a> --}}
        @if(Auth::guard('employers')->check()) {{-- Nếu tồn tại employer thì mới cho lưu --}}
          @if(!$employersaves->count() > 0) {{-- Nếu chưa lưu thì mới cho lưu --}}


          <form action="{{ url('/nha-tuyen-dung/luu-ho-so/{slug}-{id}')}}" method="POST">
            @csrf
            <input type="hidden" name="sa_profile_id" value="{{ $info->id }}">
            <input type="hidden" name="sa_title" value="{{ $info->ge_title }}">
            <input type="hidden" name="sa_name" value="{{ $info->user->name }}">
            <input type="hidden" name="sa_level" value="{{ $info->ge_level }}">
            <input class="btn" type="submit" name="employersaves" value="Lưu hồ sơ">
          </form>
          @else
            <a href="#" class="btn"><i class="fa fa-envelope" aria-hidden="true"></i> Đã lưu</a>
          @endif
        @endif

{{--         <a href="#" class="btn report"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Report Abuse</a>
 --}}      </div>

    </div>

    <!-- Job Detail start -->
    <div class="row">
      <div class="col-md-8">
        <!-- About Employee start -->


        <div class="job-header">
          <div class="contentbox">
            <h3>Mục tiêu nghề nghiệp</h3>
            {!! $info->ge_career !!}
          </div>
        </div>

        <!-- Education start -->
      @if(isset($education->de_school_1))
        <div class="job-header">
          <div class="contentbox">
            <h3>Học vấn</h3>
            <ul class="educationList">

              <li>
                <div class="date">{{ $education->de_year_from_1 }}<br>
                  -<br>
                  {{ $education->de_year_to_1 }}</div>
                <h4>{{ $education->de_school_1 }}</h4>
                <b>Trình độ:</b> {{ $education->de_level_1 }}<br>
                <b>Chuyên ngành:</b> {{ $education->de_diploma_1 }}<br>
                <b>Loại tốt nghiệp:</b> {{ $education->de_loai_tn_1 }}
                <div class="clearfix"></div>
              </li>

              @if(isset($education->de_school_2))
              <li>
                <div class="date">{{ $education->de_year_from_2 }}<br>
                  -<br>
                  {{ $education->de_year_to_2 }}</div>
                <h4>{{ $education->de_school_2 }}</h4>
                <b>Trình độ:</b> {{ $education->de_level_2 }}<br>
                <b>Chuyên ngành:</b> {{ $education->de_diploma_2 }}<br>
                <b>Loại tốt nghiệp:</b> {{ $education->de_loai_tn_2 }}
                <div class="clearfix"></div>
              </li>
              @endif
            </ul>
          </div>
        </div>
        @endif


        <!-- Experience start -->
        @if(isset($exp->ex_company_name))
        <div class="job-header">
          <div class="contentbox">
            <h3>Kinh nghiệm</h3>
            <ul class="educationList">
              <li>
                <div class="date">
                  {{ $exp->ex_month_from }}/{{ $exp->ex_year_from }}<br>
                  -<br>
                  {{ $exp->ex_month_to }}/{{ $exp->ex_year_to }}
                </div>
                <h4>{{ $exp->ex_company_name }}</h4>
                <b>Mức lương:</b> {{ number_format($exp->ex_current_salary,0, ',', '.') }} VNĐ<br>
                <b>Mô tả:</b> {!! $exp->ex_description !!}<br>
                <b>Thành tích:</b> {!! $exp->ex_achieve !!}
                <div class="clearfix"></div>
              </li>
            </ul>
          </div>
        </div>
        @endif

      </div>
      <div class="col-md-4">
        <!-- Candidate Detail start -->
        <div class="job-header">
          <div class="jobdetail">
            <h3>Thông tin chi tiết</h3>
            <ul class="jbdetail">
              <li class="row">
                <div class="col-md-6 col-xs-6">Ngành nghề</div>
                <div class="col-md-6 col-xs-6"><span>{{ $info->ge_profession }}</span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">Kinh nghiệm</div>
                <div class="col-md-6 col-xs-6"><span>{{ $info->ge_experience }}</span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">Nơi làm việc</div>
                <div class="col-md-6 col-xs-6"><span>{{ $info->ge_provinces }}</span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">Cấp bậc hiện tại</div>
                <div class="col-md-6 col-xs-6"><span>{{ $info->ge_position_current }}</span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">Cấp bậc mong muốn</div>
                <div class="col-md-6 col-xs-6"><span>{{ $info->ge_position }}</span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">Tuổi</div>
                <div class="col-md-6 col-xs-6"><span>{{ $years }}</span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">Mức lương mong muốn</div>
                <div class="col-md-6 col-xs-6"><span class="freelance">{{ number_format($info->ge_salary_min,0, ',', '.') }} VNĐ</span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">Trình độ học vấn</div>
                <div class="col-md-6 col-xs-6"><span>{{ $info->ge_level }}</span></div>
              </li>
            </ul>
          </div>
        </div>

        <!-- Skill start -->
        <div class="job-header">
          <div class="jobdetail">
            <h3>Kỹ năng</h3>
            <div class="skillswrap">

              <!-- Skill -->
              @if(isset($skill->sk_skill_1))
              <h5>{{ $skill->sk_skill_1 }}</h5>
              <div class="progress">
                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: {{ $skill->sk_percent_1 }}%"> <span>{{ $skill->sk_percent_1 }}%</span> </div>
              </div>
              @endif


              <!-- Skill -->
              @if(isset($skill->sk_skill_2))
              <h5>{{ $skill->sk_skill_2 }}</h5>
              <div class="progress">
                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: {{ $skill->sk_percent_2 }}%"> <span>{{ $skill->sk_percent_2 }}%</span> </div>
              </div>
              @endif


              <!-- Skill -->
              @if(isset($skill->sk_skill_3))
              <h5>{{ $skill->sk_skill_3 }}</h5>
              <div class="progress">
                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: {{ $skill->sk_percent_3 }}%"> <span>{{ $skill->sk_percent_3 }}%</span> </div>
              </div>
              @endif


              <!-- Skill -->
              @if(isset($skill->sk_skill_4))
              <h5>{{ $skill->sk_skill_4 }}</h5>
              <div class="progress">
                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: {{ $skill->sk_percent_4 }}%"> <span>{{ $skill->sk_percent_4 }}%</span> </div>
              </div>
              @endif


            </div>
            <ul class="jbdetail">
              <li class="row">
                <div class="col-md-3 col-xs-3">Sở thích</div>
                <div class="col-md-9 col-xs-9"><span>{{ $skill->sk_interesting }}</span></div>
              </li>
              <li class="row">
                <div class="col-md-3 col-xs-3">Tài lẻ</div>
                <div class="col-md-9 col-xs-9"><span>{{ $skill->sk_speial_skill }}</span></div>
              </li>
            </ul>
          </div>
        </div>
        {{-- End skill --}}

      </div>
    </div>
  </div>
</div>
@stop