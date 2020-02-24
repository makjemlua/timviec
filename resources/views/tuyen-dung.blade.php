@extends('layouts.app')
@section('content')
<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Candidates Listing</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="">Home</a> / <a href="">Resume Search</a> / <span>Candidates</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->

<div class="listpgWraper">
  <div class="container">

    <!-- Search Result and sidebar start -->
    <div class="row">
      <div class="col-md-3 col-sm-12">
        <!-- Side Bar start -->
        <div class="sidebar">
          <!-- Jobs By Title -->
          <div class="widget">
            <h4 class="widget-title">Jobs By Title</h4>
            <ul class="optionlist">
              <li>
                <input type="checkbox" name="checkname" id="webdesigner">
                <label for="webdesigner"></label>
                Web Designer <span>12</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="3dgraphic">
                <label for="3dgraphic"></label>
                3D Graphic Designer <span>33</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="graphic">
                <label for="graphic"></label>
                Graphic Designer <span>33</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="electronicTech">
                <label for="electronicTech"></label>
                Electronics Technician <span>33</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="webgraphic">
                <label for="webgraphic"></label>
                Web / Graphic Designer <span>33</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="brandmanager">
                <label for="brandmanager"></label>
                Brand Manager <span>33</span> </li>
            </ul>
            <a href="https://www.sharjeelanjum.com/html/jobs-portal/demo/candidate-listing.html#.">View More</a> </div>

          <!-- Jobs By City -->
          <div class="widget">
            <h4 class="widget-title">Jobs By City</h4>
            <ul class="optionlist">
              <li>
                <input type="checkbox" name="checkname" id="newyork">
                <label for="newyork"></label>
                New York <span>12</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="losangles">
                <label for="losangles"></label>
                Los Angeles <span>33</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="chicago">
                <label for="chicago"></label>
                Chicago <span>33</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="houston">
                <label for="houston"></label>
                Houston <span>12</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="sandiego">
                <label for="sandiego"></label>
                San Diego <span>555</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="sanjose">
                <label for="sanjose"></label>
                San Jose <span>44</span> </li>
            </ul>
            <a href="https://www.sharjeelanjum.com/html/jobs-portal/demo/candidate-listing.html#.">View More</a> </div>

          <!-- Jobs By Experience -->
          <div class="widget">
            <h4 class="widget-title">Jobs By Experience</h4>
            <ul class="optionlist">
              <li>
                <input type="checkbox" name="checkname" id="permanent">
                <label for="permanent"></label>
                Full Time/Permanent <span>12</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="contract">
                <label for="contract"></label>
                Contract <span>33</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="parttime">
                <label for="parttime"></label>
                Part Time <span>33</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="internship">
                <label for="internship"></label>
                Internship <span>33</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="freelance">
                <label for="freelance"></label>
                Freelance <span>33</span> </li>
            </ul>
            <a href="https://www.sharjeelanjum.com/html/jobs-portal/demo/candidate-listing.html#.">View More</a> </div>

          <!-- Jobs By Industry -->
          <div class="widget">
            <h4 class="widget-title">Jobs By Industry</h4>
            <ul class="optionlist">
              <li>
                <input type="checkbox" name="checkname" id="infotech">
                <label for="infotech"></label>
                Information Technology <span>22</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="advertise">
                <label for="advertise"></label>
                Advertising/PR <span>45</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="services">
                <label for="services"></label>
                Services <span>44</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="health">
                <label for="health"></label>
                Health &amp; Fitness <span>88</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="mediacomm">
                <label for="mediacomm"></label>
                Media/Communications <span>22</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="fashion">
                <label for="fashion"></label>
                Fashion <span>11</span> </li>
            </ul>
            <a href="https://www.sharjeelanjum.com/html/jobs-portal/demo/candidate-listing.html#.">View More</a> </div>

          <!-- Top Companies -->
          <div class="widget">
            <h4 class="widget-title">Top Companies</h4>
            <ul class="optionlist">
              <li>
                <input type="checkbox" name="checkname" id="Envato">
                <label for="Envato"></label>
                Envato <span>12</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="Themefores">
                <label for="Themefores"></label>
                Themefores <span>33</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="GraphicRiver">
                <label for="GraphicRiver"></label>
                Graphic River <span>33</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="Codecanyon">
                <label for="Codecanyon"></label>
                Codecanyon <span>33</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="AudioJungle">
                <label for="AudioJungle"></label>
                Audio Jungle <span>33</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="Videohive">
                <label for="Videohive"></label>
                Videohive <span>33</span> </li>
            </ul>
            <a href="https://www.sharjeelanjum.com/html/jobs-portal/demo/candidate-listing.html#.">View More</a> </div>

          <!-- Salary -->
          <div class="widget">
            <h4 class="widget-title">Salary Range</h4>
            <ul class="optionlist">
              <li>
                <input type="checkbox" name="checkname" id="price1">
                <label for="price1"></label>
                0 to $100 <span>12</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="price2">
                <label for="price2"></label>
                $100 to $199 <span>41</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="price3">
                <label for="price3"></label>
                $199 to $499 <span>33</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="price4">
                <label for="price4"></label>
                $499 to $999 <span>66</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="price5">
                <label for="price5"></label>
                $999 to $4999 <span>159</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="price6">
                <label for="price6"></label>
                Above $4999 <span>865</span> </li>
            </ul>
            <a href="https://www.sharjeelanjum.com/html/jobs-portal/demo/candidate-listing.html#.">View More</a> </div>
          <div class="searchnt">
            <button class="btn"><i class="fa fa-search" aria-hidden="true"></i> Search Jobs</button>
          </div>
        </div>
        <!-- Side Bar end -->
      </div>
      <div class="col-md-9 col-sm-12">
        <!-- Search List -->
        <ul class="searchList">
          @if($profileLists)
            @foreach($profileLists as $list)
              <!-- Candidate -->
              <li>
                <div class="row">
                  <div class="col-md-5 col-sm-5">
                    <div class="jobimg"><img src="{{ asset(pare_url_file($list->user->avatar)) }}" alt="Candidate Name"></div>
                    <div class="jobinfo">
                      <h3><a href="">{{ $list->user->name }}</a></h3>
                      <div class="cateinfo">{{ $list->ge_profession }}</div>
                      <div class="location">{{ $list->ge_provinces }}</div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="col-md-4 col-sm-4">
                    <div class="minsalary">{{ number_format($list->ge_salary_min,0, ',', '.') }} vnđ<span>/ tháng</span></div>
                  </div>
                  <div class="col-md-3 col-sm-3">
                    <div class="listbtn"><a href="">Xem hồ sơ</a></div>
                  </div>
                </div>
                <p>{{ $list->ge_title }}</p>
              </li>
            @endforeach
          @endif
        </ul>

        {!! $profileLists->links() !!}
      </div>
    </div>
  </div>
</div>
@stop