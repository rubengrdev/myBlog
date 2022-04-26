@extends('layouts.app')
@section('tools')
@auth()
    @if(Auth::user()->role='admin')
        @include('layouts.partials.admin')
    @endif
@endauth

@endsection
@section('content')

<div class="container">


@if(Auth::user() != null)

  <section class="header-main border-bottom bg-white">
        <div class="container-fluid">
            <div class="row p-2 pt-3 pb-3 d-flex align-items-center">
                <div class="col-md-2">  </div>
                <div class="col-md-8">
                    <form id="searchform" method="POST" action="{{ url('/posts/search') }}">
                        @csrf
                    <div class="d-flex form-inputs"> <input class="form-control" id="searchbar" name='search' type="text" placeholder="Search post by title/tag..."> <i class="bx bx-search"></i> </div>
                </form>
                </div>
                <div class="col-md-2">
                    <div class="d-flex d-none d-md-flex flex-row align-items-center"> <span class="shop-bag"><i class='bx bxs-shopping-bag'></i></span>
                        <div class="d-flex flex-column ms-2"> <span class="qty"></div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="mostrar">

    </div>
    <script>
          /**
        let search = document.querySelector("#searchbar");
        let mostrar = document.querySelector("#mostrar");
        let searchform = document.querySelector("#searchform")
        let word = "";
        searchform.addEventListener("submit",(e)=>{
            e.preventDefault();
        })
        search.addEventListener("keydown", (e)=>{
            let key = e.key;
            console.log(key);
            if(key.length == 1){
                //si la longitud es 1 significa que es un dígito
                word+=key;
            }
            if(key == "Backspace"){
                word = word.slice(0, -1);
            }
            if(key == "Enter"){
                console.log(word);
                let obj = {title:word};
                $('#searchbar').on("keyup",function(){
                        $.ajax({
                            type:get,
                            url:'{{ URL::to('') }}'
                            data:{'search': word},
                            success:function(data){
                                console.log(data);
                            }
                        })

                })

               fetch('/posts/fetch', {
                headers:{
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                    method:'POST',
                    mode:'cors',
                    body: JSON.stringify(obj)
                });

                .then(response => response.text())
                .then(function(result){
                    console.log(result);
                    mostrar.innerHTML = result;
                })*
                }
        });
**/
    </script>


 <br>
    @foreach ($posts as $post)

    <div class="row col-md-12 col-lg-12 mt-3" >
        <div class="card col-md-12 col-lg-12" onclick='window.location="{{ route("posts.show", $post) }}"'>
            <div class="card-body">


                <div class="flex items-center">
                    <div class=" py-auto">
                        <h4>{{$post->title}}</h4>
                        {{$post->contents}}
                    </div>
                    <div class="py-auto"><span class="badge badge-secondary">{{ $post->tags[0]->tag }}</span></div>
                </div>



            </div>
        </div>


    </div>

    @endforeach
</div>
@else
<div class="row col-md-12 col-lg-12 mt-3">
    <div class="card col-md-12 col-lg-12">
        <div class="w-auto text-center items-center flex h-screen card-body ">
            <h4 class=" items-center text-center">{{ "Welcome to my Blog" }}</h4>
            <small class="text-center">Rubén Gómez 2-DAW CEFP Nuria </small>
            <br>
           <a href="{{ url('/login') }}">Login</a> to view and create posts
        </div>
    </div>
</div>



@endif
    <div x-data="{posts:[]}"
    x-init="fetch('/api/posts')
    .then(response => response.json())
    .then(data => posts=data)
    ">
    <template x-for="post in posts">
        <div class="">
            <h2 x-text="post.title"></h2>
            <p x-text="post.contents"></p>
        </div>
    </template>
</div>
</div>
@endsection




