@extends('layouts.app')
@section('content')
<style type="text/css">
	.box
	{
		border: solid 2px #fff;
	}
</style>
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
	<div class="row">
		<div class="col-md-3">
			<form action="" method="POST" enctype="multipart/form-data">
			  @csrf
			  <div class="">
			      <div class="row">
			        <div class="col-md-12 box">
			          <div class="useraccount">
			            <div class="formpanel">

			              <!-- Personal Information -->
			              <h3 style="text-align: center;">Tìm kiếm hồ sơ</h3>
			              <div class="row">
			                <div class="col-md-12">
			                  <div class="formrow">
			                    <input type="text" name="pr_title" class="form-control" value="" placeholder="Nhập từ khóa">
			                  </div>
			                </div>


			                <div class="col-md-12">
			                  <div class="formrow">
			                    <select class="form-control" name="pr_work_time">
			                    	<option value="">Tất cả ngành nghề</option>
					              @if(isset($jobs))
			                        @foreach($jobs as $job)
			                          <option value="{{ $job->name }}">{{ $job->name }}
			                          </option>
			                        @endforeach
			                      @endif
			                    </select>
			                  </div>
			                </div>

			                <div class="col-md-12">
			                  <div class="formrow">
			                    <select class="form-control" name="pr_work_time">
			                      <option value="">Tất cả tỉnh thành</option>
			                      @if(isset($provinces))
			                        @foreach($provinces as $province)
			                          <option value="{{ $province->name }}">{{ $province->name }}
			                          </option>
			                        @endforeach
			                      @endif
			                    </select>
			                  </div>
			                </div>

			                <div class="col-md-12">
			                  <div class="formrow">
			                    <select class="form-control" name="pr_work_time">
			                      <option value="">Tất cả mức lương</option>
			                    </select>
			                  </div>
			                </div>

			                <div class="col-md-12">
			                  <div class="formrow">
			                    <select class="form-control" name="pr_work_time">
			                      <option value="">Tất cả ngoại ngữ</option>
			                    </select>
			                  </div>
			                </div>

			                <div class="col-md-12">
			                  <div class="formrow">
			                    <select class="form-control" name="pr_work_time">
			                      <option value="">Tất cả giới tính</option>
			                    </select>
			                  </div>
			                </div>

			                <div class="col-md-12">
			                  <div class="formrow">
			                    <select class="form-control" name="pr_work_time">
			                      <option value="">Tất cả trình độ</option>
			                    </select>
			                  </div>
			                </div>

			                <div class="col-md-12">
			                  <div class="formrow">
			                    <select class="form-control" name="pr_work_time">
			                      <option value="">Tất cả kinh nghiệm</option>
			                    </select>
			                  </div>
			                </div>

			              </div>
			              <hr>


			              <br>
			              <input type="submit" name="submit" class="btn" value="Tìm kiếm">
			            </div>
			          </div>
			        </div>
			      </div>
			    </div>
			</form>
		</div>
		<div class="col-md-9">
			<!-- Revolution slider start -->
			<div class="tp-banner-container">
			  <div class="tp-banner" >
			    <ul>
			      <!--Slide-->
			      <li data-slotamount="7" data-transition="3dcurtain-vertical" data-masterspeed="1000" data-saveperformance="on"> <img alt="Your alt text" src="images/slider/dummy.png" data-lazyload="images/slider/banner.jpg">
			        <div class="caption lfl large-title tp-resizeme slidertext1" data-x="left" data-y="100" data-speed="600" data-start="1600">Search Your Job<br />
			          In your Area</div>
			        <div class="caption lfb large-title tp-resizeme sliderpara" data-x="left" data-y="200" data-speed="600" data-start="2800">Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br />
			          Lorem Ipsum has been the industry's standard dummy text ever since.</div>
			        <div class="caption lfl large-title tp-resizeme slidertext5" data-x="left" data-y="280" data-speed="600" data-start="3500"><a href="#.">Contact Us</a></div>
			      </li>
			      <!--Slide end-->
			      <!--Slide-->
			      <li data-slotamount="7" data-transition="3dcurtain-vertical" data-masterspeed="1000" data-saveperformance="on"> <img alt="Your alt text" src="images/slider/dummy.png" data-lazyload="images/slider/banner2.jpg">
			        <div class="caption lfl large-title tp-resizeme slidertext1" data-x="left" data-y="100" data-speed="600" data-start="1600">Search Your Job<br />
			          Around The World</div>
			        <div class="caption lfb large-title tp-resizeme sliderpara" data-x="left" data-y="200" data-speed="600" data-start="2800">Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br />
			          Lorem Ipsum has been the industry's standard dummy text ever since.</div>
			        <div class="caption lfl large-title tp-resizeme slidertext5" data-x="left" data-y="280" data-speed="600" data-start="3500"><a href="#.">Contact Us</a></div>
			      </li>
			      <!--Slide end-->

			    </ul>
			  </div>
			</div>
			<!-- Revolution slider end -->
			<div>
				<img src="{{ asset('images/mucluong.jpg') }}" alt="placeholder+image">
			</div>
		</div>
	</div>
	<!-- Top Thương hiệu start -->
<div class="section greybg">
  <div class="container">
    <!-- title start -->
    <div class="titleTop">
      <h3>Top <span>Thương hiệu</span></h3>
    </div>
    <!-- title end -->

    <ul class="employerList">
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="{{ route('home.index') }}"><img src="images/employers/emplogo1.jpg" alt="Company Name"></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="{{ route('home.index') }}"><img src="images/employers/emplogo2.jpg" alt="Company Name"></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="{{ route('home.index') }}"><img src="images/employers/emplogo3.jpg" alt="Company Name"></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="{{ route('home.index') }}"><img src="images/employers/emplogo4.jpg" alt="Company Name"></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="{{ route('home.index') }}"><img src="images/employers/emplogo5.jpg" alt="Company Name"></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="{{ route('home.index') }}"><img src="images/employers/emplogo6.jpg" alt="Company Name"></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="{{ route('home.index') }}"><img src="images/employers/emplogo7.jpg" alt="Company Name"></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="{{ route('home.index') }}"><img src="images/employers/emplogo8.jpg" alt="Company Name"></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="{{ route('home.index') }}"><img src="images/employers/emplogo9.jpg" alt="Company Name"></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="{{ route('home.index') }}"><img src="images/employers/emplogo10.jpg" alt="Company Name"></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="{{ route('home.index') }}"><img src="images/employers/emplogo11.jpg" alt="Company Name"></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="{{ route('home.index') }}"><img src="images/employers/emplogo12.jpg" alt="Company Name"></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="{{ route('home.index') }}"><img src="images/employers/emplogo13.jpg" alt="Company Name"></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="{{ route('home.index') }}"><img src="images/employers/emplogo14.jpg" alt="Company Name"></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="{{ route('home.index') }}"><img src="images/employers/emplogo15.jpg" alt="Company Name"></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="{{ route('home.index') }}"><img src="images/employers/emplogo16.jpg" alt="Company Name"></a></li>
    </ul>
  </div>
</div>
<!-- Top Thương hiệu ends -->
  </div>
</div>
@stop