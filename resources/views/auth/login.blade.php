@extends('layouts.app')

@section('title','Iniciar sessão')

@section('content')

                <div class="card">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div>
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Email') }}</label>

                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div>
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Palavra-passe') }}</label>

                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div>
                                    <label for="remember">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Manter sessão iniciada') }}
                                    </label>
                        </div>

                        <div>
                                <button type="submit" class="btn btn-success">
                                    {{ __('Iniciar sessão') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Esqueceu-se da palavra-passe?') }}
                                </a>
                        </div>
                    </form>
                </div>
@endsection

<link rel="stylesheet" href="{{ asset('css/login.css') }}"/>
