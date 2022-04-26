@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center mt-5">
        <div class="col-sm-6">
        <div class="card m-2">
            <h4 class="card-header bgcolor text-black">{{$post->title}} </h4>
            <div class="card-body">
              <h5 class="card-title"><a href="{{route('posts.show',$post)}}">{{$post->title}}</a></h5>
              <div class="card-text">
                  @markdown(Str::limit($post->contents, 100, $end='.......'))
                </div>
                <strong>Tag: </strong><span class="badge badge-secondary">{{ $post->tags[0]->tag }}</span>
                <br>
                <span>By <strong>{{$post->user->username}}</strong> in {{$post->created_at->diffForHumans()}}</span>

            </div>
        </div>
        </div>

    </div>

 </div>

 <div class="container-fluid">
    <div class="row justify-content-center mt-5">
        <div class="col-sm-2">
        <div class="card m-2">
            <input type="button" class="btn btn-primary" value="New Comment" onclick="window.location='{{ route('comments.create', ['post'=>$post])}}'" }}">
        </div>
        </div>

    </div>

 </div>

 <div class="container-fluid">
    <div class="row justify-content-center mt-5">
        <div class="col-sm-6">
            @forelse ($comments as $comment)
        <div class="card m-2">
            <div class="card-body">
             <div class="card-text">
                  @markdown(Str::limit($comment->contents, 100, $end='.......'))
                </h5><span>By <strong>{{$comment->user->username}}</strong> in {{$comment->created_at->diffForHumans()}}</span>
                </div>

            </div>
           <!-- Si la id del usuari es la mateixa de la del creador del comentari-->
            @if(Auth::user()->id == $comment->user_id || Auth::user()->role_id == 2)
            <div class="card-footer text-muted">
                    <form class="form-inline" action="{{route('comments.destroy',$comment)}}" method="POST">
                            <!--  <input name="_method" type="hidden" value="DELETE"> -->
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger">Remove</button>
                    </form>

            </div>

            @endif
        </div>
        @empty
            <div class="alert alert-warning"> No comments!</div>
        @endforelse
        </div>

    </div>

 </div>

@endsection
