<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{ asset('js/app.js') }}"></script>

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>@yield('page_title')</title>
    @yield('header_scripts')
    @yield('styles')
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md">
        <div class="container">
            {{--                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
            {{--                    <span class="navbar-toggler-icon"></span>--}}
            {{--                </button>--}}

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <a href="/" class="logo">
                        <li>fauxtion</li>
                    </a>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <label id="menu" for="check">
                        <input type="checkbox" id="check" class="check"/>
                        <span></span>
                        <span></span>
                        <span></span>
                    </label>
                    <div class="toggleMenu">
                        <li class="nav-item">
                            <a class="nav-link" href="/about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contact">Contact</a>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Useful links
                            </a>

                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="/terms-conditions">Terms &amp; Conditions</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/privacy-policy">Privacy policy</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/shipping-policy">Shipping policy</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/return-policy">Return policy</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            @if(Auth::user()->type == 1)
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin">Admin</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </li>
                        @endguest
                    </div>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
@yield('footer_scripts')
<script>

    $("#menu").click(function () {
        $("input#check").on("change", function () {
            if ($(this).is(':checked')) {
                $('.toggleMenu').slideDown();
                $('.navbar').css('background', '#f0f0ef');
            } else {
                $('.toggleMenu').slideUp();
                $('.navbar').css('background', 'none');
            }
        });
    });
</script>
</body>
</html>
