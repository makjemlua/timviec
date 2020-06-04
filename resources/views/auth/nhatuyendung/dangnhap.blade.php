@extends('layouts.app')
@section('content')
<style type="text/css">
  .error
  {
    color: red;
    font-weight: bold;
  }
</style>
<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Login</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="">Home</a> / <a href="">Nhà tuyển dụng</a> / <span>Đăng nhập</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->

<div class="listpgWraper">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="userccount">
          {{-- <div class="socialLogin">
            <h5>Login Mạng xã hội</h5>
            <a href="#" class="fb"><i class="fa fa-facebook" aria-hidden="true"></i></a> <a href="#" class="gp"><i class="fa fa-google-plus" aria-hidden="true"></i></a> <a href="#" class="tw"><i class="fa fa-twitter" aria-hidden="true"></i></a> </div> --}}
          <h5>Nhà tuyển dụng đăng nhập</h5>
          <!-- login form -->
          <form action="" method="POST">
            @csrf
            <div class="formpanel">
              <div class="formrow">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Username">
                @if ($errors->has('email'))
                    <div class="error">{{ $errors->first('email') }}</div>
                  @endif
              </div>
              <div class="formrow">
                <input type="password" class="form-control" name="password" placeholder="Password">
                @if ($errors->has('password'))
                    <div class="error">{{ $errors->first('password') }}</div>
                  @endif
              </div>
              <input type="submit" class="btn" value="Login">
            </div>
          </form>
          <!-- login form  end-->

          <!-- sign up form -->
          <div class="newuser"><i class="fa fa-user" aria-hidden="true"></i> Chưa có tài khoản? <a href="{{ route('register.employer') }}">Đăng ký ở đây</a></div>
          <!-- sign up form end-->

        </div>
      </div>
    </div>
  </div>
</div>
@stop