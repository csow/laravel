@include('includes.header')
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation"  >
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                   @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li><a href="{{ url('/admin') }}">Admin</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

<!-- Page Content -->
    <div class="container" style="margin-top:70px">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8" >

                <!-- First Blog Post -->
                @if($posts)
                @foreach($posts as $post)
                <h2>
                  <a href="/post/{{$post->id}}">{{$post->title}}</a>  
                </h2>
                <p class="lead">
                    by {{$post->user->name}}
                </p>
                <p>Posted on {{$post->created_at}}</p>
                <hr>
                <img class="img-responsive" src="{{$post->photo ? $post->photo->file : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScZk6pNal_bSVLrCjy3b0eaRW6Qz_LVD1JiwFAO-dJvztn1NfOXg'}}" alt="">
                <hr>
                <p>{!!str_limit($post->body,200)!!}</p>
                <a class="btn btn-primary" href="/post/{{$post->id}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                @endforeach
                @else
                <h1 class="text-center">No post aviable</h1>
                @endif
                <hr>

             

                <!-- Pagination -->
              <div class="row">
                    <div class="col-sm-6 col-sm-offset-5">
                      {{$posts->render()}}
                    </div>
              </div>

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
                      
                    </div>
                    <!-- /.row -->
                </div>

            </div>

        </div>
        <!-- /.row -->



@include('includes.footer')