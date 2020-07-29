@extends('layouts.app')
@section('content')
@php
  $page = "about-us";
@endphp
<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Về chúng tôi</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#">Trang chủ</a> / <span>Về chúng tôi</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->

<div class="about-wraper">
  <!-- About -->
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <h2>NỔI TIẾNG TUYỂN DỤNG NHANH</h2>
        <p>Timviecnhanh.xyz là một trong những website việc làm ra đời sớm nhất tại thị trường Việt Nam. Với sứ mệnh là cầu nối giữa Nhà tuyển dụng và Người tìm việc, Tìm Việc Nhanh đã, đang và sẽ hỗ trợ nhiều doanh nghiệp ổn định và phát triển bộ máy nhân sự, tạo cơ hội việc làm cho hàng triệu ứng viên.<br>
          <br>
          Nhanh chóng, thuận tiện và dễ dàng chính là điều mà Tìm Việc Nhanh muốn mang tới cho Nhà tuyển dụng và Người tìm việc.<br></p>
      </div>
      <div class="col-md-5">
        <div class="postimg"><img src="images/about-us-img1.jpg" alt="your alt text"></div>
      </div>
    </div>
  </div>

  <!-- Process -->
  <div class="what_we_do">
    <div class="container">
      <div class="main-heading">Timviecnhanh.xyz</div>
      <div class="whatText">Nổi tiếng tuyển dụng nhanh như cái tên</div>
      <ul class="row whatList">
        <li class="col-md-4 col-sm-6">
          <div class="iconWrap">
            <div class="icon"><i class="fa fa-user" aria-hidden="true"></i></div>
          </div>
          <h3>15+ Năm hoạt động</h3>
        </li>
        <li class="col-md-4 col-sm-6">
          <div class="iconWrap">
            <div class="icon"><i class="fa fa-file-text"></i></div>
          </div>
          <h3>1.500.000+ số ứng viên</h3>
        </li>
        <li class="col-md-4 col-sm-6">
          <div class="iconWrap">
            <div class="icon"><i class="fa fa-briefcase" aria-hidden="true"></i></div>
          </div>
          <h3>500.000+ số nhà tuyển dụng</h3>
        </li>
      </ul>
    </div>
  </div>

  <!-- Text -->
  <div class="textrow">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <div class="postimg"><img src="images/about-us-img2.jpg" alt="your alt text"></div>
        </div>
        <div class="col-md-7">
          <h2>ĐỘI NGŨ NHÂN SỰ</h2>
          <p>Bắt đầu từ một vài cá nhân tâm huyết với việc kết nối, tạo cơ hội việc làm cho hàng triệu người lao động, đến nay Tìm Việc Nhanh đã có đội ngũ hàng trăm nhân sự đang hỗ trợ nhiệt tình tới từng Nhà tuyển dụng, tới từng ứng viên.<br>
            <br>
            Giúp doanh nghiệp tuyển dụng nhanh chóng, ứng viên sớm tìm được công việc mơ ước chính là mục tiêu hoạt động của chúng tôi.</p>
          <ul class="orderlist">
            <li>Nguồn nhân lực lớn</li>
            <li>Dễ dàng sử dụng</li>
            <li>Năng suất hiệu quả</li>
            <li>Công nghệ hiện đại</li>
            <li>Trao đổi dễ dàng</li>
            <li>Bảo mật an toàn</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@stop