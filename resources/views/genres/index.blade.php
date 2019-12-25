@extends('layouts.app')

@section('content')

<div class="height-auto">
<h2 class="titre1">Genres</h2>



@if(!empty($genres))
{{--        <div>--}}
{{--            <h4>Filtrage par nom des genres</h4>--}}
{{--            <form action="{{route('genres.index')}}" method="get">--}}
{{--                <select name="cat">--}}
{{--                    <option value="All" @if($cat == 'All') selected @endif></option>--}}
{{--                    @foreach($nom as $nom)--}}
{{--                        <option value="{{$nom}}"  @if($cat == $nom) selected @endif>{{$nom}}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--                <input type="submit" value="OK">--}}
{{--            </form>--}}
{{--        </div>--}}

<div class="liste-genres">

    <ul>

        @foreach($genres as $genre)
            <li><a href="{{route('genres.show',$genre->id)}}">{{$genre->nom}}</a>
            </li>

        @endforeach
    </ul>

</div>
@else
    <h3>Aucun genre</h3>
@endif

</div>
@endsection
