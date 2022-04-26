@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row col-md-12 col-lg-12">
        <div class="card col-md-12 col-lg-12">
            <div class="card-body">
                <div class="card-title"><h2>Profile</h2></div>
                <p>Username: {{ $user->username}}</p>
                <p>Mail: {{$user->email}}</p>

                <p>Role: {{$user->role->role}}</p>
                <p>Register: {{$user->created_at->format('j F, Y')}}</p>
                    <a href="{{route('users.edit',$user)}}"><button class="btn btn-primary">Edit</button></a>
                </div>
            <div>
            </div>
        </div>

    </div>
    <div class="row col-md-12 col-lg-12 mt-3">
        <div class="card col-md-12 col-lg-12">
            <div class="card-body">
                <div class="card-title"><h4>Last Posts</h4></div>

                @foreach ($user->posts as $post)
                <div class="card-body shadow-sm">
                    <h5> {{ $post->title }}</h5>
                    <p> {{ $post->contents }}</p>
                </div>
                @endforeach
                </div>
            <div>

            </div>
        </div>

    </div>
</div>
@endsection
