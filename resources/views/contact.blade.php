@extends('layouts/app')
@section('content')
<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Contact Us</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="{{ route('home.index') }}">Home</a> / <span>Contact Us</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->

<!-- Contact us -->
<div class="inner-page">
  <div class="container">
    <div class="contact-wrap">
      <div class="row">
        <div class="col-md-12 column">
          <div class="title"> <span>Chúng tôi ở đây để giúp bạn</span>
            <h2>LIÊN HỆ NHANH CHÓNG</h2>
          </div>
        </div>

        <!-- Contact Info -->
        <div class="col-md-4 column">
          <div class="contact-now">
            <div class="contact"> <span><i class="fa fa-home"></i></span>
              <div class="information"> <strong>Địa chỉ:</strong>
                <p>24 Nguyễn Văn Bảo P4 Gò Vấp Tp HCM</p>
              </div>
            </div>
            <!-- Contact Info -->
            <div class="contact"> <span><i class="fa fa-envelope"></i></span>
              <div class="information"> <strong>Email:</strong>
                <p>nguyenan.2502@gmail.com</p>
                <p>caonam@gmail.com</p>
              </div>
            </div>
            <!-- Contact Info -->
            <div class="contact"> <span><i class="fa fa-phone"></i></span>
              <div class="information"> <strong>Số điện thoại:</strong>
                <p>0987 654 321</p>
                <p>09 8888 9999</p>
              </div>
            </div>
            <!-- Contact Info -->
          </div>
          <!-- Contact Now -->
        </div>

        <!-- Contact form -->
        <div class="col-md-8 column">
          <div class="contact-form">
            <div id="message"></div>
            <form method="post" action="" name="contactform" id="contactform">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <input name="co_name" type="text" placeholder="Full Name" required>
                </div>
                <div class="col-md-6">
                  <input type="text" name="co_phone" placeholder="Phone Number" required>
                </div>
                <div class="col-md-12">
                  <input name="co_email" type="text" placeholder="Email" required>
                </div>
                <div class="col-md-12">
                  <textarea rows="4" name="co_content" placeholder="Details" required></textarea>
                </div>
                <div class="col-md-12">
                  <button title="" class="button" type="submit" id="submit">Gửi ngay</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Google Map -->
<div class="googlemap">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.85762996266!2d106.6853084146229!3d10.822205392290451!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174deb3ef536f31%3A0x8b7bb8b7c956157b!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2hp4buHcCBUUC5IQ00!5e0!3m2!1svi!2s!4v1582530176833!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
</div>
@stop