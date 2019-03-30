@extends('layouts.blog_post')

@section('content')

@if(Session::has('comment_success'))
<div class="alert alert-success text-center">
  <p>{{session('comment_success')}}</p>
</div>
@endif
@if(Session::has('login'))
<div class="alert alert-danger text-center">
  <p>{{session('login')}}</p>
</div>
@endif
@if(Session::has('comment_error'))
<div class="alert alert-danger text-center">
  <p>{{session('comment_error')}}</p>
</div>
@endif

 <!-- Blog Post -->
 

                <!-- Title -->
                <h1>{{$post->title}}</h1>

                <!-- Author -->
                <p class="lead">
                    by {{$post->user->name}}
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at}}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="{{$post->photo ? $post->photo->file : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScZk6pNal_bSVLrCjy3b0eaRW6Qz_LVD1JiwFAO-dJvztn1NfOXg'}}" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead">{!! $post->body !!}</p>
             

                <hr>

                <!-- Blog Comments -->
                
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    
             {!!Form::Open(['method'=>'post', 'action'=>'PostCommentsController@store'])!!}

                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    
                    <div class='form-group'>
                        
                        {!!Form::textarea('body',null,['class'=>'form-control'])!!}
                    </div>
                    
                    <div class='form-group'>
                        {!!Form::submit('Submit',['class'=>'btn btn-primary '])!!}
                    </div>
            {!!Form::close()!!}
                    
                    
                </div>
                
                <hr>

                <!-- Posted Comments -->
                @if(count($comments)>0)
                @foreach($comments as $comment)
                
                <!-- Comment -->
                <div class="media">
                  
                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->author}}
                            <small>{{$comment->created_at}}</small>
                        </h4>
                        {{$comment->body}}
                     
                    </div>
                </div>
               
                @endforeach
         @endif
               
            

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form  action="/search" method="get">
                        {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" class="form-control" name="keyword">
                        <span class="input-group-btn">
                            <button class="btn btn-default" >
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <from>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                @foreach($categories as $category)
                                <li><a href="/category/{{$category->id}}">{{$category->name}}</a>
                                </li>
                                @endforeach
                                
                            </ul>
                        </div>
                        
@stop