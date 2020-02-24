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
          <div class="title"> <span>We Are Here For Your Help</span>
            <h2>GET IN TOUCH FAST</h2>
            <p>Vestibulum at magna tellus. Vivamus sagittis nunc aliquet. Vivamin orci aliquam<br>
              eros vel saphicula. Donec eget ultricies ipsmconsequat.</p>
          </div>
        </div>

        <!-- Contact Info -->
        <div class="col-md-4 column">
          <div class="contact-now">
            <div class="contact"> <span><i class="fa fa-home"></i></span>
              <div class="information"> <strong>Address:</strong>
                <p>8500 lorem, New Ispum, Dolor amet sit 12301</p>
              </div>
            </div>
            <!-- Contact Info -->
            <div class="contact"> <span><i class="fa fa-envelope"></i></span>
              <div class="information"> <strong>Email Address:</strong>
                <p>investigate@your-site.com</p>
                <p>investigate@your-site.com</p>
              </div>
            </div>
            <!-- Contact Info -->
            <div class="contact"> <span><i class="fa fa-phone"></i></span>
              <div class="information"> <strong>Phone No:</strong>
                <p>+12 345 67 09</p>
                <p>+12 345 67 09</p>
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
            <form method="post" action="https://www.sharjeelanjum.com/html/jobs-portal/demo/contact-us.html" name="contactform" id="contactform">
              <div class="row">
                <div class="col-md-6">
                  <input name="name" type="text" id="name" placeholder="Full Name">
                </div>
                <div class="col-md-6">
                  <input type="text" name="phone" placeholder="Phone Number">
                </div>
                <div class="col-md-12">
                  <input name="email" type="text" id="email" placeholder="Email">
                </div>
                <div class="col-md-12">
                  <textarea rows="4" name="comments" id="comments" placeholder="Details"></textarea>
                </div>
                <div class="col-md-12">
                  <button title="" class="button" type="submit" id="submit">Submit Now</button>
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
  <iframe src="" allowfullscreen=""></iframe>
</div>
@stop