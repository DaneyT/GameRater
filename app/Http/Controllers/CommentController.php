<?php

namespace App\Http\Controllers;

use App\Comment;
use App\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

//    public function publicHomePage()
//    {
//        $comments = Comment::paginate(10);
//        return view('blog/home', ['comments'=>$comments]);
//    }
//    /**
//     * Display a listing of the resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
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
        //$loggedInUserName = Auth::user()->name;
        $comments = Comment::all();

        return view('blog.gameList', ['comments' =>$comments]);
    }
//
//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function create()
//    {
//        return view('adminPanel/Create');
//    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comments = new Comment;

        //$commentInfo = Post::where('id', $request->id)->first();
        $comments->postID = $request->postID; //$request->id;

        $commentUserName = $request->userName;
        $commentBody =  $request->body;
        //$commentUserId = Auth::id();

        //$comments->user_ID = $commentUserId;
        $comments->userName= $commentUserName;
        $comments->body = $commentBody;

        $comments->save();
        return redirect()->route('comments.index');
        //return view('succes!');
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

//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  \App\post  $post
//     * @return \Illuminate\Http\Response
//     */
//    public function edit(comment $comment)
//    {
//
//    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  \App\post  $post
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, comment $comment)
//    {
//
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  \App\post  $post
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy(comment $comment)
//    {
//
//    }
}
