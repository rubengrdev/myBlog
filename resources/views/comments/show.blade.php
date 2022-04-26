@extends('layouts.app');
@section('content')
 <div class="container">
     <div class="row">
        <div class="col align-self-center">
            <h2>{{$comment->title}}</h2>
                    <article>
                        {!!$comment->contents!!}
                    </article>
        </div>



     </div>

     <a href="{{url("/posts")}}">Back</a>

 </div>
@endsection
