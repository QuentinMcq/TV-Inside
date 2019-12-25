@extends('layouts.app')

@section('content')>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{route('series.update',$serie->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="text-center" style="margin-top: 2rem">
        <h3>Ajout ou Modification d'un avis de la redaction</h3>
        <hr class="mt-2 mb-2">
    </div>


    <div>

        {{-- content --}}
        <label for="avis"><strong>Content : </strong></label>
        <textarea type="text" id="avis" rows = "2" name="avis" class="form-control"> {{ old('avis') }}
    </textarea>
    </div>

    <div>
        <button class="btn btn-success" type="submit" value="valide">Valide</button>
    </div>

    <button type="button"><a href="{{route("series.show",[$serie->id])}}">Annuler</a></button>

</form>
@endsection
