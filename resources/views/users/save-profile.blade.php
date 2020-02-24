@extends('users.dashboard')
@section('content')
@if($usersaves)
@foreach($usersaves as $save)
{{ $save->usa_title }}
@endforeach
@endif
@stop