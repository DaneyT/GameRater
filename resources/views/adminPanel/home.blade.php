@extends('layouts.template')

@section('title', 'Blog admin panel')

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

    <h1>Admin Panel</h1>
    <a href="{{route ('publicHomePage')}}" class="btn btn-primary pull-left">Back to Home</a>

    <a href="{{ route('showUsers') }}" class="btn btn-primary pull-right">View all Users</a>

    <a href="{{ route('posts.create') }}" class="btn btn-primary pull-right">Add new blog post</a>

    <br><br><br>
    
    <table class="table">
        <thead>
        <th>id</th>
        <th>title</th>
        <th>genre</th>
        <th>body</th>
        <th>edit</th>
        <th>delete</th>
        </thead>

        <tbody>
        @foreach($posts as $post)
        <tr>
            <th>{{$post->id}}</th>
            <td>{{$post->title}}</td>
            <td> {{$post->labelGenre}}</td>
            <td>{{$post->body}}</td>


            <td>
                <form action=" {{route('switchStatusPost')}}" method="POST">
                    {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$post->id}}">
                <input type="hidden" name="postActive" value="{{$post->postActive}}">
                <button type="submit" class="btn {{$post->postActive ? 'btn-success' : 'btn-warning'}}">{{$post->postActive ? 'Actief' : 'Inactief'}}</button>
            </form>
            </td>

            <td><a href="{{ route('posts.edit', ['id'=>$post->id]) }}" class="btn btn-info">Edit</a></td>
            <td>
                <form action="{{ route('posts.destroy', ['id' => $post->id]) }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE">
                    <input class="btn btn-danger" type="submit" value="Delete">
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection