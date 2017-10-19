@extends('layouts.viewPostTemplate')

@section('title', 'View Post #')

@section('content')
    <div class="row">
        <a href="http://localhost:8000/">Go back to Home</a>
         </div>



<h1>{{ $post[0]->title }}</h1>
    <p>{{ $post[0]-> body }}</p>
    <p>Created at: {{ $post[0] -> created_at }}</p>

    @guest
        <h2>Login to post a comment</h2>
    @else
        <h2>Comments on this thread:</h2>
        @foreach($comments as $comment)
            <div>
                <tr>
                    <td>{{$comment->userName}}</td>
                    <td>{{$comment->body}}</td>
                </tr>
            </div>
        @endforeach


        <div class="col-sm-8 col-sm-offset-2">
            <h1>Add new comment</h1>

            <form action=" {{route('comments.store')}}" method="post">

                {{ csrf_field() }}

                <input type="hidden" name="postID" value="{{ $post[0]->id }}">
                <input type="hidden" name="userName" value="{{Auth::user()->name}}">

                <div class="form-group">
                    <label for="body">Add comment:</label>
                    <input name="body" type="text" class="form-control">
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('posts.index') }}" class="btn btn-default pull-right">Go back</a>
            </form>
        </div>
    @endguest
@endsection