<@extends('layouts.app')

@section('content')

<div class="all">

    <div class="height-auto">

    {{-- nom  --}}
    <p class="titre1"><strong>Nom : </strong>{{$genres->nom}}</p>

    <div class="liste">
        <ul>
        @foreach($series as $serie)
            <li><a href="{{route('series.show',$serie->id)}}">
                <img src="{{url($serie->urlImage)}}" alt="Image de la série">
                </a>
                <br/>
                <a href="{{route('series.show',$serie->id)}}">{{$serie->nom}}</a>
            </li>

            @endforeach
        </ul>
    </div>
</div>

<div class="div-bouton-retour-liste">
    <a class="bouton-retour-liste" href="{{route('genres.index')}}">Retour à la liste</a>
</div>

</div>
@endsection
