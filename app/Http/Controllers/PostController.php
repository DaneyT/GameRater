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
        $posts = Post::with('postID')->where('labelGenre', 'like', 'news')->where('postActive', 'like', '1')->paginate(10);

        foreach ($posts as $post)
        {
            $commentCount = Comment::with('postID')->where('postID', 'like', $post->id)->count();
            $post['comment'] = $commentCount;
        }

        return view('blog/home', ['posts'=>$posts]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //show only active news posts
    {
        if(\Auth::user()->admin) {
            $posts = post::all(); //->where('labelGenre', "news");


            return view('adminPanel/home', ['posts' => $posts]);
        }
        else
        {
            return redirect()->route('publicHomePage');
        }
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
    public function showGamesPosts(Request $request)
    {

        $labelGenreString = $request->labelGenre;

        $postdata = Post::with('postID')->where('labelGenre', 'like', $labelGenreString)->where('postActive', 'like', '1')->paginate(10);



        foreach ($postdata as $index=>$post)
        {
            //dd($postdata[$index]->id);
            $commentCount = Comment::with('postID')->where('postID', 'like', $postdata[$index]->id)->count();
            $post['comment'] = $commentCount;

        }


        $data = array(
            //'id' => $postdata,
            'post' => $postdata
        );


        return view('blog.view_gamesFromGenre')->with($data);//->with($commentData);
    }

    public function switchStatusPost(Request $request)
    {
        $postInfo = Post::where('id', $request->id)->first();

        $singlePost = $postInfo;
        if($request->postActive == 1)
        {
            $singlePost->postActive =0;
        }
        else
        {
            $singlePost->postActive =1;
        }
        //$singlePost->postActive = $postToggle;
        $singlePost->save();


        return redirect()->route('posts.index');
    }

    public function searchPosts(Request $request)
    {
        $search = $request->search;
        //return $request->search;
        $posts = post::where('title','like','%'.$search.'%')                //this is the search para command
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
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'labelGenre' => 'required',
        ]);

        $postInfo = Post::where('id', $request->id)->first();

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

        $userComments = Comment::where('postID', $post->id)->get();

        foreach($userComments as $userComment)
        {
            $userComment->delete(); //delete comments
        }

        $postInfo->delete(); //delete post

        return redirect()->route('posts.index');
    }
}
