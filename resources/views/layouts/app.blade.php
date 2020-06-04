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

</head>
<body cz-shortcut-listen="true">
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

@yield('content')

@include('components.footer')

@yield('script')

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

