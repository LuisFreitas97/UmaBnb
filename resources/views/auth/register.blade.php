@extends('layouts.app')

@section('title','Pedir conta')

@section('content')
            <div class="card">

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        As suas credenciais serão enviadas para o seu endereço de correio eletrónico.
                        <br/>
                        <i>(verifique as pastas de spam)</i>
                        <br/>
                        <br/>

                        <div>
                            <label for="number">{{ __('Número mecanográfico') }}</label>

                                <input id="number" type="number" name="number" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                                <button type="submit" class="btn btn-primary">
                                    {{ __('Pedir conta') }}
                                </button>
                    </form>
            </div>
@endsection
<link rel="stylesheet" href="{{ asset('css/register.css') }}"/>
