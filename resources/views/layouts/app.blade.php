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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
.bs-example {
    margin: 20px;
}

.modal-content iframe {
    margin: 0 auto;
    height: 450px;
    width: 450px;
    display: block;
}

.center {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 10px;
}

.navbar-default .navbar-nav>li>a:hover,
.navbar-default .navbar-nav>li>a:focus {
    background-color: #FFFF00;
    color: #FFC0CB;
}
</style>
<script>
$(document).ready(function() {
    /* Get iframe src attribute value i.e. YouTube video url
    and store it in a variable */
    var url = $("#cartoonVideo").attr('src');

    /* Assign empty url value to the iframe src attribute when
    modal hide, which stop the video playing */
    $("#myModal").on('hide.bs.modal', function() {
        $("#cartoonVideo").attr('src', '');
    });

    /* Assign the initially stored url back to the iframe src
    attribute when modal is displayed again */
    $("#myModal").on('show.bs.modal', function() {
        $("#cartoonVideo").attr('src', url);
    });
});
</script>

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
                                    <a href="{{route('home')}}" class="nav-link text-white"
                                        style="margin-left: 20px;">Home
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('videos.all')}}"
                                        style="margin-left: 20px;">Videos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('video.insert')}}"
                                        style="margin-left: 20px;">Insert</a>
                                </li>

                            </ul>
                            @endif
                            <ul class="navbar-nav ml-md-auto d-md-flex float-right">
                                @if (Auth::check())
                                <li class="nav-item">
                                    <a class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
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