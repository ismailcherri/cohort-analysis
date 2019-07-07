<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @yield('head')
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample07">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ Route::currentRouteName() === 'home' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                @auth
                    <li class="nav-item {{ Route::currentRouteName() === 'retention-stats' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('retention-stats') }}">Retention Stats</a>
                    </li>
                @endauth
            </ul>
            @if (Route::has('login'))
                <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>

                    @endauth
                </ul>
            @endif

        </div>
    </div>
</nav>

<div id="main">
    @section('content')

    @show
</div>
@yield('scripts')
</body>
</html>
