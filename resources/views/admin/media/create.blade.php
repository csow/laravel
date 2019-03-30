@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css" type="text/css" />
@stop()

@section('content')

<h1>Create Media</h1>
{!!Form::Open(['method'=>'post', 'action'=>'AdminMediasController@store','class'=>'dropzone'])!!}


{!!Form::close()!!}

@stop

@section('scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.js"></script>
@stop