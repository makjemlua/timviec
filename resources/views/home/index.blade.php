@extends('layouts.app')
@section('content')
@php
    $page = "home";
@endphp
<style type="text/css">
  a.content-1
  {
    text-overflow: ellipsis;
    overflow: hidden;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    display: -webkit-box;
  }
  input.btn
  {
    font-weight: bold;
  }
  input.btn:hover
  {
    color: white;
    background-color: blue;
  }
  .jobslist li
  {
    margin-top: 0;
  }

  .autocomplete-suggestions { border: 1px solid #999; background: #FFF; overflow: auto; height: 150px;}
    .autocomplete-suggestion { padding: 15px 5px; white-space: nowrap; overflow: hidden; height: 50px;}
    .autocomplete-selected { background: #F0F0F0;}
    /*.autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }*/
    .autocomplete-group { padding: 2px 5px; }
    .autocomplete-group strong { display: block; border-bottom: 1px solid #000; }
</style>
<!-- Search start -->

<form>
  <div class="searchwrap">
    <div class="container">
      <h3>Tìm kiếm hàng ngàn công việc.</h3>
      <div class="searchbar row">
        <div class="col-md-5">
          <input type="text" class="form-control" name="search" id="keyword" value="{{ \Request::get('search') }}" placeholder="Nhập từ khóa cần tìm">
        </div>
        <div class="col-md-3">
          <select class="form-control" name="job">
            <option value="">Tất cả ngành nghề</option>
            @if(isset($jobs))
              @foreach($jobs as $job)
                <option value="{{ $job->name }}" {{ \Request::get('job') == $job->name ? "selected='selected'" : "" }}>{{ $job->name }}</option>
              @endforeach
            @endif
          </select>
        </div>
        <div class="col-md-2">
          <select class="form-control" name="province">
            <option value="">Tất cả tỉnh thành</option>
            @if(isset($provinces))
              @foreach($provinces as $province)
                <option value="{{ $province->name }}" {{ \Request::get('province') == $province->name ? "selected='selected'" : "" }}>{{ $province->name }}</option>
              @endforeach
            @endif
          </select>
        </div>
        <div class="col-md-2">
          <input type="submit" class="btn" value="Tìm kiếm công việc">
        </div>
      </div>

    </div>
  </div>
</form>





<!-- Search End -->
{{-- ------------------------------------------------------------------------ --}}
@if($profileNew)

    <!-- Việc làm mới start -->
    <div class="section greybg">
      <div class="container" id="tag_container">
        @include('home.newajax')
    </div>
  </div>
    <!-- Việc làm mới ends -->
@endif
{{-- ------------------------------------------------------------------------------- --}}

<!-- Top Thương hiệu start -->
<div class="section greybg">
  <div class="container">
    <div class="titleTop">
      <h3>Top <span>Thương hiệu</span></h3>
    </div>
    @if($companys)

    <ul class="employerList">
      @foreach($companys as $company)
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ $company->em_company }}"><a href="#"><img src="{{ old('em_avatar',(isset($company->em_avatar)) ? asset(pare_url_file($company->em_avatar)) : asset('images/default.png') ) }}" alt="Company Name" width="115px" height="92px"></a></li>
      @endforeach

    </ul>
    @endif
  </div>
</div>
<!-- Top Thương hiệu ends -->


{{-- ------------------------------------------------------------------------------- --}}

<!-- Popular Searches start -->
<div class="section">
  <div class="container">
    <!-- title start -->
    <div class="titleTop">
      <h3>Việc làm theo <span>khu vực</span></h3>
    </div>
    <!-- title end -->
    <div class="topsearchwrap row">
      <div class="col-md-12">
        <!--Categories start-->
        <ul class="row catelist">
          @foreach($provinces as $province)
            <li class="col-md-3 col-sm-3"><a href="{{ route('search.province', [$province->slug, $province->name]) }}">{{ $province->name }}</a></li>
          @endforeach
        </ul>
        <!--Categories end-->
      </div>

    </div>
  </div>
</div>
<!-- Popular Searches ends -->

{{-- ------------------------------------------------------------------------------- --}}

<!-- Popular Searches start -->
<div class="section">
  <div class="container">
    <!-- title start -->
    <div class="titleTop">
      <h3>Việc làm theo <span>ngành nghề</span></h3>
    </div>
    <!-- title end -->
    <div class="topsearchwrap row">
      <div class="col-md-12">
        <!--Categories start-->
        <ul class="row catelist">
          @foreach($jobs as $job)
            <li class="col-md-3 col-sm-3"><a href="{{ route('search.index', [$job->slug, $job->name]) }}">{{ $job->name }}</a></li>
          @endforeach
        </ul>
        <!--Categories end-->
      </div>

    </div>
  </div>
</div>
<!-- Popular Searches ends -->
<div id="allData" style="display: none">
  {{ $maps }}
</div>
<div id="googleMap" style="width:auto;height:600px;"></div>

{{-- ------------------------------------------------------------------------------- --}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
    $(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            }else{
                getData(page);
            }
        }
    });
    $(document).ready(function()
    {
        $(document).on('click', '.pagination a',function(event)
        {
            event.preventDefault();
            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
            var myurl = $(this).attr('href');
            var page=$(this).attr('href').split('page=')[1];
            getData(page);
        });
    });
    function getData(page){
        $.ajax(
        {
            url: '?page=' + page,
            type: "get",
            datatype: "html"
        }).done(function(data){
            $("#tag_container").empty().html(data);
            location.hash = page;
        }).fail(function(jqXHR, ajaxOptions, thrownError){
              alert('Không có dữ liệu trả về');
        });
    }
</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
{{-- javascript code --}}
<script src="https://maps.google.com/maps/api/js?key=AIzaSyARuxTvO42oUK9Bj5j-fCGKPbvA-VsMIhY&libraries=places" type="text/javascript"></script>
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

      var content = '<div style="width:500px;height:auto; font-weight:bold; font-size: 15px;">'+
                      '<div class="col-md-12">'+
                        'Địa chỉ: '+ data.map.address+
                      '</div>'+

                      '<div class="row">'+
                        '<div class="col-md-6">'+
                          'Ngành nghề: '+ data.pr_career+
                        '</div>'+
                        '<div class="col-md-6">'+
                          'Trình độ: '+ data.pr_level+
                        '</div>'+
                      '</div>'+

                      '<div class="row">'+
                        '<div class="col-md-6">'+
                          'Mức lương: '+ data.pr_salary+
                        '</div>'+
                        '<div class="col-md-6">'+
                          'Giới tính: '+ data.pr_gender+
                        '</div>'+
                      '</div>'+

                      '<div class="row">'+
                        '<div class="col-md-6">'+
                          'Kinh nghiệm: '+ data.pr_experience+
                        '</div>'+
                        '<div class="col-md-6">'+
                          'Số lượng: '+ data.pr_quantity+
                        '</div>'+
                      '</div>'+

                      '<div class="row">'+
                        '<div class="col-md-6">'+
                          'Hồ sơ: <a href="thong-tin/'+data.pr_slug+'-'+data.id+'" target="_blank">'+data.pr_title+'</a>'+
                        '</div>'+
                        '<div class="col-md-6">'+
                          'Thời hạn: '+ data.pr_expired_at+
                        '</div>'+
                      '</div>'+

                    '</div>';



      marker.addListener("click", function() {
      infowindow.setContent(content);
      infowindow.open(map, marker);
    })
  })

}
google.maps.event.addDomListener(window, 'load', initialize);

</script>


@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
{{--jquery.autocomplete.js--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.devbridge-autocomplete/1.4.10/jquery.autocomplete.min.js"></script>
<script>
    $(function () {
        $("#keyword").autocomplete({
            serviceUrl:'search',
            paramName: "keyword",
            onSelect: function(suggestion) {
                $("#keyword").val(suggestion.value);
            },
            transformResult: function(response) {
                return {
                    suggestions: $.map($.parseJSON(response), function(item) {
                        return {
                            value: item.pr_title,
                        };
                    })
                };
            },
        });
    })
</script>
@stop