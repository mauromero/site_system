<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SITE System</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" media="all">
</head>
<body >
    <div id="app"  >
    
        <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-primary" >
            <div class="container " >

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    SITE System
                </a>
                <!-- Collapsed Hamburger -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#app-navbar-collapse" aria-controls="app-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Right Side Of Navbar -->
                    
                    <ul class="navbar-nav mr-auto">
                    @guest
                        <!-- Authentication Links -->
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('assessments') }}">Assessments</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('customers') }}">Customers</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('users') }}">Users</a></li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('userforms') }}">My Forms</a>
                            <a class="dropdown-item" href="/users/edit/{{ Auth::user()->id}}">My Profile</a>
                        </div>
                        </li>
                    </ul>
                    <div class="nav-item"><a class="btn btn-sm btn-outline-light" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">Logout</a>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                        @endguest
                </div>
            </div>
        </nav>

        

    <div class="content" style="margin-top:70px">
        @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
