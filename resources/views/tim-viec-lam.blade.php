@extends('layouts.app')
@section('content')
<style type="text/css">
  h3
  {
    color: blue;
  }
  .thead-dark
  {
    font-weight: bold;
    color: blue;
  }
</style>
<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Contact Us</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="{{ route('home.index') }}">Home</a> / <span>Search Job</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->
<div class="inner-page">
  	<div class="container">
      <div class="col-md-8">
        @if($profiles->count() > 0)
      <h3>Kết quả tìm kiếm: ({{ $count }})</h3>
      <table class="table table-hover">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Vị trí tuyển dụng</th>
            <th scope="col">Khu vực</th>
            <th scope="col">Mức lương</th>
            <th scope="col">Hạn nộp hồ sơ</th>
          </tr>
        </thead>
        <tbody>
          @foreach($profiles as $profile)
          <tr>
            <td><a href="{{ route('employer.thongtin.profile', [$profile->pr_slug, $profile->id]) }}">{{ $profile->pr_title }}</a></td>
            <td>{{ $profile->pr_provinces }}</td>
            <td>{{ $profile->pr_salary }}</td>
            <td>{{ date('d-m-Y',strtotime($profile->pr_expired_at)) }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {!! $profiles->appends(request()->query())->links() !!}
      <a class="label label-primary" href="{{ route('home.index') }}">Quay lại</a>
    @else
      <h3>Kết quả tìm kiếm: ({{ $profiles->count() }})</h3><br>
      Hiện chưa tìm thấy việc làm phù hợp với tiêu chí này.
      <a class="label label-primary" href="{{ route('home.index') }}">Quay lại</a>
    @endif
      </div>
      {{-- <div class="col-md-4">
        Việc làm phù hợp với bạn
      </div> --}}

	</div>
</div>
@stop