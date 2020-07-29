@extends('admin::layouts.master')

@section('content')
<style type="text/css">
  .error
  {
    font-weight: bold;
    color: red;
    font-size: 15px;
    width: 100%;
  }
</style>
<div class="container-fluid">
	<nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.get.list.role') }}">Admin</a></li>
        <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
      </ol>
    </nav>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

	</div>
	@include ("admin::role.form")
</div>
@stop