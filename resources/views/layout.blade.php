<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" />
    </head>
    <body>
    <nav class="navbar navbar-default bg-navbar-custom">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">WD Studio</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ route('pageName', ['name' => 'about']) }}">About Us</a></li>
                <li><a href="{{ route('pageName', ['name' => 'contacts']) }}">Contacts</a></li>
            </ul>
            @if (Route::has('login'))
                <ul class="nav navbar-nav navbar-right">
                    @auth
                        <li><a href="{{ url('/') }}">Home</a></li>
                    @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @endauth
                </ul>
            @endif
        </div>
    </nav>
        <div class="flex-center position-ref full-height">

            <div class="content">
                @yield('content')
            </div>
        </div>
        <footer>
            <div class="footer-wrapper">
                &copy; 2018 WD Studio
            </div>
        </footer>
    </body>
</html>
