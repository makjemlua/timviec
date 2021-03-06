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
        <h1 class="page-heading">Đăng ký</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="">Trang chủ</a> / <a href="">Người tìm việc</a> / <span>Đăng ký</span></div>
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
          <div class="socialLogin">
            <h5>Đăng nhập mạng xã hội</h5>
            <a href="{{ route('get.login.service', 'facebook') }}" class="fb"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            {{-- <a href="" class="gp"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
            <a href="" class="tw"><i class="fa fa-twitter" aria-hidden="true"></i></a> --}}
          </div>
          {{-- <div class="alert alert-success" role="alert"><strong>Well done!</strong> Your account successfully created.</div> --}}
          {{-- <div class="alert alert-warning" role="alert"><strong>Warning!</strong> Better check yourself, you're not looking too good.</div>
          <div class="alert alert-danger" role="alert"><strong>Oh snap!</strong> Change a few things up and try submitting again.</div> --}}
          <h5>Người tìm việc đăng ký</h5>
          <form action="" method="POST">
            @csrf
            <div class="tab-content">
              <div id="candidate" class="formpanel tab-pane fade in active">
                <div class="formrow">
                  <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Họ và tên">
                  @if ($errors->has('name'))
                    <div class="error">{{ $errors->first('name') }}</div>
                  @endif
                </div>
                <div class="formrow">
                  <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email">
                  @if ($errors->has('email'))
                    <div class="error">{{ $errors->first('email') }}</div>
                  @endif
                </div>
                <div class="formrow">
                  <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                  @if ($errors->has('password'))
                    <div class="error">{{ $errors->first('password') }}</div>
                  @endif
                </div>
                <div class="formrow">
                  <input type="password" name="repassword" class="form-control" placeholder="Xác nhận mật khẩu">
                  @if ($errors->has('repassword'))
                    <div class="error">{{ $errors->first('repassword') }}</div>
                  @endif
                </div>

                <div>
                  <div class="g-recaptcha" data-sitekey="6LejsqUZAAAAAHxtTQukRSvGRcBuhZWxt_WPyPMo" name="g-recaptcha-response"></div>
                  @if ($errors->has('g-recaptcha-response'))
                    <div class="error">{{ $errors->first('g-recaptcha-response') }}</div>
                  @endif
                </div>

                <br>

                <div class="formrow">

                <input type="submit" class="btn" value="Đăng ký">
              </div>
            </div>
          </form>
          <div class="newuser"><i class="fa fa-user" aria-hidden="true"></i> Đã có tài khoản? <a href="{{ route('login.user') }}">Đăng nhập tại đây</a></div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop