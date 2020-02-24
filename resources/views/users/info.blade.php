@extends('users.dashboard')
@section('content')
<div class="box-content">

  <h3 class="title font-roboto text-primary">
    <span class="text">Thông tin tài khoản</span>
  </h3>
  <form action="" method="POST" enctype="multipart/form-data">
          @csrf
  <div class="row">
    <div class="col-md-3">
      <div class="card" style="width: 18rem;">
        <img src="{{ asset(pare_url_file($user->avatar)) }}" class="card-img-top" alt="..." >
        <div>
          <input type="file" name="avatar">
        </div>
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
                  <option value="{{ old('gender',isset($userProfile->gender) ? $userProfile->gender : '') }}">
                    {{ old('gender',isset($userProfile->gender) ? $userProfile->gender : 'Chọn giới tính') }}
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
@stop