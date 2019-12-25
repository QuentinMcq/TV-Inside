<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<head>
    @section('head')
        <meta charset="UTF-8">
    @show
    <br>
        <br>
    <title>{{ config('app.name', 'TP Laravel') }} - @yield('title', 'Accueil')</title>
</head>
<body>

<img src="{{url('storage/logo.jpg')}}" alt="le logo">

@section('navbar')
    <!--<p>En attente d'un menu.</p>-->
@show

<div class="container">
    @yield('content', 'En Attente d\'un contenu')
</div>

@section('footer')
    <br>
    <br>
    <br>
    <br>
    <br>
    <footer class="color">
        <br>
        <b>IUT de Lens - Département Info - TP Laravel</b>
    </footer>
@show

</body>
</html>
