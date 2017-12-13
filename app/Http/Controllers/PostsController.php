<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except([
            'index',
            'show'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts', Post::orderBy(
            'created_at',
            'desc')// or ->oldest()
            ->paginate(6)
        );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {

        /*Debug options*/
        // dump(), var_dump(), return $request
        // dd(request()->all());
        // dd(request('title'));
        // dd(request(['title', 'body']));

        $this->validate(request(), [
            'title' => 'required|min:2',
            'body' => 'required|min:2'
        ]);

        /*Create a Post option*/ /*Understandable*/ /*DON'T FORGET THE $fillable ARRAY IN THE MODEL*/
        // $post = new Post;
        // $post->title = request('title');
        // $post->body = request('body');
        // $post->save();

        /*Create a Post option*/ /*Better and Optimal*/
        Post::create(request([ 'title', 'body']));
        return redirect('/posts');
    }


    public function show(Post $post)
    {
        /*Option*/ /*Long and Undersantadable*/
        // $post = Post::find($id); //change the function variables to $id

        /*Option*/ /*Optimal. Using Route Model Binding*/
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        //
    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }
}
