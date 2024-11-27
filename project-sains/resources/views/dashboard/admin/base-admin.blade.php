<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title')</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet" />
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
       function toggleAccordion(id, iconId) {
            const content = document.getElementById(id);
            const icon = document.getElementById(iconId);

            // Toggle hidden class
            content.classList.toggle('hidden');

            // Toggle max height for smooth transition
            if (content.classList.contains('hidden')) {
                content.style.maxHeight = '0';
                icon.innerHTML = '+';
            } else {
                content.style.maxHeight = content.scrollHeight + 'px'; // Set max height to actual height
                icon.innerHTML = '×';
            }
        }
    </script>
    <style>
    .accordion-content {
        transition: max-height 0.3s ease;
        overflow: hidden;
    }
    </style>
</head>
<body class="flex h-screen bg-gray-100 font-poppins">

    <!-- Navbar Sisi Kiri -->
    <div class="w-64 bg-primary min-h-screen shadow-md text-white">
        <div class="p-4">
            <h1 class="text-lg font-bold">[SAINS UNHAS]</h1>
        </div>
        <nav class="mt-4">
            <ul>
                <li class="hover:bg-gray-800">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        <span class="{{ request()->routeIs('dashboard') ? 'text-white font-semibold' : 'text-gray-500 hover:text-gray-400' }} py-2 px-4">
                            {{ __('Dashboard') }}
                        </span>
                    </x-nav-link>   
                </li>
                <li class="hover:bg-gray-800">
                    <x-nav-link :href="route('adminuser.index')" :active="request()->routeIs('adminuser.index')">
                        <span class="{{ request()->routeIs('adminuser.index') ? 'text-white font-semibold' : 'text-gray-500 hover:text-gray-400' }} py-2 px-4">
                            {{ __('Daftar Pengguna') }}
                        </span>
                    </x-nav-link>   
                </li>
                <li class="hover:bg-gray-800">
                    <x-nav-link :href="route('adminfaculty.index')" :active="request()->routeIs('adminfaculty.index')">
                        <span class="{{ request()->routeIs('adminfaculty.index') ? 'text-white font-semibold' : 'text-gray-500 hover:text-gray-400' }} py-2 px-4">
                            {{ __('Daftar Group SAINS') }}
                        </span>
                    </x-nav-link>   
                </li>
                <li class="hover:bg-gray-800">
                    <x-nav-link :href="route('admincertificate.index')" :active="request()->routeIs('admincertificate.index')">
                        <span class="{{ request()->routeIs('admincertificate.index') ? 'text-white font-semibold' : 'text-gray-500 hover:text-gray-400' }} py-2 px-4">
                            {{ __('Sertifikasi') }}
                        </span>
                    </x-nav-link>   
                </li>
                <li class="mt-10">
                    <div class="hidden sm:flex  sm:ms-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md bg-primary text-white hover:text-gray-400 focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ Auth::user()->name }}</div>
        
                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
        
                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>
        
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
        
                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Konten Utama -->
    <div class="flex-1 p-6">
        @yield('content')
    </div>

    <script>
        AOS.init({
            duration: 1000,
            easing: 'ease-in-out',
            once: true,
        });
    </script>

</body>     
</html>