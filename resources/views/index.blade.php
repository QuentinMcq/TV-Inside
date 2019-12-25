@extends('layouts.app')

@section('content')

    <h2 class="title-accueil">Plongez dans vos séries préférées</h2>
@if(!empty($series))

    <div id="caroussel">
            <ul>
                <figure>
                    @foreach($series as $serie)
                        <li>
                            <a href="{{route('series.show',$serie->id)}}">
                                <img src="{{url($serie->urlImage)}}" alt="image de la série">
                            </a>
                        </li>
                        <br>
                        <p>{{$serie->nom}}</p>
                    @endforeach
                    </figure>
            </ul>
    </div>

    <div class="grid-accueil">
    @foreach ($series as $serie)
        <a href="{{route('series.show',$serie->id)}}" ><img src="{{url($serie->urlImage)}}" alt="image de la série"></a>
            <div class="texte1">
                <a href="{{route('series.show',$serie->id)}}" ><h2>{{$serie->nom}}</h2></a>
                <p>{!!$serie->resume!!}</p>
            </div>
    @endforeach
    </div>

@else
    <h3>Aucune série</h3>
@endif
@endsection
