@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-9">
                <div class="card">
                    <div class="card-header bgcolor text-black">
                        <h4>Edit Tag</h4>
                    </div>

                    <form  id="createPostForm" class="form-class p-2" method="POST" action={{route('tags.update',['tag'=>$tag])}}>
                        @csrf
                        @method('PUT')
                        <div class="row align-items-start mb-3">
                            <div class="col-2">
                                <label  class="form-label" for="title">Tag name</label>
                            </div>
                            <div class="col-10">
                                <input class="form-control"  id="tag" name="tag" value="{{ $tag->tag }}" type="text" class="@error('tag') is-invalid @enderror">
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row align-items-start mb-3">
                            <div class="col-2">
                                <input type="submit" class="form-control btn btn-primary" value="Edit">

                            </div>
                        </div>

                        <div class="form-group">

                        </div>

                        </form>
                </div>
            </div>
            </div>

    </div>

@endsection
