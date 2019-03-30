@extends('layouts.admin')
@section('content')
<h1>Categories</h1>
<div class="col-sm-6">
 {!!Form::Open(['method'=>'post', 'action'=>'AdminCategoriesController@store'])!!}
<div class='form-group'>
    {!!Form::label('name','Category:')!!}
    {!!Form::text('name',null,['class'=>'form-control'])!!}
</div>
<div class='form-group'>
    {!!Form::submit('Create Category',['class'=>'btn btn-primary '])!!}
</div>

{!!Form::close()!!}
</div>

<div class="col-sm-6">
       <table class="table">
    <thead>
      <tr>
        <th>Name</th>
     </tr>
    </thead>
    <tbody>
        @if($categories)
        @foreach($categories as $category)
      <tr>
        <td><a href="{{route('admin.categories.edit',$category->id)}}">{{$category->name}}</a></td>
     </tr>
      @endforeach
      @endif
    
    </tbody>
  </table>
</div>
@stop