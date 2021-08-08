@section('header')
    <!doctype html>
    <html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="{{url('frontend/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('frontend/fontawesome/css/all.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('frontend/css/animate.css')}}"/>

        <link rel="stylesheet" type="text/css" href="{{url('frontend/css/custom.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{url('frontend/css/responsive.css')}}"/>

        <title>Dimple Media</title>

    </head>

    <body>


    <header>
        <div id="mainMenu">
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="{{route('index')}}">
                        <i class="fa fa-home"></i>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('about')}}">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Store</a>
                            </li>

                            @if(\Illuminate\Support\Facades\Auth::guard('web')->user())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('logout')}}">Logout</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('login')}}">Login</a>
                            @endif



                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>

@endsection
