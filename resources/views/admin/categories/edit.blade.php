@extends('layouts.admin')
@section('content')
<h1>Categories</h1>
<div class="col-sm-6">
 {!!Form::model($category,['method'=>'patch', 'action'=>['AdminCategoriesController@update',$category->id]])!!}
<div class='form-group'>
    {!!Form::label('name','Category:')!!}
    {!!Form::text('name',null,['class'=>'form-control'])!!}
</div>
<div class='form-group'>
    {!!Form::submit('Edit Category',['class'=>'btn btn-primary '])!!}
</div>

{!!Form::close()!!}

<!--Delete-->
{!!Form::Open(['method'=>'delete', 'action'=>['AdminCategoriesController@destroy',$category->id]])!!}

<div class='form-group'>
    {!!Form::submit('Delete category',['class'=>'btn btn-danger '])!!}
</div>

{!!Form::close()!!}

@stop