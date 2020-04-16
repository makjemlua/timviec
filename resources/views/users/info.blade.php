@extends('users.dashboard')
@section('content')
<style type="text/css">
  .custom-file-input {
    color: transparent;
    margin: 10px 10px;
  }
  .custom-file-input::-webkit-file-upload-button {
    visibility: hidden;
  }
  .custom-file-input::before {
    content: 'Chọn ảnh đại diện';
    color: black;
    display: inline-block;
    background: -webkit-linear-gradient(top, #f9f9f9, #e3e3e3);
    border: 1px solid #999;
    border-radius: 3px;
    padding: 5px 8px;
    outline: none;
    white-space: nowrap;
    -webkit-user-select: none;
    cursor: pointer;
    text-shadow: 1px 1px #fff;
    font-weight: 700;
    font-size: 10pt;
  }
  .custom-file-input:hover::before {
    border-color: black;
  }
  .custom-file-input:active {
    outline: 0;
  }
  .custom-file-input:active::before {
    background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
  }
</style>
<ul class="row profilestat">
  <li class="col-md-2 col-sm-4 col-xs-6">
    <div class="inbox"> <i class="fa fa-eye" aria-hidden="true"></i>
      <h6>0</h6>
      <strong>Lượt xem</strong> </div>
  </li>
  <li class="col-md-2 col-sm-4 col-xs-6">
    <div class="inbox"> <i class="fa fa-download" aria-hidden="true"></i>
      <h6>{{ $saveProfile->count() }}</h6>
      <strong>Việc làm đã lưu</strong> </div>
  </li>
  <li class="col-md-2 col-sm-4 col-xs-6">
    <div class="inbox"> <i class="fa fa-user" aria-hidden="true"></i>
      <h6>{{ $userProfile->count() }}</h6>
      <strong>Hồ sơ</strong> </div>
  </li>
  <li class="col-md-2 col-sm-4 col-xs-6">
    <div class="inbox"> <i class="fa fa-eye" aria-hidden="true"></i>
      <h6>21</h6>
      <strong>Đang theo dõi</strong> </div>
  </li>
  <li class="col-md-2 col-sm-4 col-xs-6">
    <div class="inbox"> <i class="fa fa-desktop" aria-hidden="true"></i>
      <h6>2</h6>
      <strong>CV mẫu</strong> </div>
  </li>
  <li class="col-md-2 col-sm-4 col-xs-6">
    <div class="inbox"> <i class="fa fa-envelope-o" aria-hidden="true"></i>
      <h6>8</h6>
      <strong>Thông báo</strong> </div>
  </li>
</ul>
<div class="box-content">

  <h3 class="title font-roboto text-primary">
    <span class="text">Thông tin tài khoản</span>
  </h3>
  <form action="" method="POST" enctype="multipart/form-data">
          @csrf
  <div class="row">
    <div class="col-md-3">
      <div class="card" style="width: 18rem;">

        <div>
          <input type="file" id="imgInp" name="avatar" class="custom-file-input">
        </div>
        <img id="blah" src="{{ old('avatar',(isset($user->avatar)) ? asset(pare_url_file($user->avatar)) : asset('images/default.png') ) }}" class="card-img-top" alt="..." >
      </div>
    </div>
    <div class="col-md-9">
      <header class="block-title">

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}" placeholder="User Name">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="{{ $user->email }}" placeholder="Email" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Số điện thoại</label>
                <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" placeholder="Phone">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Địa chỉ</label>
                <input type="text" name="address" class="form-control" value="{{ $user->address }}" placeholder="Address">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Ngày sinh</label>
                <input type="date" name="birthday" class="form-control" value="{{ $user->birthday }}" placeholder="Birthday">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Giới tính</label>
                <select class="form-control" name="gender">
                  <option value="{{ old('gender',isset($user->gender) ? $user->gender : '') }}">
                    {{ old('gender',isset($user->gender) ? $user->gender : 'Chọn giới tính') }}
                  </option>
                  <option value="Nam">Nam</option>
                  <option value="Nữ">Nữ</option>
                  <option value="Giới tính khác">Giới tính khác</option>
                </select>
              </div>
            </div>
          </div>
          <input type="submit" class="btn btn-success mx-auto d-block" name="submit" value="Cập nhập">
      </header>
    </div>
  </div>
</form>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <script type="text/javascript">
    function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#blah').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#imgInp").change(function() {
    readURL(this);
  });



  </script>
@stop
