<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistem Pakar Kulit</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Styles -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

  
</head>

<body>

   <div class="shadow">
    <div class="container p-2" >
        <div class="navbar">
            <div class="navbar-left">
                <h3 class="text-bold">Sistem Pakar</h3>
            </div>
            <div class="navbar-right d-flex">
                @if (Route::has('login'))
                    @auth
                        @if (Auth::user()->is_admin == 1)
                            <a href="{{ url('/home') }}" class="gray">Home</a>
                        @else
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a href="#" class="btn btn-primary text-white"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        @endif
                    @else
                        <a href="" class="gray">Home</a>
                        <a href="" class="gray">Alur Kerja</a>
                        <a href="{{ route('login') }}">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </div>
   </div>

    <div class="container">
       @yield('content')
    </div>
</body>
