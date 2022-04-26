@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-9">
                <div class="card">
                    <div class="card-header bgcolor text-black">
                        <h4>Create post</h4>
                    </div>
                    <form  id="createPostForm" class="form-class p-2" method="POST" action={{route('posts.store')}}>
                        @csrf
                        <div class="row align-items-start mb-3">
                            <div class="col-2">
                                <label  class="form-label" for="title">Post Title</label>
                            </div>
                            <div class="col-10">
                                <input class="form-control"  id="title" name="title" value="" type="text" class="@error('title') is-invalid @enderror">
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
                                <div id="editor" class="form-control"></div>
                            </div>
                            <input type="hidden" name="contents" id="contents">
                        </div>
                        <!--Botón de tags-->
                        <div class="row align-items-start mb-3">
                            <div class="col-2">
                                <label  class="form-label" for="contents"><strong>Tags</strong></label>
                            </div>
                            <div class="col-10 w-20">
                                <select class="form-select  form-select-lg mb-3" name="tag" aria-label="Default select example"  class="@error('tag') is-invalid @enderror">
                                    <option disabled hidden selected>Open this select menu</option>
                                    @foreach ($tags as $tag )
                                        <option value="{{ $tag->id }}">{{ $tag->tag }}</option>
                                    @endforeach
                                  </select>

                            </div>

                        </div>


                        <div class="row align-items-start mb-3">
                            <div class="col-2">
                                <input type="submit" class="form-control btn btn-primary" value="Create">

                            </div>
                        </div>

                        </form>
                </div>
            </div>
            </div>

    </div>

@endsection
