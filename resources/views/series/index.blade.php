@extends('layouts.app')

@section('content')

<div>
    <h1 class="titre1">Bibliothèque</h1>


    {{--vérifie si il y a des séries dans la base--}}

    @if(!empty($series))

        <div class="series-filtrage">
            <h3>Filtrage par genre</h3>
                <form action="{{route('series.index')}}" method="get">
                    <label>
                        <select name="cat">
                            <option value="-1" @if($cat == '-1') selected @endif>All</option>
                            @foreach($noms as $nom)
                                <option value="{{$nom->id}}"  @if($cat == $nom->id) selected @endif>{{$nom->nom}}</option>
                            @endforeach
                        </select>
                    </label>
                    <div class="recherche">
                        <input type="submit" value="Rechercher">
                        <i class="fas fa-search"></i>
                    </div>
                </form>
        </div>
<div class="parent1" style=".parent1::before {
    background: url({{url('/img/wave.svg')}}) no-repeat;}">
        <div class=""enfant>

        <ul class="series-grid">
            @foreach($series as $serie)
                <li>
                    <a href="{{route('series.show',$serie->id)}}">
                        <img src="{{url($serie->urlImage)}}" alt="image de la série">
                        <br>
                        <div class="nom-serie">
                            {{$serie->nom}}
                        </div>
                    </a>
                </li>
{{--                <br>--}}

            @endforeach
        </ul>

        </div>
    <div class="bouton-retour">

        <a href="/">Retour</a>

    </div>
    </div>
</div>

@else
    <h2>Pas de séries</h2>
@endif


@endsection

