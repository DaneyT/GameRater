<?php

namespace App\Http\Controllers;

use App\post;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function publicHomePage()
    {
        $posts = Post::where('labelGenre', "news")->paginate(10);
        return view('blog/home', ['posts'=>$posts]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$loggedInUserId = Auth::id();
        //$posts = post::all()->where('user_id', $loggedInUserId);
        $posts = post::all()->where('labelGenre', "news");


        return view('adminPanel/home', ['posts' =>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminPanel/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $posts = new Post;

        $postTitle = $request->title;
        $postBody =  $request->body;
        $postlabelGenre = $request->labelGenre;
        $postUserId = Auth::id();

        $posts->user_id = $postUserId;
        $posts->title = $postTitle;
        $posts->body = $postBody;
        $posts->labelGenre = $postlabelGenre;

        $posts->save();

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        $postdata = post::find($post);
        $commentsdata = Comment::all()->where('postID', $post->id);

        $data = array(
            'id' => $post,
            'post' => $postdata
        );

        $commentData = array(
            'comments' => $commentsdata
        );

        return view('blog.view_post')->with($data)->with($commentData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function showGamesPosts($labelGenre)
    {

        $labelGenreString = $labelGenre;
        //return $labelGenreString;
        $postdata = post::all()->where('labelGenre', $labelGenreString);
        //$commentsdata = Comment::all()->where('postID', $postdata->id);

        $data = array(
            //'id' => $postdata,
            'post' => $postdata
        );

//        $commentData = array(
//            'comments' => $commentsdata
//        );

        return view('blog.view_gamesFromGenre')->with($data);//->with($commentData);
    }

    public function searchPosts(Request $request)
    {
        //$search = \Request::get('search'); //<-- we use global request to get the param of URI
        $search = $request->search;
        //return $request->search;
        $posts = post::where('title','like','%'.$search.'%')
            ->orderBy('title')
            ->paginate(10);

        return view('blog.searchPosts',compact('posts'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        $postInfo = Post::find($post);
        return view('adminPanel.edit', ['post'=>$postInfo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        $postInfo = Post::where('id', $request->id)->first();

        if(isset($request->title))
        {
            $postInfo->title = $request->title;

        }

        if(isset($request->body))
        {
            $postInfo->body = $request->body;
        }
        if(isset($request->labelGenre))
        {
            $postInfo->labelGenre = $request->labelGenre;
        }
        if(isset($request->id))
        {
            $postInfo->id = $request->id;
        }

        $postInfo->save();

        if(isset($request->editForm))
        {
            return redirect()->route('posts.index');
        }
        else
        {
            return redirect()->route('posts.show', ['id' => $post]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        $postInfo = Post::where('id', $post->id)->first();
        $postInfo->delete();

        return redirect()->route('posts.index');
    }
}
