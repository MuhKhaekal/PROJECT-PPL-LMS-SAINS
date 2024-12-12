@extends('dashboard.asisten.base-asisten')

@section('title', 'SAINS - Profile')

@section('content')
<div class="mb-5">
    <div class="container mx-auto px-4" data-aos="fade">
        @if (session('success'))
        <div class="bg-green-500 text-white p-4 rounded-md mb-4 mt-10">
            {{ session('success') }}
        </div>
        @endif
        
        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded-md mb-4 mt-10" data-aos="fade">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="border border-dashed border-blue-600 mt-5 md:mt-10 rounded-md p-8" data-aos="fade-right">
            <form class="w-full md:w-3/5">
                <h1 class="text-3xl font-medium">Informasi Profile</h1>
                <p class="text-gray-400 font-light">Berikut informasi profil dan alamat email akun Anda.</p>


                <label for="website-admin" class="block mb-2 text-sm font-medium text-gray-900 mt-5">Nama</label>
                <div class="flex">
                  <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md ">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                    </svg>
                  </span>
                  <input type="text" id="website-admin" class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5" placeholder="{{ $profile->name }}" disabled>
                </div>
                <label for="website-admin" class="block mb-2 text-sm font-medium text-gray-900 mt-5">NIM</label>
                <div class="flex">
                  <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md ">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                    </svg>
                  </span>
                  <input type="text" id="website-admin" class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5" placeholder="{{ $profile->nim }}" disabled>
                </div>
                <label for="website-admin" class="block mb-2 text-sm font-medium text-gray-900 mt-5">Email</label>
                <div class="flex">
                  <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md ">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                    </svg>
                  </span>
                  <input type="text" id="website-admin" class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5" placeholder="{{ $profile->email }}" disabled>
                </div>
              </form>
              
        </div>
        <div class="border border-dashed border-blue-600 mt-5 md:mt-10 rounded-md p-8" data-aos="fade-left">
            <form class="w-full md:w-3/5" method="POST" action="{{ route('myprofileasisten.update', $profile->id) }}">
                @csrf
                @method('PUT')
                <h1 class="text-3xl font-medium">Ubah Kata Sandi</h1>
                <p class="text-gray-400 font-light">Pastikan akun Anda menggunakan kata sandi acak yang panjang agar tetap aman.</p>

                <label for="website-admin" class="block mb-2 text-sm font-medium text-gray-900 mt-5">Kata Sandi Baru</label>
                <div class="mb-5">
                    <input type="password" name="password" id="password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
                </div>
                <label for="website-admin" class="block mb-2 text-sm font-medium text-gray-900 mt-5">Konfirmasi Kata Sandi</label>
                <div class="mb-5">
                    <input type="password" name="password_confirmation" id="password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
                </div>

                <button type="submit" class="bg-btn-primary font-semibold hover:bg-yellow-500 focus:line text-primary px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-lg my-5">Perbarui Kata Sandi</button>
                
              </form>
              
        </div>

    </div>

</div>
@endsection