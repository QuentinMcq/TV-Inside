@extends('layouts.app')

@section('content')

{{--
   messages d'erreurs dans la saisie du formulaire.
--}}


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
     formulaire de saisie d'un commentaire
     la fonction 'route' utilise un nom de route
     'csrf_field' ajoute un champ caché qui permet de vérifier
       que le formulaire vient du serveur.
  --}}

<form action="{{route('comments.store')}}" method="POST">
    @csrf
    <div class="text-center" style="margin-top: 2rem">
        <h3>Création d'un commentaire</h3>
        <hr class="mt-2 mb-2">

    </div>
        {{-- content --}}
    <label for="content"><strong>Contenu: </strong></label>
    <textarea type="text" id="content" rows = "2" name="content" class="form-control"> {{ old('content') }}
    </textarea>
    <div>

        {{-- note --}}
        <label for="note"><strong>Note (/10) : </strong></label>
        <input type="integer" id="note" name="note">
    </div>

    <div>
        <button class="btn btn-success" type="submit">Valide</button>
    </div>
</form>

@endsection
