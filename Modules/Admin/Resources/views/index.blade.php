@extends('admin::layouts.master')

@section('content')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
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
  {{-- <div class="col-md-8">
    <h3>Danh sách đơn hàng mới nhất</h3>
    @if(isset($transactionNews))
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>STT</th>
          <th>Tên khách hàng</th>
          <th>Số điện thoại</th>
          <th>Tổng tiền</th>
          <th>Trạng thái</th>
          <th>Ngày đặt</th>
        </tr>
      </thead>
      <tbody>
        <span style="display: none">{{ $a=1 }}</span>
          @foreach($transactionNews as $transaction)
          <tr>
              <td><!-- id sản phẩm -->
                <b>{{ $a++ }}</b>
              </td>
              <td><!-- Tên sản phẩm -->
                <b>{{ $transaction->user->name }}</b>
              </td>
              <td><!-- Tên sản phẩm -->
                <b>{{ $transaction->tr_phone }}</b>
              </td>
              <td><!-- Tên sản phẩm -->
                <b>{{ number_format($transaction->tr_total,0, ',', '.') }} VNĐ</b>
              </td>
              <td><!-- Tên sản phẩm -->
                @if($transaction->tr_status == 1)
                  <a href="" class="label label-success">Đã xử lý</a>
                @else
                  <a href="{{ route('admin.get.active.transaction', $transaction->id) }}" class="label label-default" onclick="return confirm('Bạn có muốn thực hiện thao tác này ? Nhấn OK để xử lý');">Chưa xử lý</a>
                @endif
              </td>
              <td>
                {{ $transaction->created_at->format('d-m-Y') }}
              </td>
            </tr>
        @endforeach
      </tbody>
    </table>
    @endif
  </div> --}}
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
{{-- @section('script')
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
                format: '{point.y} $'
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
@stop --}}