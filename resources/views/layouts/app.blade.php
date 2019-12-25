<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('Title', 'TV Inside') }}</title>
    <!-- Styles -->

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet">
    <link href="{{asset('fontawesome/css/all.css')}}" rel="stylesheet">
</head>
<body>

{{--<header>--}}
{{--    <a href="{{ url('/') }}">--}}
{{--        {{ config('app.name', 'TV Inside') }}--}}
{{--    </a>--}}
{{--</header>--}}
<!-- Authentication Links -->
<nav>
    <div class="menu">
        <div class="links">
            <a href="{{route('home')}}"><img src="{{url('/img/logo_blanc.png')}}"></a>
            <a href="{{route('series.index')}}">Bibliothèque</a>
            <a href="{{route('genres.index')}}">Genres</a>
        </div>

        <div class="connexion">
            @guest
                <a href="{{ route('login') }}">Se connecter</a>
                <a href="{{ route('register') }}">S'inscrire</a>
            @else
                <a href="{{route('users.show',Auth::id())}}">{{Auth::user()->name}}</a>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Se déconnecter
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            @endguest
        </div>
    </div>
</nav>

<div id="main">
    @yield('content')
</div>
<!-- Scripts -->
<script src="{{ asset('js/jquery.js') }}"></script>
</body>
</html>
