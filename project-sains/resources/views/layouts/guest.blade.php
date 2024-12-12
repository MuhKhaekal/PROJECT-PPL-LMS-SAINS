<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            input:-webkit-autofill,
            input:-webkit-autofill:hover, 
            input:-webkit-autofill:focus, 
            input:-webkit-autofill:active{
                -webkit-box-shadow: 0 0 0 30px #093B3B inset !important;
                -webkit-text-fill-color: white !important;
            }
        </style>
    </head>
    <body class="font-sans bg-primary antialiased">
        <div class="md:flex">
            <div class="relative min-h-screen bg-cover bg-center flex items-center p-5 justify-center md:flex-1" style="background-image: url({{ asset('images/login.png') }});">
                <div class="">
                    <p class="font-poppins text-white text-3xl font-semibold text-center">Selangkah Lebih Dekat dengan Tajwid</p>
                    <p class="font-poppins text-gray-300 text-sm text-center">Sebuah website untuk  wadah pembelajaran Al-Qur'an terbesar di Universitas Hasanuddin</p>
                </div>
            </div>
            <div class="md:flex md:items-center md:flex-1 ">
                <div class="container mx-auto px-28 mt-10 font-poppins mb-10">
                    @yield('content')
                </div>
            </div>
        </div>

        {{-- <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div> --}}
    </body>
</html>
