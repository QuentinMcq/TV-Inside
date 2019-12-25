@extends('layouts.app')

@section('content')

<h2 class="titre1">{{$serie->nom}} - Saison {{$saison}}</h2>
<br>
<div class="information-contenu">
<img src="{{url($serie->urlImage)}}" alt="Image de la série">
<ul class="liste">
    @foreach($episodes as $ep)
        @if($ep->saison==$saison)
            <li><a href="{{route('episodes.show',$ep->id)}}">{{$ep->nom}}</a></li>
        @endif

    @endforeach
</ul>
</div>
@endsection
