@extends('layouts.app')
@section('content')
<style type="text/css">
	td
	{
		padding: 20px;
		width: 50%;
		text-align: left;
		font-weight: bold;
	}
	td img
	{
		float: left;
		padding: 5px;
	}
	.inner-12 {
	    padding: 12px;
	}
	.col-xs-3 {
	    padding: 10px;
	}
	.text-center {
	    margin-left: 25%;
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
			<div class="userccount">
      		<!-- login form -->
    			<p class="btn-un">Xem hàng trăm hồ sơ</p>
	          		<!-- login form  end-->
	    			<div class="row">
	    				<div class="col-md-8"><a class="btn btn-success btn-register" href="{{ route('search.hoso') }}">Tìm kiếm hồ sơ</a></div>
	    				<div class="col-md-4"><img src="{{ asset('images/dang-ky.png') }}" alt="dang-ky" width="50px"></div>
	    			</div>
	    			<p>Tham gia ngay và truy cập hàng ngàn hồ sơ hàng đầu!</p>
	      	</div>
  		</div>
		<div class="col-md-9">
			<!-- Revolution slider start -->
			<div class="tp-banner-container">
			  <div class="tp-banner" >
			    <ul>

			      <li data-slotamount="7" data-transition="3dcurtain-vertical" data-masterspeed="1000" data-saveperformance="on"> <img alt="Your alt text" src="images/slider/dummy.png" data-lazyload="images/slider/banner.jpg">
			        <div class="caption lfl large-title tp-resizeme slidertext1" data-x="left" data-y="100" data-speed="600" data-start="1600">Search Your Job<br />
			          In your Area</div>
			        <div class="caption lfb large-title tp-resizeme sliderpara" data-x="left" data-y="200" data-speed="600" data-start="2800">Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br />
			          Lorem Ipsum has been the industry's standard dummy text ever since.</div>
			        <div class="caption lfl large-title tp-resizeme slidertext5" data-x="left" data-y="280" data-speed="600" data-start="3500"><a href="#.">Contact Us</a></div>
			      </li>
			      <!--Slide end-->

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

		</div>
	</div>
	    <!-- title start -->
	    {{-- <div class="titleTop">
	      <h3>Dịch vụ <span>Tuyển dụng</span></h3>
	    </div> --}}

		<div class="three-plan">
		    <div class="container">
		      <h3>Dịch vụ <span>Tuyển dụng</span></h3>
		      <div class="row">
		      	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
		          <div class="boxes">
		            <div class="pricing-table1"> STARTER<strong>30 Days sample text</strong> </div>
		            <div class="main-unit text-center">
		              {{-- <div class="pricing-unit1"></div>
		              <div class="pricing-unit1-1">2.500.000</div>
		              <div class="pricing-unit1-2">VND </div>
		              <div class="clearfix"></div> --}}
		            </div>
		            <ul class="pricing-detail">
		              <li class="plan-detail"><i class="fa fa-check" aria-hidden="true"></i> Tin đăng hiển thị trên Timviecnhanh.xyz</li>
		              <li class="plan-detail"><i class="fa fa-check" aria-hidden="true"></i> Tin đăng được tìm kiếm bởi hàng triệu người</li>
		              <li class="plan-detail"><i class="fa fa-check" aria-hidden="true"></i> Được hưởng chính sách bảo hành dịch vụ.</li>
		              <li class="plan-detail"><i class="fa fa-check" aria-hidden="true"></i> Nhận được hồ sơ ứng tuyển</li>
		              <li class="plan-detail"><i class="fa fa-check" aria-hidden="true"></i> Tuyển dụng nhanh và hiệu quả</li>
		              <li class="plan-detail ico"><i class="fa fa-times" aria-hidden="true"></i></li>
		              <li class="order-1"><a href="{{ route('get.list.cart') }}">Đăng ký ngay</a></li>
		            </ul>
		          </div>
		        </div>
		       </div>
		    </div>
		  </div>

			    <!-- title start -->
	    <div class="titleTop">
	      <h3>Quy định chung</h3>
	      <table>
	      	<tr>
	      		<td>
	      			<img src="{{ asset('images/icon/mor.png') }}" alt="placeholder+image">
	      			Tin đăng hiển thị tại các vị trí nổi bật trong trang ngành nghề
	      		</td>
	      		<td>
	      			<img src="{{ asset('images/icon/bek.png') }}" alt="placeholder+image">
		      		Một tin tuyển dụng chỉ đăng thông tin cho một vị trí tuyển dụng
		      	</td>
	      	</tr>
	      	<tr>
	      		<td>
	      			<img src="{{ asset('images/icon/nolang.png') }}" alt="placeholder+image">
	      			Trên 1 tin đăng chỉ trình bày 1 loại ngôn ngữ
	      		</td>
	      		<td>
	      			<img src="{{ asset('images/icon/lit.png') }}" alt="placeholder+image">
	      			Không bỏ trống các mục thông tin
	      		</td>
	      	</tr>
	      	<tr>
	      		<td>
	      			<img src="{{ asset('images/icon/tal.png') }}" alt="placeholder+image">
	      			Tin đăng không chứa các ký tự là vô nghĩa (vd: $$$, ###, ...)
	      		</td>
	      		<td>
	      			<img src="{{ asset('images/icon/nosou.png') }}" alt="placeholder+image">
	      			Tin đăng chỉ được phép chứa các thông tin tuyển dụng, không được có các thông tin quảng cáo, tuyển sinh
	      		</td>
	      	</tr>
	      </table>
	    </div>



  	</div>
  </div>

<div class="bg-info footer-hotline inner-12" id="footer-hotline">

<div class="container">
    <div class="inner10">
        <div class="title text-primary">
                            <img src="https://cdn.timviecnhanh.com/asset/home/img/call.png" alt="Hotline miền Nam" class="img-call">
                    Hotline cho Nhà tuyển dụng miền Nam (từ Đà Nẵng trở vào)
                                    </div>
                    <span class="text col-xs-3 no-padding w230">
                <b class="text-danger">0915 299 339</b>
                Ms. Thanh Thúy            </span>
                    <span class="text col-xs-3 no-padding w230">
                <b class="text-danger">0917 998 672</b>
                Ms. Mi Trịnh            </span>
                    <span class="text col-xs-3 no-padding w230">
                <b class="text-danger">0917 588 671</b>
                Ms. Lê Nga            </span>
                    <span class="text col-xs-3 no-padding w230">
                <b class="text-danger">0917 593 895</b>
                Ms. Thanh Thủy            </span>
                    <span class="text col-xs-3 no-padding w230">
                <b class="text-danger">0902 443 938</b>
                Ms. Phương Thanh            </span>
                    <span class="text col-xs-3 no-padding w230">
                <b class="text-danger">0915 331 278</b>
                Ms. Quỳnh Nhi            </span>
                    <span class="text col-xs-3 no-padding w230">
                <b class="text-danger">0917 588 675</b>
                Ms. Hỷ Thúy            </span>
                    <span class="text col-xs-3 no-padding w230">
                <b class="text-danger">0911 521 278</b>
                Ms. Hồng Thảo            </span>
                    <span class="text col-xs-3 no-padding w230">
                <b class="text-danger">0915 299 336</b>
                Ms Thùy Linh            </span>
                    <span class="text col-xs-3 no-padding w230">
                <b class="text-danger">0917 588 674</b>
                Ms. Nguyễn My            </span>
                    <span class="text col-xs-3 no-padding w230">
                <b class="text-danger">0917 588 676</b>
                Ms. Tuyết Vân            </span>
                    <span class="text col-xs-3 no-padding w230">
                <b class="text-danger">0909 317 938</b>
                Ms. Hoàng Phụng            </span>

        <div class="blank17"></div>
        <div class="title text-primary">
                            <img src="https://cdn.timviecnhanh.com/asset/home/img/call.png" alt="Hotline miền Bắc" class="img-call">
                Hotline cho Nhà tuyển dụng miền Bắc (từ Huế trở ra)
                                    </div>
                    <span class="text col-xs-3 no-padding w230">
                <b class="text-danger">0918 968 802</b>
                Ms. Nguyễn Yến            </span>
                    <span class="text col-xs-3 no-padding w230">
                <b class="text-danger">0918 968 796</b>
                Ms. Ánh Ngọc            </span>
                    <span class="text col-xs-3 no-padding w230">
                <b class="text-danger">0915 706 812</b>
                Ms. Kim Dung            </span>
                    <span class="text col-xs-3 no-padding w230">
                <b class="text-danger">0941 280 300</b>
                Ms. Lương Chinh            </span>
                    <span class="text col-xs-3 no-padding w230">
                <b class="text-danger">0911 862 912</b>
                Ms. Hồ Luyến            </span>
                    <span class="text col-xs-3 no-padding w230">
                <b class="text-danger">0911 737 524</b>
                Ms. Ninh Liễu            </span>
                    <span class="text col-xs-3 no-padding w230">
                <b class="text-danger">0919 290 895</b>
                Ms. Phan Thảo            </span>
                    <span class="text col-xs-3 no-padding w230">
                <b class="text-danger">0915 177 416</b>
                Ms. Trịnh Trang            </span>
                    <span class="text col-xs-3 no-padding w230">
                <b class="text-danger">0918 968 792</b>
                Ms. Lê Huyền            </span>
                    <span class="text col-xs-3 no-padding w230">
                <b class="text-danger">0911 423 938</b>
                Ms. Phạm Dung            </span>
                    <span class="text col-xs-3 no-padding w230">
                <b class="text-danger">0949 420 710</b>
                Ms. Kim Ánh            </span>
                    <span class="text col-xs-3 no-padding w230">
                <b class="text-danger">0918 968 803</b>
                Ms. Nguyễn Nga            </span>
                <div class="blank0"></div>
    </div>
</div></div>


@stop