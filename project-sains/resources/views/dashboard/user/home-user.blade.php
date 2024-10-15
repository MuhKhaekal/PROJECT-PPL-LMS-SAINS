@extends('dashboard.user.base-user')

@section('title', 'Dashboard')

@section('content')
    <header class="shadow min-h-screen bg-primary -mt-5 flex items-center">
        <div class="container mx-auto px-4 flex items-center flex-col-reverse md:flex-row">
            <div class="md:flex-1 lg:flex-1">
                <h1 class="text-4xl text-white font-poppins font-semibold text-center md:text-left">Bangun dan Wujudkan Cita-cita</h1>
                <h1 class="text-4xl text-white font-poppins font-semibold text-center md:text-left">Bersama SAINS</h1>
                <p class="text-1xl text-white font-poppins mt-5 text-center md:text-left">SAINS adalah program pengajaran Al-Qur'an yang membantu mahasiswa Universitas Hasanuddin (Unhas) meraih cita-cita dan mewujudkan kampus bebas buta aksara.</p>
                <div class="m-5 flex flex-col md:flex-row md:m-0 md:mt-5">
                    <a href="" class="px-10 py-3 flex justify-center bg-btn-primary rounded-lg">Lihat Kursus</a>
                    <a href="" class="px-10 py-3 flex justify-center text-white ">Lihat Akun Belajar -></a>
                </div>
            </div>
            <div class="md-flex-1 lg:flex-1 flex justify-end">
                <img src="{{ asset('images/logo-sains.png') }}" alt="" class="size-64 m-8 object-cover lg:size-96">
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

