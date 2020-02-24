@extends('layouts.app')
@section('content')
<style type="text/css">
  .error
  {
    color: red;
    font-weight: bold;
  }
</style>

<div class="listpgWraper">
  <div class="container">
    <a class="btn btn-danger" href="{{ route('register.index') }}"><i class="fa fa-chevron-circle-left"></i> Quay lại đăng ký</a>
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="userccount">
          <div class="socialLogin">
            <h5>Đăng nhập mạng xã hội</h5>
            <a href="" class="fb"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="" class="gp"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
            <a href="" class="tw"><i class="fa fa-twitter" aria-hidden="true"></i></a> </div>
          {{-- <div class="alert alert-success" role="alert"><strong>Well done!</strong> Your account successfully created.</div> --}}
          {{-- <div class="alert alert-warning" role="alert"><strong>Warning!</strong> Better check yourself, you're not looking too good.</div>
          <div class="alert alert-danger" role="alert"><strong>Oh snap!</strong> Change a few things up and try submitting again.</div> --}}
          <h5>Nhà tuyển dụng đăng ký</h5>
          <form action="" method="POST">
            @csrf
            <div class="tab-content">
              <div id="candidate" class="formpanel tab-pane fade in active">
                <div class="formrow">
                  <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Full Name">
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
                  <input type="password" name="password" class="form-control" placeholder="Password">
                  @if ($errors->has('password'))
                    <div class="error">{{ $errors->first('password') }}</div>
                  @endif
                </div>
                <div class="formrow">
                  <input type="password" name="repassword" class="form-control" placeholder="Confirm Password">
                  @if ($errors->has('repassword'))
                    <div class="error">{{ $errors->first('repassword') }}</div>
                  @endif
                </div>
                <div class="formrow">

                <input type="submit" class="btn" value="Đăng ký">
              </div>
            </div>
          </form>
          <div class="newuser"><i class="fa fa-user" aria-hidden="true"></i> Đã có tài khoản? <a href="{{ route('login.employer') }}">Đăng nhập tại đây</a></div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop