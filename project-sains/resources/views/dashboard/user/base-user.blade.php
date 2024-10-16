<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title')</title>
    
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
<body>
    @include('dashboard.user.navigation-user')

    <main>
        @yield('content')
    </main>

    <footer>
        <div class=" bg-primary w-full mt-10 pt-5 flex flex-col justify-center font-poppins">
            <div class="container mx-auto px-4 lg:flex">
                <div class="lg:flex-4 lg:w-2/5">
                    <div class="text-center text-white font-semibold mb-5 lg:text-left lg:mb-1">
                        <p>[SAINS UNHAS]</p>
                    </div>
                    <div class="lg:hidden flex mb-5">
                        <div class="flex-1 flex flex-col justify-center text-white text-sm font-light">
                            <a href="" class="text-center p-2">Instagram</a>
                            <a href="" class="text-center p-2">Telegram</a>
                        </div>
                        <div class="flex-1 flex flex-col justify-center text-white text-sm font-light">
                            <a href="" class="text-center p-2">Tentang Kami</a>
                            <a href="" class="text-center p-2">Kebijakan Privasi</a>
                        </div>
                    </div>
                    <div class="hidden lg:block text-white font-light text-sm lg:mb-10">
                        <p>Bangun dan wujudkan cita bersama edufree</p>
                    </div>
                    <div class="bg-btn-primary rounded-md p-4 text-sm flex flex-col lg:flex-row lg:p-2 me-10">
                        <p class="text-center p-2">Email: sainsunhas@unhas.ac.id</p>
                        <p class="text-center p-2">Muslim: 082345643122</p>
                        <p class="text-center p-2">Muslimah: 089512439065</p>
                    </div>
                </div>
                <div class="hidden lg:block lg:flex-1 text-white">
                    <p class="mb-5">Sosial Media</p>
                    <a href="" class="font-extralight">Instagram</a><br>
                    <a href="" class="font-extralight">Telegram</a><br>
                    <a href="" class="font-extralight">Youtube</a>
                </div>
                <div class="hidden lg:block lg:flex-1 text-white">
                    <p class="mb-5">Program</p>
                    <a href="" class="font-extralight">Merdeka Belajar</a><br>
                    <a href="" class="font-extralight">Finterpreneur</a>
                </div>
                <div class="hidden lg:block lg:flex-1 text-white">
                    <p class="mb-5">Sosial Media</p>
                    <a href="" class="font-extralight">Tentang Kami</a><br>
                    <a href="" class="font-extralight">Ketentuan</a><br>
                    <a href="" class="font-extralight">Kebijakan Privasi</a>
                </div>


            </div>
        </div>
    </footer>
</body>
</html>