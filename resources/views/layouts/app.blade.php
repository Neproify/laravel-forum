<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') || {{ Config::get('app.name') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <script src="/ckeditor/ckeditor.js"></script>
</head>
<body>
    <nav class="navbar navbar-light bg-faded">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ Config::get('app.name') }}
            </a>

            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/forum') }}">Forum</a>
                </li>
                @if (Auth::check())
                    @if (Auth::user()->isAdmin())
                        <li class="nav-item dropdown">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Panel administratora</a>
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="{{ url('/admin') }}">Dashboard</a>
                                <a class="dropdown-item" href="{{ url('/admin/forum') }}">Fora</a>
                                <a class="dropdown-item" href="{{ url('/admin/user') }}">Użytkownicy</a>
                            </div>
                        </li>
                    @endif
                @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav pull-xs-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/login') }}">Zaloguj</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/register') }}">Zarejestruj</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="{{ Auth::user()->getUrl() }}">{{ Auth::user()->name }}</a>

                            <a class="dropdown-item" href="{{ url('/logout') }}" onclick="event.preventDefault(); 
                                document.getElementById('logout-form').submit();">
                                Wyloguj
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>

                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </nav>

    @yield('content')

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>