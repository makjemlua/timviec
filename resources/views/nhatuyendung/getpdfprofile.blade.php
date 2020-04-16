<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Tuyển dụng - Tìm việc làm</title>
<!-- Fav Icon -->
<link rel="shortcut icon" href="images/favicon.ico">

<!-- Owl carousel -->
<link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">

<!-- Owl slide -->
<link href="{{ asset('css/settings.css') }}" rel="stylesheet">

<!-- Bootstrap -->
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

<!-- Font Awesome -->
<link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"  type='text/css'>


<!-- Custom Style -->
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
<style type="text/css">
  body
  {
    font-family: DejaVu Sans;
  }
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
  .page-break
  {
    page-break-after: always;
  }
</style>
<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Contact Us</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="{{ route('home.index') }}">Home</a> / <span>Search Job</span></div>
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
              <div class="desi"><p>Tên: {{ $info->user->name }}</p></div>
              <div class="desi"><p>Chức vụ: {{ $info->ge_position_current }}</p></div>
              <div class="loctext"><p>Tên hồ sơ: <h3>{{ $info->ge_title }}</h3></p></div>
              <div class="loctext"><p>Địa chỉ: {{ $info->user->address }}</p></div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- Job Detail start -->
    <div class="row">
      <div class="col-md-8">
        <!-- About Employee start -->


        <div class="job-header">
          <div class="contentbox">
            <h3><p>Mục tiêu nghề nghiệp</p></h3>
            {!! $info->ge_career !!}
          </div>
        </div>



        <!-- Education start -->
      @if(isset($education->de_school_1))
      <div class="page-break"></div>

        <div class="job-header">
          <div class="contentbox">
            <h3><p>Học vấn</p></h3>
            <ul class="educationList">

              <li>
                <div class="date">{{ $education->de_year_from_1 }}<br>
                  -<br>
                  {{ $education->de_year_to_1 }}</div>
                <h4><p>{{ $education->de_school_1 }}</p></h4>
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
                <h4><p>{{ $education->de_school_2 }}</p></h4>
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
        <div class="page-break"></div>

        <div class="job-header">
          <div class="contentbox">
            <h3><p>Kinh nghiệm</p></h3>
            <ul class="educationList">
              <li>
                <div class="date">
                  {{ $exp->ex_month_from }}/{{ $exp->ex_year_from }}<br>
                  -<br>
                  {{ $exp->ex_month_to }}/{{ $exp->ex_year_to }}
                </div>
                <h4><p>{{ $exp->ex_company_name }}</p></h4>
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

      <div class="page-break"></div>

      <div class="col-md-4">
        <!-- Candidate Detail start -->
        <div class="job-header">
          <div class="jobdetail">
            <h3><p>Thông tin chi tiết</p></h3>
            <ul class="jbdetail">
              <li class="row">
                <div class="col-md-4 col-xs-4">Ngành nghề</div>
                <div class="col-md-4 col-xs-4"><p>{{ $info->ge_profession }}</p></div>
              </li>
              <li class="row">
                <div class="col-md-4 col-xs-4">Kinh nghiệm</div>
                <div class="col-md-4 col-xs-4"><p>{{ $info->ge_experience }}</p></div>
              </li>
              <li class="row">
                <div class="col-md-4 col-xs-4">Nơi làm việc</div>
                <div class="col-md-4 col-xs-4"><p>{{ $info->ge_provinces }}</p></div>
              </li>
              <li class="row">
                <div class="col-md-4 col-xs-4">Cấp bậc hiện tại</div>
                <div class="col-md-4 col-xs-4"><p>{{ $info->ge_position_current }}</p></div>
              </li>
              <li class="row">
                <div class="col-md-4 col-xs-4">Cấp bậc mong muốn</div>
                <div class="col-md-4 col-xs-4"><p>{{ $info->ge_position }}</p></div>
              </li>
              <li class="row">
                <div class="col-md-4 col-xs-4">Mức lương mong muốn</div>
                <div class="col-md-4 col-xs-4"><p>{{ number_format($info->ge_salary_min,0, ',', '.') }} VNĐ</p></div>
              </li>
              <li class="row">
                <div class="col-md-4 col-xs-4">Trình độ học vấn</div>
                <div class="col-md-4 col-xs-4"><p>{{ $info->ge_level }}</p></div>
              </li>
            </ul>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- Bootstrap's JavaScript -->
<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<!-- Owl carousel -->
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>

<!-- Owl slide -->
<script src="{{ asset('js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('js/jquery.themepunch.revolution.min.js') }}"></script>

<!-- Custom js -->
<script src="{{ asset('js/script.js') }}"></script>
