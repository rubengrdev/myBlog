@extends('layouts.app')
@section('content')
@if(Auth::user()->isAdmin())
    @include('layouts.partials.admin')
@endif
 <div class="container-fluid">
    <div class="row justify-content-center mt-5">
        <div class="col-sm-6">

            @forelse ($posts as $post)
        <div class="card m-2">
            <h4 class="card-header bgcolor text-black">{{$post->title}}</h4>
            <div class="card-body">
              <h5 class="card-title"><a href="{{route('posts.show',$post)}}">{{$post->title}}</a></h5>
              <div class="card-text">
                  @markdown(Str::limit($post->contents, 100, $end='.......'))

                </div>
                <strong>Tag: </strong><span class="badge badge-secondary">{{ $post->tags[0]->tag }}</span><br>
                <span>By <strong>{{$post->user->username}}</strong> in {{$post->created_at->diffForHumans()}}</span>

            </div>
            @if(Auth::user()->isAdmin())
            <div class="card-footer text-muted">
                    <form class="form-inline" action="{{route('posts.destroy',$post)}}" method="POST">
                            <!--  <input name="_method" type="hidden" value="DELETE"> -->
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger">Remove</button>
                    </form>
                    <a href="{{route('posts.edit',$post)}}" class="btn btn-primary m-2">Edit</a>
            </div>
            @endif

        </div>
        @empty
            <div class="alert alert-warning"> No posts!</div>
        @endforelse
        </div>

    </div>

 </div>

@endsection
