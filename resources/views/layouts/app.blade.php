<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
            <div class="container">
                    <div class="is-centered">
                        <a class="navbar-item is-centered is-horizontal-center" href="/">
                            <img src="https://bulma.io/images/bulma-logo.png"  width="112" height="28">
                        </a>
                        <div class="buttons is-centered">
                            @guest
                                
                                @if (Route::has('register'))
                                    <a class="button is-primary is-centered" href="{{ route('register') }}">
                                        <strong>Sign up</strong>
                                    </a>
                                @endif
                                <a class="button is-light is-centered" href="{{ route('login') }}">
                                        Log in
                                    </a>
                                @else
                                <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>
        
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
        
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                        </div>
                    </div>
                </div>
                  {{-- <nav class="navbar" role="navigation" class="is-centered" aria-label="main navigation">
                    <div class="navbar-brand">
                      <a role="button" class="navbar-burger burger button is-primary" aria-label="menu" aria-expanded="false" onclick="document.querySelector('.below').classList.toggle('is-active');" data-target="belownav">
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                      </a>
                    </div>
                  
                    <div id="belownav" class="navbar-menu below is-centered navsearch">
                      <div class="navbar-start">
                            <a class="navbar-item menuitemnav" href="/house">
                                Houses
                            </a>
                            <a class="navbar-item menuitemnav" href="/land">
                                Lands
                            </a>
                            <a class="navbar-item menuitemnav" href="/apartment">
                                Apartments
                            </a>
                            <a class="navbar-item menuitemnav" href="/building">
                                Buildings
                            </a>
                            <a class="navbar-item menuitemnav" href="/warehouse">
                              Warehouses
                            </a>
                            <a class="navbar-item menuitemnav" href="/blog">
                              Blog
                            </a>
                            <a class="navbar-item menuitemnav" href="/about">
                              About
                            </a>
                            <a class="navbar-item menuitemnav" href="/contactus">
                              Contact Us
                            </a>
                      </div>
                      <div class="navbar-end">
                      <div class="navbar-item">
                      
                      </div>
                    </div>
                    </div>
                  </nav>                
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
