@extends('layouts.app')

@section('content')

    <h2 class="titre1">Modification d'un utilisateur</h2>


    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{--
         formulaire de saisie d'une tâche
         la fonction 'route' utilise un nom de route.
         '@csrf' ajoute un champ caché qui permet de vérifier
           que le formulaire vient du serveur.
         '@method('PUT') précise à Laravel que la requête doit être traitée
          avec une commande PUT du protocole HTTP.
      --}}

    <form action="{{route('users.update',$user->id)}}" method="POST" encrypte="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="text-center" style="margin-top: 2rem">
            <h3>Modification d'un utilisateur</h3>
            <hr class="mt-2 mb-2">
        </div>
        <div>
            {{-- Nom  --}}
            <label for="name"><strong>Nom :</strong></label>
            <input type="varchar" class="form-control" id="name" name="name"
                   value="{{ $user->name}}">
        </div>
        <div>
            {{-- Email --}}
            <label for="email"><strong>Date de sortie : </strong></label>
            <input type="varchar" name="email" id="email"
                   value="{{ $user->email }}">

        </div>
        <div>
            {{-- Password  --}}
            <label for="password"><strong>Mot de passe : </strong></label>
            <input type="varchar" class="form-control" id="password" name="password"
                   value="{{ $user->age_min}}">
        </div>

        <div>
            {{-- Avatar --}}
            <label for="avatar"><strong>Avatar : </strong></label>
            <input type="varchar" class="form-control" id="avatar" name="avatar"
                   value="{{ $user->avatar}}">
        </div>

        <div>
            <button class="btn btn-success" type="submit">Valide</button>
        </div>
    </form>
    <a href="{{route('users.show',$user->id)}}">Retour</a>
@endsection
