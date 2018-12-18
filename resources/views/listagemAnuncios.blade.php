@extends('layouts.app')

@section('title','Anúncios')
<link href="{{ asset('css/anuncios.css') }}" rel="stylesheet">
<script src="{{ asset('js/anuncios.js') }}"></script>
@section('content')
<div class="filterBar">
    <select id="tipologia">
        <option value="0">Tipologia</option>
        @foreach($tipologias as $tipologia)
            <option value="{{$tipologia->id}}">{{$tipologia->description}}</option>
        @endforeach
    </select>
    <select id="tipoAluguer">
        <option value="0">Tipo aluguer</option>
        @foreach($tiposAluguer as $tipoAluguer)
            <option value="{{$tipoAluguer->id}}">{{$tipoAluguer->description}}</option>
        @endforeach
    </select>
    <input id="precoDe" type="number" placeholder="Preço de">
    <input id="precoAte" type="number" placeholder="Preço até">

    <select id="donoReside">
        <option value="">Dono reside na casa</option>
        <option value="1">Sim</option>
        <option value="0"> Não</option>
    </select>
    <select id="factura">
        <option value="">Passa factura</option>
        <option value="1">Sim</option>
        <option value="0"> Não</option>
    </select>
    <select id="caucao">
        <option value="">Requer caução</option>
        <option value="1">Sim</option>
        <option value="0"> Não</option>
    </select>
    <button onclick="filtrarAnuncios()">Filtrar</button>
</div>
<div id="container">
    @foreach($anuncios as $anuncio)
    <a href="/anuncios/{{$anuncio->id}}">
    <div id="{{$anuncio->id}}" class="card">
                <img src="{{asset($anuncio->image)}}" class="ad-thumbnail" />
                <h3> <b>{{$anuncio->title}}</b></h3>
                <h5> {{$anuncio->address}} </h5>
                <label> {{$anuncio->description}} </label>
    </div>
    </a>
    @endforeach
</div>
{{ $anuncios->links() }}
@endsection
