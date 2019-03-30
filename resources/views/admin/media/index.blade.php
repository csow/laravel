@extends('layouts.admin')
@section('content')
<h1>Media</h1>

<form action="/delete/media" method="post" class="from-inline">
  {{csrf_field()}}
  
  {{method_field('delete')}}
  
  <input type="submit" value="Delete" class="btn btn-danger">

<table class="table">
    <thead>
      <tr>
        <th></th>
        <th>Name</th>
        <th>Created</th>
        <th>Updated</th>
        
       
      </tr>
    </thead>
    <tbody>
        @if($photos)
        @foreach($photos as $photo)
      <tr>
        <td><input type="checkbox" name="checkboxArray[]" value="{{$photo->id}}"></td>
        <td><img height='50' src="{{$photo ? $photo->file : 'http://placehold.it/400x400'}}"></td>  
        <td>{{$photo->created_at->diffForHumans()}}</td>
        <td>{{$photo->updated_at->diffForHumans()}}</td>
        </tr>
      @endforeach
      @endif
    
    </tbody>
  </table>
  </form>
  
@stop
