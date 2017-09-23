<!docutype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-sclae=1.0,
minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.1.1.min.js" rel="script"></script>
    <script type="text/javascript" src="/public/js/popper.min.js" rel="script"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" rel="script"></script>
<title>Document</title>
</head>
<body>
<div class="container">
    <h1>Welcome to the Blog</h1>

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

    {{--Menu for different post category organisation--}}
    <nav class="navbar navbar-default">
        <div class="containter-fluid">
            <ul class="nav navbar-nav">


                <ul>
                    <li><a href="">Top 10 most Recent Posts</a></li>
                    <li><a href="">Top 10 Liked posts</a></li>
                    <li><a href="">Top 10 Most Commented Posts</a></li>
                    <li><a href="">Top 10 Most Visited Posts</a></li>

                </ul>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="">Manage blogpost</a></li>
            </ul>
        </div>

    </nav>

    {{--container for containing top 10 posts in specified Post categories--}}
    <div>
        <h2>Top 10 Most recent blogs</h2>

        <div class="well well-lg">
            <h3>Blog Post Title</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium amet asperiores dolor error et ex illum itaque, iusto laboriosam laudantium molestiae natus non omnis pariatur quasi quibusdam sapiente voluptate.</p>
        </div>

        <div class="well well-lg">
            <h3>Blog Post Title</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium amet asperiores dolor error et ex illum itaque, iusto laboriosam laudantium molestiae natus non omnis pariatur quasi quibusdam sapiente voluptate.</p>
        </div>

        <div class="well well-lg">
            <h3>Blog Post Title</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium amet asperiores dolor error et ex illum itaque, iusto laboriosam laudantium molestiae natus non omnis pariatur quasi quibusdam sapiente voluptate.</p>
        </div>

        <div class="well well-lg">
            <h3>Blog Post Title</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium amet asperiores dolor error et ex illum itaque, iusto laboriosam laudantium molestiae natus non omnis pariatur quasi quibusdam sapiente voluptate.</p>
        </div>

        <div class="well well-lg">
            <h3>Blog Post Title</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium amet asperiores dolor error et ex illum itaque, iusto laboriosam laudantium molestiae natus non omnis pariatur quasi quibusdam sapiente voluptate.</p>
        </div>

        <div class="well well-lg">
            <h3>Blog Post Title</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium amet asperiores dolor error et ex illum itaque, iusto laboriosam laudantium molestiae natus non omnis pariatur quasi quibusdam sapiente voluptate.</p>
        </div>

        <div class="well well-lg">
            <h3>Blog Post Title</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium amet asperiores dolor error et ex illum itaque, iusto laboriosam laudantium molestiae natus non omnis pariatur quasi quibusdam sapiente voluptate.</p>
        </div>

        <div class="well well-lg">
            <h3>Blog Post Title</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium amet asperiores dolor error et ex illum itaque, iusto laboriosam laudantium molestiae natus non omnis pariatur quasi quibusdam sapiente voluptate.</p>
        </div>

        <div class="well well-lg">
            <h3>Blog Post Title</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium amet asperiores dolor error et ex illum itaque, iusto laboriosam laudantium molestiae natus non omnis pariatur quasi quibusdam sapiente voluptate.</p>
        </div>

        <div class="well well-lg">
            <h3>Blog Post Title</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium amet asperiores dolor error et ex illum itaque, iusto laboriosam laudantium molestiae natus non omnis pariatur quasi quibusdam sapiente voluptate.</p>
        </div>
    </div>


</div>
</body>
</html>