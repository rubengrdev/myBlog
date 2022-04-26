@extends('layouts.app')
@section('content')

 <div class="container">
     <div class="row">
        <a href="{{url("/")}}"><img class="back-arrow" src="{{ asset('img/back-arrow.png') }}"></a>
        <div class="col align-self-center">
            <h2>{{$post->title}}</h2>
            <span class="badge badge-secondary">{{ $post->tags[0]->tag }}</span>
            <br><br>
                    <article>
                        {{ $post->contents }}
                    </article>

                    <br>


        </div>
     </div>
     <div class="card-foot">

        <img onclick="window.location='{{ route('comments.index',[$post]) }}'" class="comment-icon" src="{{ asset('img/comment .png') }}">
    </div>
 </div>
@endsection
