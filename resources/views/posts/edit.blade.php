@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-9">
                <div class="card">
                    <div class="card-header bgcolor text-black">
                        <h4>Edit post</h4>
                    </div>
                    <form  id="createPostForm" class="form-class p-2" method="POST" action={{route('posts.update',$post)}}>
                        @csrf
                        @method('PUT')
                        <div class="row align-items-start mb-3">
                            <div class="col-2">
                                <label  class="form-label" for="title">Post Title</label>
                            </div>
                            <div class="col-10">
                                <input class="form-control"  id="title" name="title" value="{{ $post->title }}" type="text" class="@error('title') is-invalid @enderror">
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row align-items-start mb-3">
                            <div class="col-2">
                                <label  class="form-label" for="contents"><strong>Contents</strong></label>
                            </div>
                            <div class="col-10">
                                <div id="editor" class="form-control">{{ $post->contents }}</div>
                            </div>
                            <input type="hidden" name="contents"  id="contents">
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
