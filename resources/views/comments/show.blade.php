@extends('layouts.app')

@section('content')

<h2 class="titre1">{{$serie->nom}}</h2>
<div class="information-contenu">
    {{-- Content --}}
    <p><strong>Contenu  : </strong>{{$comment->content}}</p>
</div>

<div class="information-contenu">
    {{-- Note --}}
    <b class="note"><strong>Note : </strong>{{$comment->note}}</b>
</div>


@guest
@else
    @if(Auth::id()==$comment->user_id or Auth::user()->administrateur==true)

        <div class="information-contenu">

            <form action="{{route('comments.destroy',$comment->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <div class="text-center">
                    <button type="submit" name="modify" value="modify">Modifier</button>
                    <button type="submit" name="delete" value="delete">Supprimer</button>
                    <button type="submit" name="back" value="back">Retour</button>
                </div>
            </form>

        </div>
    @endif
@endguest

@endsection

