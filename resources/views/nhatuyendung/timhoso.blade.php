@extends('layouts.app')
@section('content')
<style type="text/css">
	.box
	{
		border: solid 2px #fff;
	}
	div.location.content-1
	  {
	    text-overflow: ellipsis;
	    overflow: hidden;
	    -webkit-line-clamp: 1;
	    -webkit-box-orient: vertical;
	    display: -webkit-box;
	  }
	div.cateinfo.content-1
	  {
	    text-overflow: ellipsis;
	    overflow: hidden;
	    -webkit-line-clamp: 1;
	    -webkit-box-orient: vertical;
	    display: -webkit-box;
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
	<div class="">
		<div class="col-md-3">
			<form action="" method="" enctype="multipart/form-data">

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
			                    <input type="text" name="search" class="form-control" value="{{ \Request::get('search') }}" placeholder="Nhập từ khóa">
			                  </div>
			                </div>


			                <div class="col-md-12">
			                  <div class="formrow">
			                    <select class="form-control" name="job">
			                    	<option value="">Tất cả ngành nghề</option>
					              @if(isset($jobs))
			                        @foreach($jobs as $job)
			                          <option value="{{ $job->name }}" {{ \Request::get('job') == $job->name ? "selected='selected'" : "" }}>{{ $job->name }}
			                          </option>
			                        @endforeach
			                      @endif
			                    </select>
			                  </div>
			                </div>

			                <div class="col-md-12">
			                  <div class="formrow">
			                    <select class="form-control" name="province">
			                      <option value="">Tất cả tỉnh thành</option>
			                      @if(isset($provinces))
			                        @foreach($provinces as $province)
			                          <option value="{{ $province->name }}" {{ \Request::get('province') == $province->name ? "selected='selected'" : "" }}>{{ $province->name }}
			                          </option>
			                        @endforeach
			                      @endif
			                    </select>
			                  </div>
			                </div>

			                <div class="col-md-12">
			                  <div class="formrow">
			                    <select class="form-control" name="luong">
			                      <option value="">Tất cả mức lương</option>
			                      {{-- @if(isset($mucluong))
			                        @foreach($mucluong as $luong) --}}
			                          <option value="1" {{ \Request::get('luong') == '1' ? "selected='selected'" : "" }}>Dưới 3 triệu</option>
			                          <option value="2" {{ \Request::get('luong') == '2' ? "selected='selected'" : "" }}>3-5 triệu</option>
				                      <option value="3" {{ \Request::get('luong') == '3' ? "selected='selected'" : "" }}>5-7 triệu</option>
				                      <option value="4" {{ \Request::get('luong') == '4' ? "selected='selected'" : "" }}>7-10 triệu</option>
				                      <option value="5" {{ \Request::get('luong') == '5' ? "selected='selected'" : "" }}>10-12 triệu</option>
				                      <option value="6" {{ \Request::get('luong') == '6' ? "selected='selected'" : "" }}>12-15 triệu</option>
			                          <option value="7" {{ \Request::get('luong') == '7' ? "selected='selected'" : "" }}>15-20 triệu</option>
			                          <option value="8" {{ \Request::get('luong') == '8' ? "selected='selected'" : "" }}>20-25 triệu</option>
			                          <option value="9" {{ \Request::get('luong') == '9' ? "selected='selected'" : "" }}>25-30 triệu</option>
			                          <option value="10" {{ \Request::get('luong') == '10' ? "selected='selected'" : "" }}>30-40 triệu</option>
			                          <option value="11" {{ \Request::get('luong') == '11' ? "selected='selected'" : "" }}>40-50 triệu</option>
			                          <option value="12" {{ \Request::get('luong') == '12' ? "selected='selected'" : "" }}>Trên 50 triệu</option>
			                        {{-- @endforeach
			                      @endif --}}
			                    </select>
			                  </div>
			                </div>

			                <div class="col-md-12">
			                  <div class="formrow">
			                    <select class="form-control" name="trinh">
			                    	<option value="">Tất cả trình độ</option>
			                      @if(isset($trinhdo))
			                        @foreach($trinhdo as $trinh)
			                          <option value="{{ $trinh->name }}" {{ \Request::get('trinh') == $trinh->name ? "selected='selected'" : "" }}>{{ $trinh->name }}
			                          </option>
			                        @endforeach
			                      @endif
			                    </select>
			                  </div>
			                </div>

			                <div class="col-md-12">
			                  <div class="formrow">
			                    <select class="form-control" name="nghiem">
			                      <option value="">Tất cả kinh nghiệm</option>
			                      @if(isset($kinhnghiem))
			                        @foreach($kinhnghiem as $nghiem)
			                          <option value="{{ $nghiem->name }}" {{ \Request::get('nghiem') == $nghiem->name ? "selected='selected'" : "" }}>{{ $nghiem->name }}
			                          </option>
			                        @endforeach
			                      @endif
			                    </select>
			                  </div>
			                </div>

			              </div>
			              <hr>


			              <br>
			              <input type="submit" class="btn" value="Tìm kiếm">
			            </div>
			          </div>
			        </div>
			      </div>
			    </div>
			</form>
		</div>
		{{-- <div class="col-md-9">
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
			      Slide
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
		</div> --}}
	</div>
	<div class="listpgWraper">
		<div class="col-md-3"></div>

	    <div class="col-md-9 col-sm-12">
	        <!-- Search List -->
	        <ul class="searchList">
	          @if($profiles->count() > 0)
	          <h3>Tổng hồ sơ: {{ $count }}</h3>
	            @foreach($profiles as $list)
	              <!-- Candidate -->
	              <li>
	                <div class="row">
	                  <div class="col-md-6 col-sm-6">
	                    <div class="jobimg"><img src="{{ asset(pare_url_file($list->user->avatar)) }}" alt="" width="70px" height="70px"></div>
	                    <div class="jobinfo">
	                      <h3><a href="">{{ $list->user->name }}</a></h3>
	                      <div class="cateinfo content-1">{{ $list->ge_title }}</div>
	                      <div class="location content-1" title="{{ $list->ge_provinces }} - {{ $list->ge_profession }}">{{ $list->ge_provinces }} - {{ $list->ge_profession }}</div>
	                    </div>
	                    <div class="clearfix"></div>
	                  </div>
	                  <div class="col-md-4 col-sm-4">
	                    <div class="minsalary">{{ number_format($list->ge_salary_min,0, ',', '.') }} vnđ<span>/ tháng</span></div>
	                  </div>
	                  <div class="col-md-2 col-sm-2">
	                    <div class="listbtn"><a href="{{ route('employer.detail.userprofile', [$list->ge_slug, $list->id]) }}">Xem hồ sơ</a></div>
	                  </div>
	                </div>

	              </li>
	            @endforeach
	          @else
	            Khong co
	          @endif
	        </ul>

	        {!! $profiles->links() !!}
	      </div>

	  </div>
</div>


</div>
@stop