@extends('layouts.admin')
@section('content')
<h1 class="text-center">Welcome to Admin {{Auth::user()->name}}</h1>
@stop