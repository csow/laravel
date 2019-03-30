@extends('layouts.admin')
@section('content')

@if(Session::has('deleted_post'))
<div class=" alert alert-danger">
  <p class="text-center">{{session('deleted_post')}}</p>
</div>
@endif
@if(Session::has('updated_post'))
<div class=" alert alert-success">
  <p class="text-center">{{session('updated_post')}}</p>
</div>
@endif

<h1>Posts</h1>
<table class="table">
    <thead>
      <tr>
        <th>Photo</th>
        <th>Title</th>
        <th>Owner</th>
        <th>Category</th>
        <th>Post link</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
        @if($posts)
        @foreach($posts as $post)
      <tr>
        <td> <img height="50" src="{{$post->photo ? $post->photo->file : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScZk6pNal_bSVLrCjy3b0eaRW6Qz_LVD1JiwFAO-dJvztn1NfOXg'}}"></img></td>
        <td><a href="{{route('admin.posts.edit',$post->id)}}">{{$post->title}}</a></td>
        <td>{{$post->user->name}}</td>
        <td>{{$post->category ? $post->category->name : 'uncategorized'}}</td>
        <td><a href="{{route('home.post', $post->id)}}">View Post</a></td>
        <td>{{$post->created_at->diffForHumans()}}</td>
        <td>{{$post->updated_at->diffForHumans()}}</td>
      
    </tr>
      @endforeach
      @endif
    
    </tbody>
  </table>
  <div class="row">
    <div class="col-sm-6 col-sm-offset-5">
      {{$posts->render()}}
    </div>
  </div>
@stop