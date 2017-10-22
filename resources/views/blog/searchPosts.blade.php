@extends('layouts.publicHomePageTemplate')
@section('title','Blog Public Home Page')

@section('content')


    <div class="panel panel-default">

        <table class="table table-bordered table-hover" >
            <tbody>
            @foreach($posts as $post)

            <div class="well well-lg">
            <h3>{{ $post->title }}</h3>
            <p>{{ $post->body }}</p>
            <a href="{{ route('posts.show', ['id' => $post->id]) }}" class="btn ntn-default pull-right">View Post</a>
            &nbsp
            </div>

            @endforeach
            </tbody>
        </table>
    </div>


@endsection

