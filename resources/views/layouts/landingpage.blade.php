<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon"
        href="https://png.pngtree.com/png-vector/20220420/ourmid/pngtree-expert-systems-blue-gradient-concept-icon-color-type-pictogram-vector-png-image_45342260.jpg"
        type="image/x-icon">

    <title>Sistem Pakar Kulit</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">

    <!-- Tailwind CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <!-- Flowbite CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.5.0/flowbite.min.css" />

    <!-- Styles -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>

<body class="bg-white">

    <div class="fixed top-0 w-full z-10">
        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
                <a href="https://rsudps.bantulkab.go.id/" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="https://png.pngtree.com/png-vector/20220420/ourmid/pngtree-expert-systems-blue-gradient-concept-icon-color-type-pictogram-vector-png-image_45342260.jpg" class="h-8" alt="Flowbite Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Sistem Pakar Kulit</span>
                </a>
                <div class="flex items-center">
                    <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-sm">
                        <li>
                            <a href="/" class="text-gray-900 dark:text-white hover:text-blue-800" aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="#alurKerja" class="text-gray-900 dark:text-white hover:text-blue-800">Alur Kerja</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-900 dark:text-white hover:text-blue-800">Tentang Kami</a>
                        </li>
                    </ul>
                </div>
                <div class="flex items-center space-x-6 rtl:space-x-reverse">
                    @if (Route::has('login'))
                        @auth
                            <span class="text-sm text-gray-500 dark:text-white">Halo, {{ Auth::user()->name }}</span>
                            @if (Auth::user()->is_admin == 1)
                                <a href="{{ url('/home') }}" class="text-sm text-blue-600 dark:text-blue-500 hover:underline">Home</a>
                            @else
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    @csrf
                                </form>
                                <a href="#" class="text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 md:px-5 md:py-2.5 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </nav>
    
       
    </div>

    @yield('content')
    <div class="container mx-auto mt-8 p-4">
      
    </div>

    <!-- Flowbite JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.5.0/flowbite.min.js"></script>
</body>

</html>
