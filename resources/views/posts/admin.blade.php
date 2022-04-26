@extends('layouts.app')
@section('content')



 <div class="container-fluid">
     <div class="row justify-content-center ">
         <div class="col-sm-6">
            @forelse ($posts as $post )
            <div class="card m-2">

                <div class="card-body">
                  <h5 class="card-title">{{$post->title}}</h5>
                  <p>{{ $post->contents }}</p>
                  <p class="card-text"><strong>Post date:</strong>{{$post->created_at->diffForHumans()}}</p>
                </div>
                <div class="card-footer text-muted">

                        <form class="form-inline" action="{{route('posts.destroy',$post)}}" method="POST">
                                <!--  <input name="_method" type="hidden" value="DELETE"> -->
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger">Remove</button>
                        </form>
                </div>


            </div>
            @empty

                <div class="alert alert-warning"> No postsdd!</div>
            @endforelse
         </div>

    </div>

 </div>

@endsection
