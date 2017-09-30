@extends('layouts.publicHomePageTemplate')

@section('title','Blog Public Home Page')

    @section('content')



        {{--container for containing top 10 posts in specified Post categories--}}
        <div>
            <h2>Top 10 Most recent blogs</h2>

            @foreach($posts as $post)

                <div class="well well-lg">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ $post->body }}</p>
                </div>

                @endforeach

            <div class="row text-center">
                {{ $posts->links() }}
            </div>


        </div>


    @endsection

