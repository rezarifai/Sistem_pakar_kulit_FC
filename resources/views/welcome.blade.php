<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistem Pakar Kulit</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background: #f3f4f6;
            color: #333;
        }

        .container {
            max-width: 960px;
            margin: auto;
            padding: 2rem;
        }

        .navbar-container {
            width: 100%;
            padding: 1rem 2rem;
            background: #fff;
            border-bottom: 1px solid #eaeaea;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 960px;
            margin: auto;
        }

        .navbar a {
            color: #007bff;
            font-weight: 600;
            text-decoration: none;
            margin: 0 0.5rem;
        }

        .navbar a.gray {
            color: #666;
        }

        .header-content {
            margin-top: 6rem; /* Adjusted for navbar height */
            text-align: center;
        }

        .header-content h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .header-content p {
            font-size: 1.125rem;
            color: #666;
            margin-bottom: 2rem;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .card {
            margin-top: 2rem;
        }

        /* Centering text */
        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="navbar-container">
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
                            <a href="#" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
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

    <div class="container">
        <div class="header-content mb-5">
            <h2 class="fw-bold">Cek penyakit kulit gratis</h2>
            <p>Cek Kulit Yuk!!! Merupakan sistem informasi berbasis web yang memanfaatkan teknologi Sistem Pakar. Dengan menggunakan sistem ini, pengguna dapat mengenali atau memeriksakan keluhan terhadap kulitnya hanya dengan menjawab pertanyaan yang diberikan oleh sistem, dan kemudian pengguna dapat melihat hasil test yang dipresentasikan dalam bentuk hasil.</p>
            @auth
                <a href="{{route('form.diagnosa')}}" class="btn btn-primary">Mulai Mendiagnosa</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary">Mulai Mendiagnosa</a>
            @endauth
        </div>

        <h2 class="fw-bold text-center mb-5">Alur Kerja Sistem Pakar Penyakit Kulit</h2>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-bold ">Login</h5>
                        <img class="mt-3" src="data:image/jpeg;base64,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" class="card-img-top" alt="...">
                        <p class="card-text mt-3">Pengguna harus melakukan login sebelum melangkah ke tahap selanjutnya, dan jika belum memiliki akun akan diarahkan ke menu registrasi.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Memilih gejala yang dialami</h5>
                        <img class="mt-3" src="data:image/png;base64,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" class="card-img-top" alt="...">
                        <p class="card-text mt-3">
                            Dalam tahap ini pengguna akan diberikan beberapa pertanyaan terkait dengan gejala yang dialami. Hal ini bertujuan untuk memperoleh informasi yang lebih rinci. </p>
                    </div>
                </div>
            </div>
            <!-- You can add more cards here -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-bold ">Hasil dan Solusi</h5>
                        <img class="mt-3" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSOnuWbpz2mrY784CWTZ-WIJXYL6YOS2ivTkw&s" class="card-img-top" alt="...">
                        <p class="card-text mt-3">Tahap ini merupakan tahap akhir dimana setelah melaksanakan test gejala pengguna akan diberikan hasil tes berupa nama penyakit,penyebab dan solusi.</p>
                    </div>
                </div>
            </div>
        
        