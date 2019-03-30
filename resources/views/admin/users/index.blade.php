@extends('layouts.admin')

@section('content')

@if(Session::has('deleted_user'))
<div class="alert alert-danger">
  <p class="text-center">{{session('deleted_user')}}</p>
</div>
@endif
@if(Session::has('updated_user'))
<div class="alert alert-success">
  <p class="text-center">{{session('updated_user')}}</p>
</div>
@endif
<h1>Users</h1>

<table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <!--<th>Role</th>-->
        <th>Status</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
        @if($users)
        @foreach($users as $user)
      <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <!--<td>{{$user->role->name}}</td>-->
        <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
        <td>{{$user->created_at->diffForHumans()}}</td>
        <td>{{$user->updated_at->diffForHumans()}}</td>
        <td><a class="btn btn-primary" href="{{route('admin.users.edit',$user->id)}}">Edit user</a></td>
        <td>
          <!--Delete-->
          {!!Form::Open(['method'=>'delete', 'action'=>['AdminUserController@destroy',$user->id]])!!}
          
          <div class='form-group'>
              {!!Form::submit('Delete User',['class'=>'btn btn-danger '])!!}
          </div>
          {!!Form::close()!!}

          </div>
        </td>
      </tr>
      @endforeach
      @endif
    
    </tbody>
  </table>
  

@endsection