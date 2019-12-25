@extends('layouts.app')

@section('content')


@if(!empty($comments))
    <h3 class="titre1">Filtrage par catégorie</h3>
    <div class="information-contenu">

        <form action="{{route('comments.index')}}" method="get">
            <label>
                <select name="cat">
                    <option value="All" @if($cat == 'All') selected @endif></option>
                    @foreach($series_id as $serie_id)
                        <option value="{{$serie_id}}"  @if($cat == $serie_id) selected @endif>{{$serie_id}}</option>
                    @endforeach
                </select>
            </label>
            <input type="submit" value="OK">
        </form>
    </div>
    <ul class="liste links">
        @foreach($comments as $comment)
            <br>
            <li><a href="{{route('comments.show', $comment->id)}}"> {{$comment->content}} <b>{{$comment->note}}/10</b></a></li>
        @endforeach
    </ul>
@else
    <h3>Aucun commentaire</h3>
@endif

@endsection
