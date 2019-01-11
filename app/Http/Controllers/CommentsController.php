<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
class CommentsController extends Controller
{
    function __construct() 
    {
        $this->middleware('auth');
    }

    public function store( Request $request, Post $post)
    {
        $this->validate($request, [
            'message' => 'required'
        ]);

        $comment = new Comment();
        $comment->user_id = auth()->user()->id;
        $comment->username = auth()->user()->name;
        $comment->post_id = $post->id;
        $comment->message = $request->input('message');
        $comment->save();

        return back();
    }
    public function edit(Comment $comment)
    {
        if($comment->user_id != auth()->user()->id)
        {
            return back();
        }
        return view('comments.edit')->with('comment', $comment);
    }

    public function update( Request $request, Comment $comment)
    {
        if($comment->user_id != auth()->user()->id)
        {
            return back();
        }
        $comment->message = $request->input('message');
        $comment->save();
        return view('posts.show')->with('post', Post::find($comment->post_id));
    }

    public function destroy(Comment $comment)
    {
        if($comment->user_id != auth()->user()->id)
        {
            return back();
        }
        $comment->delete();
        return back();
    }
}
