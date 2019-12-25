@extends('layouts.app')

@section('content')
<div class="information-contenu">
    <h2 class="titre1">{{$serie->nom}} - Saison {{$ep->saison}} Épisode {{$ep->numero}}</h2>
    <h2> {{$ep->nom}}</h2>

    <img src="{{url($ep->urlImage)}}" alt="Image de la série">

    <p>Première : {{$ep->premiere}}
        <br>
        <br>
        Durée : {{$ep->duree}}
    </p>
</div>

<div class="information-contenu">
    <p class="information-resume">{!!$ep->resume  !!}</p>
    <br>
</div>

<div class="information-retour">
    <a href="{{route('series.index')}}">Retour</a>
</div>

@endsection
