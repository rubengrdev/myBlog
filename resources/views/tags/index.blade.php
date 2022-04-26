@extends('layouts.app')
@section('content')
@if(Auth::user()->isAdmin())



<div class="container-fluid">
    <div class="row justify-content-center mt-5">
        <div class="col-sm-2">
        <div class="card m-2">
            <input type="button" class="btn btn-primary" value="New Tag" onclick="window.location='{{ route('tags.create')}}'" }}">
        </div>
        </div>
    </div>
 </div>






 <div class="container-fluid">
    <div class="row justify-content-center mt-5">
        <div class="col-sm-6">
            @forelse ($tags as $tag)
        <div class="card m-2">
            <div class="card-body">
              <h5 class="card-title"><a href="">{{$tag->tag}}</a></h5><br>
                <p>Preview:  </p><span class="badge badge-secondary">{{ $tag->tag}}</span><br>
            </div>
            <div class="card-footer text-muted">
                    <a href="{{route('tags.edit',['tag'=>$tag])}}" class="btn btn-primary m-2">Edit</a>
            </div>


        </div>
        @empty
            <div class="alert alert-warning"> No tags!</div>
        @endforelse
        </div>

    </div>

 </div>
 @endif
@endsection
