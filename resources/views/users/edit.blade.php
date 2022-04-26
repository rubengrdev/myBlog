@extends('layouts.app')
@section('content')

    <div class="container">
            <div class="mx-auto card col-md-6 col-lg-8">
                <div class="card-title"><h2>Edit user</h2></div>
                <div class="card-body">
        <form action="{{route('users.update',$user)}}" method="POST">
             @method('PUT') @csrf

            <div class="form-group mb-2">
                <div>
                    <label for="username">Username</label>
                </div>
                <div>
                    <input  class="form-control" type="text" name="username" id="" value={{$user->username}}>
                </div>
            </div>
            <div class="form-group mb-2">
                <div>
                    <label for="email">Email</label>
                </div>
                <div>
                    <input  class="form-control" type="email" name="email" id=email" value={{$user->email}}>
                </div>
            </div>

            <div class="row m-2"><button class="btn btn-primary">Update</button></div>
        </form>
        </div>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>

    </div>
    @endsection
