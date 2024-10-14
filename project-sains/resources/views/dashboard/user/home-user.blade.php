@extends('dashboard.user.base-user')

@section('title', 'Dashboard')

@section('content')
    <header class="shadow min-h-screen bg-primary -mt-1">
        <div class="container px-6 max-w-md mx-auto sm:max-w-xl md:max-w-5xl lg:flex lg-max-w-full lg:p-0 border">
            <div class="lg:p-12 lg:flex-1">
                <h1 class="text-3xl text-white font-poppins font-semibold">Bangun dan Wujudkan Cita-cita</h1>
                <h1 class="text-3xl text-white font-poppins font-semibold">Bersama SAINS</h1>
                <p class="text-1xl text-white font-poppins ">SAINS adalah program pengajaran Al-Qur'an yang membantu mahasiswa Universitas Hasanuddin (Unhas) meraih cita-cita dan mewujudkan kampus bebas buta aksara.</p>
            </div>
            <div class="hidden lg:flex lg:w-1/2">
                <img src="{{ asset('images/logo-sains.png') }}" alt="" class="w-64 h-64 object-cover">
            </div>

        </div>
    </header>
    
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in! Praktikan") }}
                </div>
            </div>
        </div>
    </div>
@endsection

