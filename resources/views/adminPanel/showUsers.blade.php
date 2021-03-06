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

    <h1>User overview</h1>
    <a href="{{route ('publicHomePage')}}" class="btn btn-primary pull-left">Back to Home</a>

    <br><br><br>


    <table class="table">
        <thead>
        <th>Name</th>
        <th>E-mail</th>
        <th>Admin</th>
        <th>delete</th>
        </thead>

        <tbody>
        @foreach($posts as $user)
            <tr>
                <th>{{$user->name}}</th>
                <td>{{$user->email}}</td>
                <td>
                    <form action=" {{route('promoteUser')}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <input type="hidden" name="admin" value="{{$user->admin}}">
                        <button type="submit" class="btn {{$user->admin ? 'btn-success' : 'btn-warning'}}">{{$user->admin ? 'Actief' : 'Inactief'}}</button>

                    </form>
                </td>
                <td>
                    <form action="{{ route('users.destroy', ['id' => $user->id]) }}" method="post">
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