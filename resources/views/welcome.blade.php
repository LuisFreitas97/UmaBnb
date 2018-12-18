@extends('layouts.app')



@section('content')
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">    
    <div class="content imageBackGround">
        <div class="title m-b-md">
            <h1>Reserve já o seu quarto!</h1>
        </div>
    </div>
    <div class="content">
            <h1> Em Destaque</h1>
    </div>
        <div class="inline">
        @foreach($anuncios as $anuncio)
        <a href="/anuncios/{{$anuncio->id}}"> 
            <div class="destaques">
                <img src="{{$anuncio->image}}">
                <h1 class="centered"> {{$anuncio->price}} €</h1>
            </div>
        </a>
        @endforeach
        </div>
@endsection
