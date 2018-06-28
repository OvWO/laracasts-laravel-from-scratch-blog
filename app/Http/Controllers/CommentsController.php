<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Post $post)
    {
        // $post_id = $post->id;
        // $user_id = auth()->id();
        // $body = request('body');
        // return compact('user_id','post_id', 'body');

        $this->validate(request(),[
           'body' => 'required|min:2'
       ]);

        /*Option*/ /*Long and Understandable*/
        /* DOESN'T WORK!!! */
        // Comment::create([
        //     'body' => ucfirst(request('body')),
        //     'post_id' => $post->id,
        // ]);

        /*Option*/ /*Wtihout updating the Post Model*/
        $post->comments()->create([
            'body' => ucfirst(request('body')),
            'post_id' => $post->id,
            'user_id' => auth()->id()
        ]);

        // $post->addComment(compact('user_id','post_id', 'body'));

        /*Option*/ /*Short and Cleaner*/
        // $post->addComment(request['body', 'user_id']);

        return back()
           ->with('message', 'Comment added succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
