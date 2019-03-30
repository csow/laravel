@extends('layouts.admin')

@section('content')
@if(Session::has('deleted_comment'))
<div class="container alert alert-success">
  <p class="text-center">{{session('deleted_comment')}}</p>
</div>
@endif
@if(Session::has('approve'))
<div class="container alert alert-success">
  <p class="text-center">{{session('approve')}}</p>
</div>
@endif
@if(Session::has('unapprove'))
<div class="container alert alert-success">
  <p class="text-center">{{session('unapprove')}}</p>
</div>
@endif
<h1>Comments</h1>
@if(count($comments)>0)
<table class="table">
    <thead>
      <tr>
        <th>Author</th>
        <th>Email</th>
        <th>Body</th>
        <th>Created</th>
        
      </tr>
    </thead>
    <tbody>
        
        @foreach($comments as $comment)
      <tr>
        <td>{{$comment->author}}</td>
        <td>{{$comment->email}}</td>
        <td>{{$comment->body}}</td>
        <td>{{$comment->created_at->diffForHumans()}}</td>
        <td><a href="{{route('home.post',$comment->post->id)}}">View Post</a></td>
        <td>
            @if($comment->is_active == 1)
            {!!Form::Open(['method'=>'patch', 'action'=>['PostCommentsController@update',$comment->id]])!!}
                
                <input type="hidden" name="is_active" value="0">    
                    
                <div class='form-group'>
                    {!!Form::submit('Unapprove',['class'=>'btn btn-primary '])!!}
                </div>
            {!!Form::close()!!}
            
            @else
            
             {!!Form::Open(['method'=>'patch', 'action'=>['PostCommentsController@update',$comment->id]])!!}
                
                <input type="hidden" name="is_active" value="1">    
                    
                <div class='form-group'>
                    {!!Form::submit('Approve',['class'=>'btn btn-success '])!!}
                </div>
            {!!Form::close()!!}
            @endif
        </td>
        <td>
            {!!Form::Open(['method'=>'delete', 'action'=>['PostCommentsController@destroy',$comment->id]])!!}

                <div class='form-group'>
                    {!!Form::submit('Delete comment',['class'=>'btn btn-danger '])!!}
                </div>
            {!!Form::close()!!}
        </td>
        
      </tr>
      @endforeach
      @else
     <h1 class="text-center">No comments</h1>
      @endif
    
    </tbody>
  </table>
  


@stop