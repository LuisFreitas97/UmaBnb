<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/extra.js') }}"></script>
    <script src="{{ asset('vendor/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('vendor/leaflet/leaflet.css') }}"/>
    <script src="{{ asset('vendor/leaflet/leaflet.js') }}"></script>
    <script src="{{ asset('vendor/jquery-ui/jquery-ui.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('vendor/jquery-ui/jquery-ui.css') }}"/>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.ico') }}"/>

</head>
<body>
    <div id="app">
        <nav>
                <a href="{{ url('/') }}">
                    <img src="{{ asset('favicon.ico') }}" class="navbar-logo"/>
                    {{ config('app.name', 'Laravel') }}
                </a>

                <h2>@yield('title')</h2>

                <div>
                            <a href="/anuncios">
                        <span class="fa fa-list-ul">{{ __('Anúncios') }}</span>
                            </a>
                        @guest

                                  <a href="{{ route('login') }}">
                                        <span class="fa fa-sign-in"/>
                            {{ __('Iniciar sessão') }}
                                    </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">
                                        <span class="fa fa-user-plus"/>
                            {{ __('Pedir conta') }}
                                    </a>
                                @endif

                        @else

                                    <a href="{{ route('inserirAnuncio') }}">
                                        <span class="fa fa-plus-square"/>
                            {{ __('Novo anúncio') }}
                                    </a>

                                <div class="dropdown">
                                   <img src="{{ asset('storage/images/profile-pic/'.Auth::user()->id) }}?{{rand()}}" onerror='this.onerror=null;this.src="{{ asset('storage/images/profile-pic/none.png') }}";' class="navbar-logo"/>
                                   {{ Auth::user()->name }}
                                   <span class="fa fa-caret-down"></span>
                                   <div class="dropdown-content">
                                        @admin
                                            <a href="{{ route('panel') }}" class="fa fa-database">
                                                {{ __('Painel administrativo') }}
                                            </a>
                                        @endadmin



                                    <a href="{{ route('profile') }}" class="fa fa-user-circle">
                                        {{ __('Editar perfil') }}
                                    </a>

                                    <a href="{{ route('myads') }}" class="fa fa-folder">
                                        {{ __('Meus anúncios') }}
                                    </a>

                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"  class="fa fa-sign-out">
                                {{ __('Terminar sessão') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>

                        @endguest
            </div>
        </nav>
        <section>
            <div class="container">
            @if ($errors->any())
                <ul>{!! implode('', $errors->all('<li style="color:red">:message</li>')) !!}</ul>
              @endif
                @if(Session::has('success'))
                    <div class="alert alert-success">
                    <strong>{{ Session::get('success') }}</strong>
                    </div>
                @endif

                @if(Session::has('error'))
                    <div class="alert alert-danger">
                    <strong>{{ Session::get('error') }}</strong>
                    </div>
                @endif
              @yield('content')
        </section>

    <footer>&copy; {{ config('app.name', 'Laravel') }} 2018. All Rights Reserved.
    </footer>

    </div>
</body>
</html>
