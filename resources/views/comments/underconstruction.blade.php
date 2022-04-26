@extends('layouts.app')
@section('content')
 <div class="container-fluid">
    <div class="row justify-content-center mt-5">
        <div class="col-sm-6">
            @forelse ($comments as $comment)
        <div class="card m-2">
            <div class="card-body">
             <div class="card-text">
                  @markdown(Str::limit($comment->content, 100, $end='.......'))

                </div>

            </div>
            <div class="card-footer text-muted">
                    <form class="form-inline" action="{{route('comments.destroy',$comment)}}" method="POST">
                            <!--  <input name="_method" type="hidden" value="DELETE"> -->
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger">Remove</button>
                    </form>
                    <a href="{{route('comments.edit',$comment)}}" class="btn btn-primary m-2">Edit</a>
            </div>


        </div>
        @empty
            <div class="alert alert-warning"> No comments!</div>
        @endforelse
        </div>

    </div>

 </div>

@endsection
