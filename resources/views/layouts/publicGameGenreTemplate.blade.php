<!docutype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-sclae=1.0,
minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>


    <title>@yield('title')</title>
</head>
<body>
<div class="container">
    <div class="loginBox nav navbar-nav pull-right">
        @guest
        <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('register') }}">Register</a></li>
        @else
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
            @endguest
    </div>


    <div>
        <h1>Select a game from the categories below to start a discussion</h1>
        <h2>Please login to join the discussion on games!</h2>
    </div>




    {{--Menu for different post category organisation--}}
    <nav class="navbar navbar-default">

        <form action=" {{route('view_gamesFromGenre')}}" method="POST">

            {{ csrf_field() }}

            <div class="form-group">
                <label for="labelGenre">Genre:</label>
                <select name="labelGenre">
                    <option value="rpg" selected>RPG</option>
                    <option value="strategy">Strategy</option>
                    <option value="firstpersonshooter">FPS</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('posts.index') }}" class="btn btn-default pull-right">Go back</a>
        </form>


    </nav>

    {{--container for containing top 10 posts in specified Post categories--}}
    <div>
        @yield('content')

        <div class="footer text-center" style="margin: 20px 0 60px 0;">
            <p>@copy; Daney Timmers</p>
        </div>
    </div>

</div>
</body>
</html>