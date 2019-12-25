@extends('layouts.app')
{{ config('app.name', $serie->nom.'- TV Inside') }}


@section('content')

    <div class="information-series">
        <h2>{{$serie->nom}}</h2>

            <img src="{{url($serie->urlImage)}}" alt="Image de la série">

                <div class="information-saisons">
                    @for($currentSeason=1;$currentSeason<=$saisons;$currentSeason++)
        <a href="{{route("showSaison",[$serie->id,$currentSeason])}}"> Saison {{$currentSeason}}</a>
                    @endfor
                </div>

                    <p class="information-statut">Début : {{$serie->premiere}}<br><br>Statut : {{$serie->statut}}</p>

                        <b class="note"> Note : {{$serie->note}}</b>
    </div>

    <div class="information-contenu">
        <p class="information-resume">{!!$serie->resume  !!}</p>
        <br>
    </div>


    <div class="information-avis">
        <p>{!! $serie->avis !!}</p>
        <br>
        @guest
        @else
            @if(Auth::user()->administrateur==1)
                <button type="button" ><a href="{{route('editAvis',[$serie])}}">Ajouter ou Modifier l'avis de la rédaction</a></button>
            @endif
        @endguest
    </div>

    <div class="information-contenu">
        @if($serie->urlAvis!=NULL)
            <video controls width="50%">
                <source src="{{url($serie->urlAvis)}}"
                type="video/webm">
            </video>
            <br><br>
        @endif



        <b class="information-langue">Langue : {{$serie->langue}}</b>
    </div>

    <div class="information-contenu">

        @guest
        @else
            <button type="button" ><a href="{{route('comments.create')}}">Ajouter un commentaires pour cette série</a></button>
        @endguest


        <div class="commentaires">
            <p>Les commentaires :</p><br>
            <ul>
            @foreach($comments as $comment)
                @if($comment->validated==true)
                    <li>
                        <a href="{{route('comments.show',$comment->id)}}"> {{$comment->content}}<br></a>
                    </li>
                @endif
            @endforeach
            </ul>
        </div>

    </div>

    <br>

    @guest
    @else
    <form action="{{route('comments.store')}}" method="POST">
        @csrf
    <label for="content"><strong>Laisser un commentaire : </strong></label>
    <textarea type="text" id="content" rows = "1" name="content" class="form-control"> {{ old('content') }}
    </textarea>
        <input type="hidden" value="{{$serie->id}}" name="serie_id"/>
    <label for="note"><strong>Note (/10) : </strong></label>
    <input type="integer" id="note" name="note">
        <button class="btn btn-success" type="submit">Valide</button>
    </form>
    @endguest


    <div class="information-retour">
        <a href="{{route('series.index')}}">Retour</a>
    </div>
@endsection
