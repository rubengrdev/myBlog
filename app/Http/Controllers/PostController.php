<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Post;
//tags
use App\Tag;
use GrahamCampbell\Markdown\Facades\Markdown;

class PostController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        $this->authorize('view',$post);
        $user=Auth::user();

        if($user=Auth::user()){
           $posts=Post::where('user_id',$user->id)->get();
       }
       else{
           $posts=Post::all();
       }

       return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //recoger los posibles tags cuando le enviemos a la vista de posts create
        $tags = Tag::all();
        return view('posts.create')->with(compact('tags'));
    }

    public function view(){
       $posts= Post::all();
       return view('posts.admin', compact('posts'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'title' => 'string|unique:posts|max:90',
            'contents' => 'string|required',
            'tag' => 'integer|required'
        ]);

        $validatedData['user_id']=Auth::user()->id;
        $validatedData['category_id']='1';
        $tag = $validatedData['tag'];
        $post = Post::create($validatedData);
        //$relation = Tags::create(['tag_id'=>$tag]);
        $post->tags()->attach($tag);

        return redirect('posts');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

       $cont=Markdown::convertToHTML($post->contents);

       return view('posts.show',['post'=>$post,'cont'=>$cont]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        return view('posts.edit',['post'=>$post, 'tags'=>$tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title'=>'string|max:90',
            'contents'=> 'string|max:255'
        ]);
        $post->update($validatedData);
        return view('posts.show',['post' => $post]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back();
    }

    public function getPostTag(){
        $post_tag = DB::table('post_tag')->get();
        $tagAttach = [];
        foreach($post_tag as $pt){
            $tagAttach[] = ["post_id" => $pt->post_id , "tag_id" => $pt->tag_id];
        }
        return $tagAttach;
    }

    public function fetch(Request $request)
    {
        $search = trim($request->search);
        if(strlen($search) >= 1){
            $posts = Post::where('title', 'LIKE', '%'.$search.'%')->get();

            $getPostTag = $this->getPostTag();
            $collection = collect(new Post());
            foreach($posts as $post){
                $collection->add($post);
            }
            foreach(Tag::all() as $tag){
                //si el nombre introducido conincide con el nombre de un tag
                if($search == $tag->tag){
                    //la id del tag necessari:
                    $needed_tag_id = $tag->id;
                    //mostrar todos los post donde el tag es igual al indicado
                    foreach($getPostTag as $gpt){
                        if($needed_tag_id == $gpt['tag_id']){
                            $collection->add(Post::where('id', '=', $gpt['post_id'])->get()[0]);
                        }
                    }
                }
            }
            //Si hay posts y un tag relacionado
            if($posts != [] && $collection != []){
                //devolvemos los post encontrados por el título
                return view('posts.index', ['posts'=>$collection]);
            }else if($posts != []){
                return view('posts.index', ['posts'=>$posts]);
            }

        }
        //en el caso de que no haya especificado nada en la barra de busqueda
        $posts = Post::all();
        return view('home',compact('posts'));
    }
}
