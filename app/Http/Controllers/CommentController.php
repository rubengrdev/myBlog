<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Support\Facades\Session;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        $this->authorize('view',$post);
        $user=Auth::user();
        if($user){
            $comments = Comment::where('post_id',$post->id)->get();
            return view("comments.index")->with(compact('post','comments'));
        }
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        //enviamos los datos del post a través de los métodos hasta llegar al store
        return view('comments.create')->with(compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'contents' => 'string|required|max:240'
        ]);

        $data['contents'] = $request->contents;
        $data['user_id']=Auth::user()->id;
        $data['post_id']=$request->post;

        if($data['contents'] != null && $data['user_id'] != null && $data['post_id'] != null){
            Comment::create($data);
            $route = route('comments.index', ['post' => $data['post_id']]);
            return  redirect($route);
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        $cont=Markdown::convertToHTML($comment->contents);

        return view('comments.show',['comment'=>$comment,'cont'=>$cont]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, Comment $comment)
    {
        return view('comments.edit',['comment'=>$comment, 'post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post, Comment $comment)
    {
        /*


        $comment = Comment::findOrFail($comment->id);
        $this->validate($request,[
            'contents' => 'required'
        ]);
        $input = $request->all();
        //si no ha hecho ninguna modificación no permitimos que se actualice
        if($comment->contents != $input["contents"]){
            $comment->fill($input)->save();

            $route = route('comments.index', ['post' => $post]);
            return  redirect($route);
        }
        return redirect()->back();
        */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back();
    }
}
