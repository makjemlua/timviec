
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Tuyển dụng - Tìm việc làm</title>
<!-- Fav Icon -->
<link rel="shortcut icon" href="favicon.ico">

<!-- Owl carousel -->
<link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">

<!-- Bootstrap -->
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

<link href="{{ asset('css/callphone.css') }}" rel="stylesheet">

<!-- Font Awesome -->
<link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"  type='text/css'>

<!-- Custom Style -->
<link href="{{ asset('css/main.css') }}" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="js/html5shiv.min.js"></script>
  <script src="js/respond.min.js"></script>
<![endif]-->
<style type="text/css">
  label
  {
    font-weight: bold;
  }
  img.card-img-top
  {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    border: 1px solid black;
    padding: 1px;
  }
  div.listpgWraper
  {
    padding-top: 100px;
  }
</style>
</head>
<body>
@include('components.header')

@if(Session::has('success'))
<div class="alert alert-success alert-dismissible" style="position: fixed;left: 40%;top: 100px;z-index: 9999">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> {{ Session::get('success') }}
</div>
@endif
@if(Session::has('warning'))
<div class="alert alert-warning alert-dismissible" style="position: fixed;left: 40%;top: 100px;z-index: 9999">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Warning!</strong> {{ Session::get('warning') }}
</div>
@endif
@if(Session::has('danger'))
<div class="alert alert-danger alert-dismissible" style="position: fixed;left: 40%;top: 100px;z-index: 9999">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Danger!</strong> {{ Session::get('danger') }}
</div>
@endif



<div class="listpgWraper">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-4">

        <div class="switchbox">
          <div class="txtlbl">Trạng thái hồ sơ <i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="" data-original-title="" title=""></i></div>
            {{-- <div class="pull-right"><label class="switch switch-green">
              <input type="checkbox" class="switch-input">
              <span class="switch-label" data-on="On" data-off="Off"></span>
              <span class="switch-handle"></span>
            </label></div> --}}
            <div class="clearfix"></div>
        </div>

        <ul class="usernavdash">
          <li><a href="{{ route('employer.info') }}"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
          <li><a href="{{ route('employer.profile.index') }}"><i class="fa fa-user" aria-hidden="true"></i> Quản lý tin tuyển dụng</a></li>
          <li><a href="{{ route('employer.profile.create') }}"><i class="fa fa-desktop" aria-hidden="true"></i> Đăng tin tuyển dụng</a></li>
          <li><a href="{{ route('search.hoso') }}"><i class="fa fa-download" aria-hidden="true"></i> Tìm hồ sơ ứng viên</a></li>
          <li><a href="{{ route('employer.save.profile') }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Hồ sơ đã lưu</a></li>
          <li><a href="{{ route('employer.applie.profile') }}"><i class="fa fa-eye" aria-hidden="true"></i> Hồ sơ đã ứng tuyển</a></li>
          <li><a href="{{ route('employer.huongdan') }}"><i class="fa fa-paper-plane" aria-hidden="true"></i> Hướng  dẫn thao tác</a></li>
          <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i> Thông báo</a></li>
          <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i> Thông tin thanh toán</a></li>
          @if(Auth::guard('employers')->user()->em_vip==0)
          <li><a href="{{ route('get.list.cart') }}"><i class="fa fa-envelope" aria-hidden="true"></i> Đăng ký dịch vụ</a></li>
          @else
          <li><a href="#" onclick="alert('Vui lòng chờ hết hạn vip để đăng ký hoặc gia hạn tiếp, xin cảm ơn');"><i class="fa fa-envelope" aria-hidden="true"></i> Đăng ký dịch vụ</a></li>
          @endif
          <li><a href="{{ route('employer.setting.account') }}"><i class="fa fa-lock" aria-hidden="true"></i> Cài đặt tài khoản</a></li>
          <li><a href=""><i class="fa fa-sign-out" aria-hidden="true"></i> Đăng xuất</a></li>
        </ul>
      </div>


      <div class="col-md-9 col-sm-8">


        @yield('content')




      </div>
    </div>
  </div>
</div>

@include('components.footer')

@yield('script')


<!-- Bootstrap's JavaScript -->
<script src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<!-- Owl carousel -->
<script src="{{ asset('js/owl.carousel.js') }}"></script>

<!-- Custom js -->
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>