@extends('layouts.admin')
@section('content')
<h1>Edit Post</h1>
<div class="row">
<div class="col-sm-3">
    <img src="{{$post->photo ? $post->photo->file : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScZk6pNal_bSVLrCjy3b0eaRW6Qz_LVD1JiwFAO-dJvztn1NfOXg'}}" class="img-responsive img-rounded"></img>
</div>

<div class="col-sm-9">
    
{!!Form::model($post,['method'=>'patch', 'action'=>['AdminPostsController@update',$post->id],'files'=>'true'])!!}
<div class='form-group'>
    {!!Form::label('title','Title:')!!}
    {!!Form::text('title',null,['class'=>'form-control'])!!}
</div>

<div class='form-group'>
    {!!Form::label('category_id','Category:')!!}
    {!!Form::select('category_id',$category,null,['class'=>'form-control'])!!}
</div>

<div class='form-group'>
    {!!Form::label('photo_id','Photo:')!!}
    {!!Form::file('photo_id',null,['class'=>'form-control'])!!}
</div>

<div class='form-group'>
    {!!Form::label('body','Description:')!!}
    {!!Form::textarea('body',null,['class'=>'form-control'])!!}
</div>

<div class='form-group'>
    {!!Form::submit('Update Post',['class'=>'btn btn-primary '])!!}
</div>


{!!Form::close()!!}

<!--Delete-->
{!!Form::Open(['method'=>'delete', 'action'=>['AdminPostsController@destroy',$post->id]])!!}

<div class='form-group'>
    {!!Form::submit('Delete post',['class'=>'btn btn-danger '])!!}
</div>

{!!Form::close()!!}

</div>
<!--Errors-->
<div class="row">
    @include('includes.form_erros')
</div>
@stop