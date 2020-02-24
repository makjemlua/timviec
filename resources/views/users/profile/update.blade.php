@extends('layouts.app')
@section('content')
<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Chỉnh sửa hồ sơ</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="{{ route('home.index') }}">Home</a> / <span>Chỉnh sửa hồ sơ</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->

@include('users.profile.form')
@stop