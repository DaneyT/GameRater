@extends('layouts.viewPostTemplate')

@section('title', 'View Post #'. $post[0]->id)

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
        <h1>Add new comment</h1>
        <div class="col-sm-8 col-sm-offset-2">
            <form action=" {{route('posts.store')}}" method="post">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Add comment:</label>
                    <input name="title" type="text" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('posts.index') }}" class="btn btn-default pull-right">Go back</a>
            </form>
        </div>
    @endguest
@endsection