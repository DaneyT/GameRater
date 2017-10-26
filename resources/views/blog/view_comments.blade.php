@extends('layouts.template')

@section('title', 'Comments overview')

@section('content')


    <div class="nav navbar-nav pull-right">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </li>
    </div>

    <h1>Your placed comments:</h1>
    <a href="{{route ('publicHomePage')}}" class="btn btn-primary pull-left">Back to Home</a>

    <br>

    <table class="table">
        <thead>
        <th>Date posted</th>
        <th>Comment</th>
        </thead>

        <tbody>
        @foreach($comments as $comment)
            <tr>
                <th>{{$comment->created_at}}</th>
                <td>{{$comment->body}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection