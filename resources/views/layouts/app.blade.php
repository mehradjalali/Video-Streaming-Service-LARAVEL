<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('assets/styles/style.css')}}" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<Body background="{{asset('assets/img/bg.jpg')}}">

    <body>
        <div id="wrapper">
            <nav class="navbar header-top fixed-top navbar-expand-lg  navbar-dark bg-dark">
                <div class="container">
                    <img src="{{asset('assets/img/logo.png')}}" width=" 35" height="35"></img>
                    <button class=" navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarText">
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            @if (Auth::check())
                            <ul class="navbar-nav side-nav">
                                <li class="nav-item">
                                    <a class="nav-link text-white" style="margin-left: 20px;" href="#">Home
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" style="margin-left: 20px;">Videos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" style="margin-left: 20px;">Upload</a>
                                </li>

                            </ul>
                            @endif
                            <ul class="navbar-nav ml-md-auto d-md-flex">
                                @if (Auth::check())
                                <li class="nav-item">
                                    <a class="nav-link" href="#" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                                @else
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="nav-link">Login</a>
                                </li>
                                @endif
                            </ul>
                        </div>

                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container-fluid">
                <main class="py-4">
                    @yield('content')
                </main>
            </div>
        </div>
        <script type="text/javascript">

        </script>
    </body>

</html>