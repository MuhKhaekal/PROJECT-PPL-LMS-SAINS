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
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

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
<body class="bg-gray-100 font-poppins">

    

<nav class="fixed top-0 z-50 w-full bg-primary">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
      <div class="flex items-center justify-between">
        <div class="flex items-center justify-start rtl:justify-end">
          <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200=">
              <span class="sr-only">Open sidebar</span>
              <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                 <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
              </svg>
           </button>
          <a href="" class="flex ms-2 md:me-24">
            <img src="{{ asset('images/logo-sains.png') }}" class="h-8 me-3" alt="FlowBite Logo" />
            <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">[SAINS UNHAS]</span>
          </a>
        </div>
        <div class="flex items-center">
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
          </div>
      </div>
    </div>
  </nav>

  <div class="flex">
    <div class="">
        <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-primary border-r border-gray-200 sm:translate-x-0" aria-label="Sidebar">
            <div class="h-full px-3 pb-4 overflow-y-auto bg-primary">
               <ul class="space-y-4 font-medium">
                  <li>
                   <a href="{{ route('dashboard') }}" class="flex items-center p-2 rounded-md {{ request()->routeIs('dashboard') ? 'text-white bg-gray-600' : ' text-white  hover:bg-gray-700 group' }}">
                       <svg class="w-5 h-5 {{ request()->routeIs('dashboard') ? 'text-white' : ' transition duration-75 text-gray-400 group-hover:text-white' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                           <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                           <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                       </svg>
                       <span class="flex-1 ms-3 whitespace-nowrap {{ request()->routeIs('dashboard') ? 'font-semibold' : 'text-gray-500 hover:text-gray-400' }}">
                           {{ __('Dashboard') }}
                       </span>
                   </a>
                  </li>
                  <li>
                   <a href="{{ route('adminuser.index') }}" class="flex items-center p-2 rounded-md {{ request()->routeIs('adminuser.index') ? 'text-white bg-gray-600' : ' text-white  hover:bg-gray-700 group' }}">
                       <svg class="w-5 h-5 {{ request()->routeIs('adminuser.index') ? 'text-white' : ' transition duration-75 text-gray-400 group-hover:text-white' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                           <path fill-rule="evenodd" d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z" clip-rule="evenodd"/>
                         </svg>
                         <span class="flex-1 ms-3 whitespace-nowrap {{ request()->routeIs('adminuser.index') ? 'font-semibold' : 'text-gray-500 hover:text-gray-400' }}">
                           {{ __('Daftar Pengguna') }}
                       </span>
                     </a>
                  </li>
                  <li>
                   <a href="{{ route('adminfaculty.index') }}" class="flex items-center p-2 rounded-md {{ request()->routeIs('adminfaculty.index') ? 'text-white bg-gray-600' : ' text-white  hover:bg-gray-700 group' }}">
                       <svg class="w-5 h-5 {{ request()->routeIs('adminfaculty.index') ? 'text-white' : ' transition duration-75 text-gray-400 group-hover:text-white' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                           <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z" clip-rule="evenodd"/>
                         </svg>
                         <span class="flex-1 ms-3 whitespace-nowrap {{ request()->routeIs('adminfaculty.index') ? 'font-semibold' : 'text-gray-500 hover:text-gray-400' }}">
                           {{ __('Daftar Group') }}
                       </span>
                     </a>
                  </li>
                  <li>
                   <a href="{{ route('adminfaq.index') }}" class="flex items-center p-2 rounded-md {{ request()->routeIs('adminfaq.index') ? 'text-white bg-gray-600' : ' text-white  hover:bg-gray-700 group' }}">
                       <svg class="w-5 h-5 {{ request()->routeIs('adminfaq.index') ? 'text-white' : ' transition duration-75 text-gray-400 group-hover:text-white' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                           <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.008-3.018a1.502 1.502 0 0 1 2.522 1.159v.024a1.44 1.44 0 0 1-1.493 1.418 1 1 0 0 0-1.037.999V14a1 1 0 1 0 2 0v-.539a3.44 3.44 0 0 0 2.529-3.256 3.502 3.502 0 0 0-7-.255 1 1 0 0 0 2 .076c.014-.398.187-.774.48-1.044Zm.982 7.026a1 1 0 1 0 0 2H12a1 1 0 1 0 0-2h-.01Z" clip-rule="evenodd"/>
                         </svg>
                         <span class="flex-1 ms-3 whitespace-nowrap {{ request()->routeIs('adminfaq.index') ? 'font-semibold' : 'text-gray-500 hover:text-gray-400' }}">
                           {{ __('FAQ') }}
                       </span>
                     </a>
                  </li>
                  <li>
                   <a href="{{ route('adminannouncement.index') }}" class="flex items-center p-2 rounded-md {{ request()->routeIs('adminannouncement.index') ? 'text-white bg-gray-600' : ' text-white  hover:bg-gray-700 group' }}">
                       <svg class="w-5 h-5 {{ request()->routeIs('adminannouncement.index') ? 'text-white' : ' transition duration-75 text-gray-400 group-hover:text-white' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                           <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"/>
                       </svg>
                       <span class="flex-1 ms-3 whitespace-nowrap {{ request()->routeIs('adminannouncement.index') ? 'font-semibold' : 'text-gray-500 hover:text-gray-400' }}">
                           {{ __('Pengumuman') }}
                       </span>
                       </a>
                   </li>
                  <li>
                   <a href="{{ route('admincertificate.index') }}" class="flex items-center p-2 rounded-md {{ request()->routeIs('admincertificate.index') ? 'text-white bg-gray-600' : ' text-white  hover:bg-gray-700 group' }}">
                       <svg class="w-5 h-5 {{ request()->routeIs('admincertificate.index') ? 'text-white' : ' transition duration-75 text-gray-400 group-hover:text-white' }}" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                           <path d="M11 9a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z"/>
                           <path fill-rule="evenodd" d="M9.896 3.051a2.681 2.681 0 0 1 4.208 0c.147.186.38.282.615.255a2.681 2.681 0 0 1 2.976 2.975.681.681 0 0 0 .254.615 2.681 2.681 0 0 1 0 4.208.682.682 0 0 0-.254.615 2.681 2.681 0 0 1-2.976 2.976.681.681 0 0 0-.615.254 2.682 2.682 0 0 1-4.208 0 .681.681 0 0 0-.614-.255 2.681 2.681 0 0 1-2.976-2.975.681.681 0 0 0-.255-.615 2.681 2.681 0 0 1 0-4.208.681.681 0 0 0 .255-.615 2.681 2.681 0 0 1 2.976-2.975.681.681 0 0 0 .614-.255ZM12 6a3 3 0 1 0 0 6 3 3 0 0 0 0-6Z" clip-rule="evenodd"/>
                           <path d="M5.395 15.055 4.07 19a1 1 0 0 0 1.264 1.267l1.95-.65 1.144 1.707A1 1 0 0 0 10.2 21.1l1.12-3.18a4.641 4.641 0 0 1-2.515-1.208 4.667 4.667 0 0 1-3.411-1.656Zm7.269 2.867 1.12 3.177a1 1 0 0 0 1.773.224l1.144-1.707 1.95.65A1 1 0 0 0 19.915 19l-1.32-3.93a4.667 4.667 0 0 1-3.4 1.642 4.643 4.643 0 0 1-2.53 1.21Z"/>
                         </svg>
                         
                         <span class="flex-1 ms-3 whitespace-nowrap {{ request()->routeIs('admincertificate.index') ? 'font-semibold' : 'text-gray-500 hover:text-gray-400' }}">
                           {{ __('Sertifikasi') }}
                       </span>
                     </a>
                  </li>
       
               </ul>
            </div>
         </aside>
    </div>
    <div class="flex-1 justify-center">
        <div class="p-4">
            <div class="flex-1 p-6 ml-64 mt-16">
                @yield('content')
            </div>
          </div>
    </div>
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