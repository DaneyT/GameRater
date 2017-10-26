@extends('layouts.publicGameGenreTemplate')

@section('title','Game genres')

@section('content')


    <a href="{{route ('publicHomePage')}}" class="btn btn-primary pull-right">Back to Home</a>

    {{--container for containing top 10 posts in specified Post categories--}}
    <div>
        <h2>Latest comments:</h2>

        @foreach($comments as $comment)

            <div class="well well-lg">
                <h3>{{ $comment->userName }}</h3>
                <p>{{ $comment->body }}</p>
                {{--<a href="{{ route('posts.show', ['id' => $post->id]) }}" class="btn ntn-default pull-right">View Post</a>--}}
                &nbsp
            </div>

        @endforeach

        {{--<div class="row text-center">--}}
            {{--{{ $posts->links() }}--}}
        {{--</div>--}}


    </div>


@endsection