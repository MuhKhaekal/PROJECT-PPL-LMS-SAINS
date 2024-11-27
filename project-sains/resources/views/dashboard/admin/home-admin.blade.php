@extends('dashboard.admin.base-admin')

@section('title', 'SAINS - Dashboard')

@section('content')

<div class="flex h-full items-center">
    <div class="flex-1" data-aos="fade-down">
        <div class="max-w-sm p-6 h-64 bg-white border border-gray-200 rounded-lg shadow ">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Jumlah Pengguna Aktif</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Sampai sekarang ada {{ $users }} orang yang saling bertukar ilmu!</p>
            <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-primary rounded-lg hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-blue-300">
                Lihat Selengkapnya
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
        </div>
    </div>
    <div class="flex-1" data-aos="fade-up">
        <div class="max-w-sm p-6 h-64 bg-white border border-gray-200 rounded-lg shadow ">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Jumlah Fakultas yang sedang memprogramkan SAINS</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Total ada {{ $faculties }} fakultas yang menginginkan mahasiswanya untuk belajar SAINS!</p>
            <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-primary rounded-lg hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-blue-300">
                Lihat Selengkapnya
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
        </div>
    </div>
    <div class="flex-1" data-aos="fade-left">
        <div class="max-w-sm p-6 h-64 bg-white border border-gray-200 rounded-lg shadow ">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Jumlah Group Praktikan</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Terdapat ada {{ $groups }} grup dimana tempat praktikan menimba ilmu!</p>
            <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-primary rounded-lg hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-blue-300">
                Lihat Selengkapnya
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
        </div>
    </div>

</div>





@endsection