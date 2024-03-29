<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   <!-- <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet"> -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('css/regular.css') }}" rel="stylesheet">
    <link href="{{asset('/css/jquery.dataTables.css')}}" rel="stylesheet">
    <link href="{{asset('/css/dataTables.bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('/css/selectize.css')}}" rel="stylesheet">
    <link href="{{asset('/css/selectize.bootstrap3.css')}}" rel="stylesheet">


    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        @if (Auth::check())
                            <li><a href="{{ url('/') }}">Dashboard</a></li>
                        @endif
                        @role('admin')
                            <li><a href="{{ route('authors.index') }}">Penulis</a></li>
                            <li><a href="{{ route('books.index') }}">Buku</a></li>
                            <li><a href="{{ route('members.index') }}">Member</a></li>
                        @endrole
                        @role('member')
                            <li><a href="{{ route('guests.index') }}">Peminjaman</a></li>
                        @endrole
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Daftar</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        @if (auth()->check())
                                            <a href="{{ url('/settings/profile') }}">Profil</a>
                                        @endif
                                    </li>
                                    <li>
                                        <a href="{{ url('/settings/password') }}"><i class="fa fa-btn fa-lock" aria-hidden="true"></i> Ubah Password</a></li>
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    @include('layouts._flash')
    @yield('content')
    </div>

    <!-- Scripts -->
    
    <!-- <script src= "{{asset('/js/app.js')}}"></script> -->
    <script src= "{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
    <script src= "{{ asset('/js/bootstrap.min.js') }}"></script>
    <script src="{{asset('/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('/js/custom.js')}}"></script>
    <script src="{{asset('/js/selectize.min.js')}}"></script>
    @yield('scripts')
    
</body>
</html>
