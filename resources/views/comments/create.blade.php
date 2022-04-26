@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-9">
                <div class="card">
                    <div class="card-header bgcolor text-black">
                        <h4>Create Comment</h4>
                    </div>
                    <form  id="createPostForm" class="form-class p-2" method="POST" action={{route('comments.store', ['post'=>$post] )}}>
                        @csrf

                        <div class="row align-items-start mb-3">
                            <div class="col-2">
                                <label  class="form-label" for="contents"><strong>Comment</strong></label>
                            </div>
                            <div class="col-10">
                                <div id="editor" class="form-control"></div>
                            </div>
                            <input type="hidden" name="contents" id="contents">
                            <input type="hidden" name="post_id" id="post_id" value="{{ $post }}">
                        </div>
                        <div class="row align-items-start mb-3">
                            <div class="col-2">
                                <input type="submit" class="form-control btn btn-primary" value="Create">

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

