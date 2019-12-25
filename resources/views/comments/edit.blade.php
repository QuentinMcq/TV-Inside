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
     la fonction 'route' utilise un nom de route.
     '@csrf' ajoute un champ caché qui permet de vérifier
       que le formulaire vient du serveur.
     '@method('PUT') précise à Laravel que la requête doit être traitée
      avec une commande PUT du protocole HTTP.
  --}}

<form action="{{route('comments.update',$comment->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="text-center" style="margin-top: 2rem">
        <h3>Modification d'un commentaire</h3>
        <hr class="mt-2 mb-2">
    </div>


    <div>

        {{-- content --}}
    <label for="content"><strong>Contenu : </strong></label>
    <textarea type="text" id="content" rows = "2" name="content" class="form-control"> {{ old('content') }}
    </textarea>
    </div>
    <div>

        {{-- note --}}
        <label for="note"><strong>Note : </strong></label>
        <input type="integer" id="note" name="note" value="{{$comment->note}}">
    </div>


    <div>
        <button class="btn btn-success" type="submit" value="valide">Valide</button>
    </div>


</form>
@endsection
