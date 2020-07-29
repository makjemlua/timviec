@extends('admin::layouts.master')
@section('content')
<style type="text/css">
	span.float-left
	{
		color: red;
		font-size: 20px;
		font-weight: bold;
	}
</style>
<div class="container-fluid">
	<nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Nhà tuyển dụng</li>
      </ol>
    </nav>
	<div class="row">
		<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-primary o-hidden h-100">
				<div class="card-body">
					<div class="card-body-icon">
						<i class="fa fa-fw fa-comments"></i>
					</div>
					<div class="mr-5"> Account</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="{{ route('admin.get.account.employer') }}">
					<span class="float-left">View Details</span>
					<span class="float-right">
						<i class="fa fa-angle-right"></i>
					</span>
				</a>
			</div>
		</div>
		<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-warning o-hidden h-100">
				<div class="card-body">
					<div class="card-body-icon">
						<i class="fa fa-fw fa-list"></i>
					</div>
					<div class="mr-5"> Bài đăng tuyển dụng</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="{{ route('admin.get.profile.employer') }}">
					<span class="float-left">View Details</span>
					<span class="float-right">
						<i class="fa fa-angle-right"></i>
					</span>
				</a>
			</div>
		</div>
		<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-success o-hidden h-100">
				<div class="card-body">
					<div class="card-body-icon">
						<i class="fa fa-fw fa-shopping-cart"></i>
					</div>
					<div class="mr-5"> Thông báo</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="{{ route('admin.get.employer.noti') }}">
					<span class="float-left">View Details</span>
					<span class="float-right">
						<i class="fa fa-angle-right"></i>
					</span>
				</a>
			</div>
		</div>
		<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-danger o-hidden h-100">
				<div class="card-body">
					<div class="card-body-icon">
						<i class="fa fa-fw fa-life-ring"></i>
					</div>
					<div class="mr-5">Hóa đơn thanh toán</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="{{ route('employer.hoadon') }}">
					<span class="float-left">View Details</span>
					<span class="float-right">
						<i class="fa fa-angle-right"></i>
					</span>
				</a>
			</div>
		</div>
	</div>
	<div id="allData" style="display: none">
		{{ $maps }}
	</div>
</div>
<div id="googleMap" style="width:1200px;height:500px; margin: 50px 100px; border: solid 1px black;"></div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
{{-- javascript code --}}
<script src="https://maps.google.com/maps/api/js?key=AIzaSyARuxTvO42oUK9Bj5j-fCGKPbvA-VsMIhY&libraries=places&callback=initAutocomplete" type="text/javascript"></script>
<script>
function initialize() {


    var zoom = 11;

    var LatLng = new google.maps.LatLng(10.8232662, 106.6860602);

    var bounds = new google.maps.LatLngBounds();

  var mapProp = {
    center: LatLng,
    zoom:12,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };

  var infowindow = new google.maps.InfoWindow;

  var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);

  var AllData = JSON.parse(document.getElementById('allData').innerHTML);//show all data

	Array.prototype.forEach.call(AllData, function(data){

  	var marker = new google.maps.Marker({
      position: new google.maps.LatLng(data.map.latitude , data.map.longitude),
      map: map,
      icon: 'http://maps.google.com/mapfiles/kml/pal3/icon21.png',

    })

    	var content = document.createElement('div');
    	content.setAttribute("style","width:500px;height:auto; font-weight:bold; font-size: 15px;");
	    var strong = document.createElement('p');
	    var br = document.createElement('br');
	    var a = document.createElement('a');
	    var p = document.createElement('p');
	    var p1 = document.createElement('p');
	    var span = document.createElement('span');
	    var span1 = document.createElement('span');
	    var img = document.createElement('img');
	    var br = document.createElement('br');

	    var idProfile = data.id;
	    var slug = data.pr_slug;
    	var urlProfile = "../../thong-tin/"+slug+"-"+idProfile;

	    var price="Mức lương"+":"+data.pr_salary+" VNĐ";
	    strong.textContent = data.map.address;
	    content.appendChild(strong);
	    p.textContent=price;
	    p.setAttribute("style","float:left;");
    	content.appendChild(p);

    	span.textContent ="Công ty : "+data.employer.em_company;
	    span.setAttribute("style","float:right;");
	    p.appendChild(span);

	    p1.textContent ="Ngành nghề : "+data.pr_career;
	    p1.setAttribute("style","float:left;");
	    p.appendChild(p1);

	    a.setAttribute('href',urlProfile);
	    a.textContent = 'Xem chi tiết';
	    a.setAttribute("target","_blank");
	    a.setAttribute("style","float:right");
	    p.appendChild(a);

	    img.src ='../../uploads/'+data.employer.em_avatar;
	    img.style.width='337px';
	    img.style.height='100%';
	    img.setAttribute("style","margin-left: 40px; width: 160px; height: 160px;");
	    content.appendChild(img);

	    marker.addListener("click", function() {
	    infowindow.setContent(content);
	    infowindow.open(map, marker);
	  })
 	})

}
google.maps.event.addDomListener(window, 'load', initialize);

</script>
@stop