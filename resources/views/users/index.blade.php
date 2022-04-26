@extends('layouts.app')
@section('content')



 <div class="container-fluid">
     <div class="row justify-content-center ">
         <div class="col-sm-6">
            @forelse ($users as $user )
            <div class="card m-2">
                <h5 class="card-header bgcolor text-black">{{$user->username}}</h5>
                <div class="card-body">
                  <h5 class="card-title">{{$user->email}}</h5>
                  <p class="card-text"><strong>User since:</strong>{{$user->created_at->diffForHumans()}}</p>
                </div>
                <div class="card-footer text-muted">
                        <form class="form-inline" action="{{route('users.update',$user)}}" method="POST">
                            @csrf
                            @method('PUT')
                            Current Rol: {{$user->role->role}}
                        <select class="form-control m-2" name="role_id" >
                            <option value=""> -- Select One --</option>
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}" @if(old('role_id',$role->id)==$user->role->id)   'selected' @endif >{{$role->role}}</option>
                                @endforeach
                        </select>
                        <input class="btn btn-secondary m-2" type="submit" value="Update">
                        </form>
                        <form class="form-inline" action="{{route('users.destroy',$user)}}" method="POST">
                                <!--  <input name="_method" type="hidden" value="DELETE"> -->
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger">Remove</button>
                        </form>
                        <a href="{{route('users.edit',$user)}}" class="btn btn-primary m-2">Edit</a>
                </div>


            </div>
            @empty

                <div class="alert alert-warning"> No users!</div>
            @endforelse
         </div>

    </div>

 </div>

@endsection
