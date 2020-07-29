@extends('layouts.app')
@section('content')
<style type="text/css">
  form
  {
    padding: 0 5px;
  }
  input.btn
  {
    font-weight: bold;
    background-color: #46e761;
  }
  input.btn:hover
  {
    color: white;
    background-color: blue;
  }
  div.jobButtons
  {
        display: inline-flex;
  }
</style>
<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Chi tiết công việc</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="">Trang chủ</a> / <span>Công việc</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->

<div class="listpgWraper">
  <div class="container">

    <!-- Job Header start -->
    <div class="job-header">
      <div class="jobinfo">
        <div class="row">
          <div class="col-md-8">
            <h2>{{ $info->pr_title }}</h2>
            <div class="ptext">Ngày đăng: {{ date('d-m-Y',strtotime($info->created_at)) }} | Lượt xem: {{ $info->pr_view_count }}</div>
            <div class="salary">Lương tháng: <strong>{{ $info->pr_salary }}</strong></div>
          </div>
          <div class="col-md-4">
            <div class="companyinfo">
              <div class="companylogo"><img src="{{ old('em_avatar',(isset($info->employer->em_avatar)) ? asset(pare_url_file($info->employer->em_avatar)) : asset('images/default.png') ) }}" alt="your alt text" width="65px" height="52px"></div>
              <div class="title"><a href="">{{ $info->employer->em_company }}</a></div>
              <div class="ptext">{{ $info->employer->em_address }}</div>
              <div class="opening"><a href="">{{ $info->pr_quantity }} cơ hội việc làm</a></div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="jobButtons">
          @if(Auth::guard('web')->check()) {{-- Nếu tồn tại user thì mới cho applie --}}
            @if($hoso)
              @if(!$applies->count() > 0) {{-- Nếu chưa applie thì mới cho applie --}}
              <form action="{{ url('/nop-ho-so/{slug}-{id}')}}" method="POST">
                @csrf
                <input type="hidden" name="ap_profile_id" value="{{ $info->id }}">
                <input type="hidden" name="ap_employer_id" value="{{ $info->employer->id }}">
                <input type="hidden" name="ap_title" value="{{ $info->pr_title }}">
                <input type="hidden" name="ap_name" value="{{ $info->employer->name }}">
                <input type="hidden" name="ap_company" value="{{ $info->employer->em_company }}">
                <input type="hidden" name="ap_career" value="{{ $info->pr_career }}">
                <input type="hidden" name="ap_provinces" value="{{ $info->pr_provinces }}">
                <input type="hidden" name="ap_expired_at" value="{{ $info->pr_expired_at }}">
                <input class="btn" type="submit" name="applies" value="Nộp hồ sơ">
              </form>
              @else
                <a href="#" class="btn"><i class="fa fa-envelope" aria-hidden="true"></i> Đã nộp hồ sơ</a>
              @endif
            @else
              <a href="{{ route('user.profile.index') }}" class="btn btn-success" onclick="return confirm('Bạn cần phải tạo hồ sơ trước và được admin duyệt ? Nhấn OK để tạo hồ sơ');"><i class="fa fa-envelope" aria-hidden="true"></i> Nộp hồ sơ</a>
            @endif
          @endif


        @if($usersaves)
          @if(Auth::guard('web')->check()) {{-- Nếu tồn tại user thì mới cho lưu --}}
            @if(!$usersaves->count() > 0) {{-- Nếu chưa lưu thì mới cho lưu --}}
            <form action="{{ url('/luu-viec-lam/{slug}-{id}')}}" method="POST">
              @csrf
              <input type="hidden" name="usa_profile_id" value="{{ $info->id }}">
              <input type="hidden" name="usa_title" value="{{ $info->pr_title }}">
              <input type="hidden" name="usa_company" value="{{ $info->employer->em_company }}">
              <input type="hidden" name="usa_career" value="{{ $info->pr_career }}">
              <input type="hidden" name="usa_expired_at" value="{{ $info->pr_expired_at }}">
              <input class="btn" type="submit" name="usersaves" value="Lưu việc làm">
            </form>
            @else
              <a href="#" class="btn"><i class="fa fa-envelope" aria-hidden="true"></i> Đã lưu</a>
            @endif
          @endif
        @endif

        {{-- <a class="btn btn-primary chat" href="{{ route('chat.realtime', $info->id) }}">Chat</a> --}}
      </div>
    </div>

    <!-- Job Detail start -->
    <div class="row">
      <div class="col-md-8">
        <!-- Job Description start -->
        <div class="job-header">
          <div class="contentbox">
            <h3>Chi tiết công việc</h3>
            <p>{!! $info->pr_description !!}</p>
            <h3>Yêu cầu</h3>
            <p>{!! $info->pr_skill !!}</p>
            <h3>Quyền lợi</h3>
            <p>{!! $info->pr_benefit !!}</p>
            <h3>Thông tin liên hệ</h3>
            <ul>
              <li>Người liên hệ: {{ $info->employer->name }}</li>
              <li>Địa chỉ: {{ $info->employer->em_address }}</li>
              <li>Email: {{ $info->employer->email }}</li>
              <li>Số điện thoại: {{ $info->employer->em_phone }}</li>
              <li>Hình thức liên hệ: {{ $info->employer->em_contact_type }}</li>
            </ul>
          </div>
        </div>
        <!-- Job Description end -->



      </div>
      <!-- related jobs end -->

      <div class="col-md-4">
        <!-- Job Detail start -->
        <div class="job-header">
          <div class="jobdetail">
            <h3>Chi tiết công việc</h3>
            <ul class="jbdetail">
              <li class="row">
                <div class="col-md-6 col-xs-6">Job Id</div>
                <div class="col-md-6 col-xs-6"><span>EMP{{ $info->id }}</span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">Khu vực</div>
                <div class="col-md-6 col-xs-6"><span>{{ $info->pr_provinces }}</span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">Công ty</div>
                <div class="col-md-6 col-xs-6"><a href="">{{ $info->employer->em_company }}</a></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">Trạng thái</div>
                <div class="col-md-6 col-xs-6"><span>Đang tuyển</span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">Hình thức làm việc</div>
                <div class="col-md-6 col-xs-6"> <span>{{ $info->pr_work_time }}</span> </div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">Ngành nghề</div>
                <div class="col-md-6 col-xs-6"><span>{{ $info->pr_career }}</span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">Số lượng</div>
                <div class="col-md-6 col-xs-6"><span>{{ $info->pr_quantity }}</span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">Trình độ</div>
                <div class="col-md-6 col-xs-6"><span>{{ $info->pr_level }}</span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">Y/c kinh nghiệm</div>
                <div class="col-md-6 col-xs-6"><span>{{ $info->pr_experience }}</span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">Giới tính</div>
                <div class="col-md-6 col-xs-6"><span>{{ $info->pr_gender }}</span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">Tính chất công việc</div>
                <div class="col-md-6 col-xs-6"><span>{{ $info->pr_attribute }}</span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">Thời hạn</div>
                <div class="col-md-6 col-xs-6"><span>{{ date('d-m-Y',strtotime($info->pr_expired_at)) }}</span></div>
              </li>
            </ul>
          </div>
        </div>

        <!-- Contact Company start -->
        {{-- <div class="job-header">
          <div class="jobdetail">
            <h3>Liên hệ công ty</h3>
            <div class="formpanel">
              <div class="formrow">
                <input type="text" class="form-control" placeholder="Your Name">
              </div>
              <div class="formrow">
                <input type="text" class="form-control" placeholder="Your Email">
              </div>
              <div class="formrow">
                <input type="text" class="form-control" placeholder="Phone">
              </div>
              <div class="formrow">
                <input type="text" class="form-control" placeholder="Subject">
              </div>
              <div class="formrow">
                <textarea class="form-control" placeholder="Message"></textarea>
              </div>
              <input type="submit" class="btn" value="Gửi">
            </div>
          </div>
        </div> --}}

        <!-- Google Map start -->
        <div class="job-header">
          <div class="jobdetail">
            <h3>Google Map</h3>
            <div class="gmap">
              <input type="hidden" name="address" id="address" value="{{ $map->address }}">
              <input type="hidden" name="lat" id="lat" value="{{ $map->latitude }}">
              <input type="hidden" name="long" id="long" value="{{ $map->longitude }}">
              <div id="googleMap" style="width:318px;height:300px;"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
{{-- javascript code --}}
<script src="https://maps.google.com/maps/api/js?key=AIzaSyARuxTvO42oUK9Bj5j-fCGKPbvA-VsMIhY&libraries=places&callback=initAutocomplete" type="text/javascript"></script>
<script>
function initialize() {
    var address = document.getElementById("address").value;
    var latitude = document.getElementById("lat").value;
    var longitude = document.getElementById("long").value;
    var zoom = 11;

    var LatLng = new google.maps.LatLng(latitude, longitude);

    var infowindow = new google.maps.InfoWindow({
      content: address
    });

  var mapProp = {
    center: LatLng,
    zoom:15,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
  var marker = new google.maps.Marker({
      position: LatLng,
      map: map,
      title: 'Xem chi tiết!',
      icon: 'http://maps.google.com/mapfiles/kml/pal3/icon21.png',
      draggable: true
    });
  google.maps.event.addListener(marker, 'dragend', function(event) {

      document.getElementById('la').value = event.latLng.lat();
      document.getElementById('lo').value = event.latLng.lng();



});
  marker.addListener("click", function() {
    infowindow.open(map, marker);
  });
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
@stop