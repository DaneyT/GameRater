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
    public function destroy(User $user)
    {
        $userInfo = User::where('id', $user->id)->first();
        $userInfo->delete();

//        $userComments = Comment::all()->where('userName', $user->name);
//        if(isset($userComments))
//        {
//            $userComments->delete();
//        }


        return redirect()->route('showUsers');
    }
}
