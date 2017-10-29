<?php

namespace App\Http\Controllers;

use App\Comment;
use App\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function index()
    {
        $loggedInUserId = Auth::id();
        $posts = post::all()->where('user_id', $loggedInUserId);

        return view('adminPanel/home', ['posts' =>$posts]);
    }

    /**
     * Display a listing of the comments
     *
     * @return \Illuminate\Http\Response
     */
    public function allComments()
    {
        $loggedInUserName = Auth::user()->name;
        $comments = Comment::all()->where('userName', $loggedInUserName);

        return view('blog.view_comments', ['comments' =>$comments]);
    }

    public function viewAllGames()
    {
        $comments = Comment::all();

        return view('blog.gameList', ['comments' =>$comments]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comments = new Comment;

        $comments->postID = $request->postID; //$request->id;

        $commentUserName = $request->userName;
        $commentBody =  $request->body;

        $comments->userName= $commentUserName;
        $comments->body = $commentBody;

        $comments->save();

        $postdata = Post::where('id', $comments->postID)->first();

        return redirect()->route('posts.show', ['id' => $postdata]);

    }

//    /**
//     * Display the specified resource.
//     *
//     * @param  \App\post  $post
//     * @return \Illuminate\Http\Response
//     */
    public function show()
    {
        $loggedInUserName = Auth::user();
        $comments = Comment::all()->where('userName', $loggedInUserName);

        return view('blog.view_comments', ['comments' =>$comments]);
    }

}
