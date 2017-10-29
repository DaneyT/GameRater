@extends('layouts.publicGameGenreTemplate')

@section('title','View games from genre')

@section('content')



    {{--container for containing top 10 posts in specified Post categories--}}
    <div>
        <a href="{{route ('publicHomePage')}}" class="btn btn-primary pull-right">Back to Home</a>

        <h2>Games from this genre</h2>

        @foreach($post as $posts)

            <div class="well well-lg">
                <h3>{{ $posts->title }}</h3>
                <p>{{ $posts->body }}</p>
                <p>{{ $posts->labelGenre }}</p>
                <p>Comments on this game:{{$posts->comment}}</p>
                <a href="{{ route('posts.show', ['id' => $posts->id]) }}" class="btn ntn-default pull-right">View Post</a>
                &nbsp
            </div>

        @endforeach

        <div class="row text-center">
            {{ $post->links() }}
        </div>


    </div>


@endsection

