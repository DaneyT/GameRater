@extends('layouts.publicHomePageTemplate')

@section('title','Blog Public Home Page')

    @section('content')


        {{--{!! Form::open(['method'=>'GET','url'=>'searchPosts','class'=>'navbar-form navbar-left','role'=>'search'])  !!}--}}

        <form action=" {{route('searchPosts')}}" method="GET" class="navbar-form navbar-left">

            {{ csrf_field() }}

        <div class="input-group custom-search-form">
            <input type="text" class="form-control" name="search" placeholder="Search...">
            <span class="input-group-btn">
        <button class="btn btn-default-sm" type="submit">
            <i class="fa fa-search"><!--<span class="hiddenGrammarError" pre="" data-mce-bogus="1"--></i>
        </button>
        </span>
        </div>
        {{--{!! Form::close() !!}--}}
        </form>

        {{--container for containing top 10 posts in specified Post categories--}}
        <div>
            <h2>Top 10 Most recent blogs</h2>

            @foreach($posts as $post)

                <div class="well well-lg">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ $post->body }}</p>
                    <a href="{{ route('posts.show', ['id' => $post->id]) }}" class="btn ntn-default pull-right">View Post</a>
                    &nbsp
                </div>

                @endforeach

            <div class="row text-center">
                {{ $posts->links() }}
            </div>


        </div>



    @endsection

