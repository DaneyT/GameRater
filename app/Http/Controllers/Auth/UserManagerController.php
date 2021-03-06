<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;

class UserManagerController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('adminPanel/showUsers', ['posts' =>$users]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function promote(Request $request)
    {

        $userInfo = User::find($request->id);
        //dd($userInfo->name);
        //$postInfo = Post::where('id', $request->id)->first();

        $singlePost = $userInfo;
        if($request->admin == 1)
        {
            $singlePost->admin =0;
        }
        else
        {
            $singlePost->admin =1;
        }


        $singlePost->save();

        return redirect()->route('showUsers');
    }

    public function destroy(User $user)
    {

        $userInfo = User::find($user->id);
        $userInfo->delete();

        $userComments = Comment::where('userName', $user->name)->get();


        foreach($userComments as $userComment)
        {
            //dd($userComment);
            $userComment->delete();
        }


        return redirect()->route('showUsers');
    }
}
