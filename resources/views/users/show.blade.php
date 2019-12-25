@extends('layouts.app')

@section('content')
    @guest
        <h2 class="titre1">Accès interdit</h2>
        <div class="information-contenu links">
            Désolé, vous n'êtes pas connecté.
            Vous ne pouvez pas voir cette page.
            <br>
            <br>
            <a style="text-decoration: underline;" href="{{route('register')}}">Inscrivez-vous</a>.
            <br>
            <br>
            Vous avez déjà un compte ?
            <a style="text-decoration: underline;" href="{{route('login')}}">Connectez-vous</a>.
        </div>
    @else
        @if(Auth::id()!=$users->id and Auth::user()->administrateur!=true)
            <h2 class="titre1">Accès interdit</h2>
            <div class="information-contenu links">
                Désolé, ceci n'est pas votre profil.
                Vous ne pouvez pas voir cette page.
                <br>
                <br>
                <a style="text-decoration: underline;" href="{{route('users.show',$users->id)}}">Voir votre profil</a>.
                <br>

                </div>
        @else
            <div class="information-contenu links">
                {{-- nom  --}}
                <h2 class="titre1">{{$users->name}}</h2>
                <img src="{{$users->avatar}}" alt="Avatar de l'utilisateur">
                <br>
                <p><strong>Utilisateur : </strong>{{$users->name}}</p>
                <p><strong>Adresse mail : </strong>{{$users->email}}</p>

                <br>

                <a style="text-decoration: underline;" href="{{route('users.edit',$users->id)}}">Modifier le compte</a>
                <a style="text-decoration: underline;" href="{{$users->id}}?action=delete">Supprimer le compte</a>


                <h2>Statistique : </h2>
                <p>
                    Durée passée à regarder des séries:<b>{{$duree}} min</b>
                </p>
                <p>
                    Nombre de series regardées:<b>{{$nbSerieVue}}</b>
                    <br>
                </p>

                <h2>Series vues:</h2>
                <div class="liste">
                <ul class="series-grid">

                    @foreach($series as $ser)
                        <li class="links">
                            <a href="{{route('series.show',$ser->id)}}">
                                <img src="{{url($ser->urlImage)}}" alt="image de la série">
                                <br>
                                {{$ser->nom}}
                            </a>
                        </li>
                    @endforeach
                </ul>
                </div>

                <br>

                <p>Nombre de commentaires:<b>{{$nbCom}}</b></p>
                <h2>Commentaires postés:</h2>

                <div class="liste">
                    <ul class="series-grid">
                        @foreach($users->commente as $com)
                            <li class="links">
                                <b>{{$com->serie->nom}}</b>
                                <br>
                                <b>"</b>
                                {{$com->content}}
                                <b>"</b>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>
            @endif
    @endguest
@endsection
