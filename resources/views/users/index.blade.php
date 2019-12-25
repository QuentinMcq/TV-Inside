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

            <h2 class="titre1">Utilisateurs</h2>

            <div class="information-contenu">
            @if(!empty($users))
                <ul class="liste links">

                    @foreach($users as $user)
                        <!--<li>auth::user
                        </li>-->

                        <a href="{{route('users.show',$user->id)}}">{{$user->name}}</a>
                        <br>
                    @endforeach
                </ul>
            @else
                <h3>Il n'y a pas d'utilisateur </h3>
            @endif
            </div>
        @endif
    @endguest

@endsection
