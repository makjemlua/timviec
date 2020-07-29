@extends('admin::layouts.master')

@section('content')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<div class="col-md-12">
  <div class="row">
    <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5">{{ $totalTransactionDone }} đơn đã thanh toán</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
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
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5">{{ $totalTransactionWait }} đang chờ xử lý!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
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
              <div class="mr-5">{{ $totalTransaction }} tổng hóa đơn!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
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
              <div class="mr-5"> đã hủy!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
  </div>
<div class="row">
  <div class="col-md-3">
    <form action="" method="">
    <input class="form-control" type="date" name="date_from">
    <input class="form-control" type="date" name="date_to">
    <input class="btn btn-success" type="submit" name="" value="Thống kê">
    </form>
  </div>
  <div class="col-md-9">
    @if($tinhtien >= 0)
      <h3>Doanh thu của bạn từ ngày {{ date('d-m-Y',strtotime($date_from)) }} đến ngày {{ date('d-m-Y',strtotime($date_to)) }} là: </h3> <h1 style="color: red;">{{ number_format(($tinhtien),0,',','.') }} VNĐ</h1>
    @endif
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <a href ="{{ route('export.doanhthu') }}" class="btn btn-info export pull-right" id="export-button"> Export đơn hàng </a>
  </div>
</div>


</div>
    <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Bảng dữ liệu</h1>
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="col-md-12">
              <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            </div>

          </div>




<div class="row">
  <div class="col-md-6">
        <h2 class="page-header">Danh sách liên hệ mới nhất</h2>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>STT</th>
            <th>Tên hiển thị</th>
            <th>Email</th>
            <th>Tiêu đề</th>
            <th>Nội dung</th>
          </tr>
        </thead>
        <tbody>
              @if(isset($contacts))
          <span style="display: none">{{ $a=1 }}</span>
            @foreach($contacts as $contact)
              <tr>
                <td><!-- id  -->
                  <b>{{ $a++ }}</b>
                </td>
                <td><!-- Tên  -->
                  <b>{{ $contact->co_name }}</b>
                </td>
                <td><!-- Tên  -->
                  <b>{{ $contact->co_email }}</b>
                </td>
                <td><!-- Tên -->
                  <b>{{ $contact->co_title }}</b>
                </td>
                <th><!-- Hình ảnh -->
                  <b>{{ $contact->co_content }}</b>
                </th>
              </tr>
            @endforeach
          @endif
        </tbody>
      </table>
    </div>
  </div>
  <div class="col-md-6">
        <h2 class="page-header">Danh sách đánh giá mới nhất</h2>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>STT</th>
            <th>Tên thành viên</th>
            <th>Phòng</th>
            <th>Nội dung</th>
            {{-- <th>Rating</th> --}}
          </tr>
        </thead>
        <tbody>
              @if(isset($ratings))
          <span style="display: none">{{ $a=1 }}</span>
            @foreach($ratings as $rating)
              <tr>
                <td><!-- id sản phẩm -->
                  <b>{{ $a++ }}</b>
                </td>
                <td><!-- Tên sản phẩm -->
                  <b>{{ isset($rating->user->name) ? $rating->user->name : '' }}</b>
                </td>
                <td><!-- Tên sản phẩm -->
                  <b>{{ isset($rating->room->ph_name) ? $rating->room->ph_name : '' }}</b>
                </td>
                <td><!-- Tên sản phẩm -->
                  <b>{{ $rating->ra_content }}</b>
                </td>
                {{-- <th>
                  <b>{{ $rating->ra_number }}</b>
                </th> --}}
              </tr>
            @endforeach
          @endif
        </tbody>
      </table>
    </div>
  </div>
</div>

        </div>
@endsection
@section('script')
<script>
  // Create the chart
  let data = "{{ $dataMoney }}";
  dataChart = JSON.parse(data.replace(/&quot;/g, '"'));
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Biểu đồ doanh thu'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Tổng tiền'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y} VND'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y} $</b> <br/>'
    },

    series: [
        {
            name: "Doanh thu",
            colorByPoint: true,
            data: dataChart
        }
    ],
});
</script>

@stop