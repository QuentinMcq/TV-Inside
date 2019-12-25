@extends('layouts.app')

@section('content')

@if(!empty($episodes))
    <div>
        <h3>Filtrage par numéro</h3>
        <form action="{{route('episodes.index')}}" method="get">
            <label>
                <select name="cat">
                    <option value="All" @if($cat == 'All') selected @endif></option>
                    @foreach($numeros as $numero)
                        <option value="{{$numero}}"  @if($cat == $numero) selected @endif>{{$numero}}</option>
                    @endforeach
                </select>
            </label>
            <input type="submit" value="OK">
        </form>
    </div>
    <ul>
        @foreach($episodes as $episode)
            <li> Saison {{$episode->saison}} |
                Episode {{$episode->numero}} : {{$episode->nom}}
                {!!($episode->resume)!!}
                Durée : {{$episode->duree}} min<br>
                Première : {{$episode->premiere}}<br>

                @if($episode->urlImage!=NULL)
                    <br>
                    <img src="{{($episode->urlImage)}}" alt="Image">
                @endif

            </li>
            <br>

        @endforeach
    </ul>

@else
    <h3>Aucun épisode</h3>
@endif

@endsection
