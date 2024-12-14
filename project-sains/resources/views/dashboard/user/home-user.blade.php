@extends('dashboard.user.base-user')

@section('title', 'SAINS - Dashboard')

@section('content')
<header class="shadow min-h-screen bg-primary -mt-5 flex items-center">
    <div class="container mx-auto px-4 flex items-center flex-col-reverse md:flex-row">
        <div class="md:flex-1 lg:flex-1" data-aos="fade-right">
            <h1 class="text-4xl text-white font-poppins font-semibold text-center md:text-left">Bangun dan Wujudkan Cita-cita</h1>
            <h1 class="text-4xl text-white font-poppins font-semibold text-center md:text-left">Bersama SAINS</h1>
            <p class="text-1xl text-white font-poppins mt-5 text-center md:text-left">SAINS adalah program pengajaran Al-Qur'an yang membantu mahasiswa Universitas Hasanuddin (Unhas) meraih cita-cita dan mewujudkan kampus bebas buta aksara.</p>
            <div class="m-5 flex flex-col md:flex-row md:m-0 md:mt-5">
                <a href="{{ route('study-group.index') }}" class="px-10 py-3 flex justify-center bg-btn-primary rounded-lg">Lihat Kursus</a>
                <a href="{{ route('myprofile.index') }}" class="px-10 py-3 flex justify-center text-white ">Lihat Akun Belajar -></a>
            </div>
        </div>
        <div class="md-flex-1 lg:flex-1 flex justify-end" data-aos="fade-left">
            <img src="{{ asset('images/logo-sains.png') }}" alt="" class="size-64 m-8 object-cover lg:size-96">
        </div>
    </div>
</header>

<section class="min-h-screen">
    <div class="container mx-auto px-4 flex flex-col justify-center">
        <div class="my-16" data-aos="fade-down" >
            <h1 class="font-poppins font-semibold px-12 text-center lg:text-3xl">Keuntungan Berpartisipasi dalam Program SAINS</h1>
        </div>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3" >
            <div class="bg-gray-200 p-10 rounded-md shadow-lg" data-aos="fade-right">
                <img src="{{ asset('images/section_1.png') }}" alt="" class="size-8">
                <h1 class="font-poppins font-semibold mt-3 text-lg">Peningkatan Pemahaman</h1>
                <p class="text-gray-600">Memperdalam pemahaman terhadap Al-Qur'an dan aplikasinya dalam kehidupan sehari-hari.</p>
            </div>
            <div class="bg-gray-200 p-10 rounded-md shadow-lg" data-aos="fade-up">
                <img src="{{ asset('images/section_2.png') }}" alt="" class="size-8">
                <h1 class="font-poppins font-semibold mt-3 text-lg">Keterampilan Membaca</h1>
                <p class="text-gray-600">Latihan membaca Al-Qur'an dengan tajwid yang benar, meningkatkan kemampuan membaca secara umum.</p>
            </div>
            <div class="bg-gray-200 p-10 rounded-md shadow-lg" data-aos="fade-left">
                <img src="{{ asset('images/section_3.png') }}" alt="" class="size-8">
                <h1 class="font-poppins font-semibold mt-3 text-lg">Karakter Positif</h1>
                <p class="text-gray-600">Mengembangkan karakter positif, seperti disiplin dan empati, melalui nilai-nilai ajaran Al-Qur'an.</p>
            </div>
            <div class="bg-gray-200 p-10 rounded-md shadow-lg" data-aos="fade-right">
                <img src="{{ asset('images/section_4.png') }}" alt="" class="size-8">
                <h1 class="font-poppins font-semibold mt-3 text-lg">Lingkungan Positif</h1>
                <p class="text-gray-600">Menciptakan atmosfer kampus yang mendukung pembelajaran dan mengurangi buta aksara.</p>
            </div>
            <div class="bg-gray-200 p-10 rounded-md shadow-lg" data-aos="fade-up">
                <img src="{{ asset('images/section_5.png') }}" alt="" class="size-8">
                <h1 class="font-poppins font-semibold mt-3 text-lg">Akses Fleksibel</h1>
                <p class="text-gray-600">Program ini gratis dan dapat diakses secara online, memberikan kemudahan bagi mahasiswa.</p>
            </div>
            <div class="bg-gray-200 p-10 rounded-md shadow-lg" data-aos="fade-left">
                <img src="{{ asset('images/section_6.png') }}" alt="" class="size-8">
                <h1 class="font-poppins font-semibold mt-3 text-lg">Komunitas Solid</h1>
                <p class="text-gray-600">Kesempatan untuk berinteraksi dan bersinergi dengan mahasiswa lain yang memiliki minat yang sama.</p>
            </div>
            
        </div>
    </div>
</section>

<section>
    <div class="container mx-auto px-4 mt-16 flex flex-col items-center sm:flex-row sm:mt-5" >
        <div class="font-poppins sm:flex-1 sm:p-6" data-aos="fade-right">
            <p class="text-gray-600 font-semibold">Tentang Kami</p>
            <h1 class="text-2xl text-center mt-3 sm:text-left">SAINS: Program untuk Meningkatkan Pemahaman Al-Qur'an</h1>
            <p class="text-sm text-justify text-gray-600">SAINS diharapkan menjadi program yang bermanfaat dalam pendidikan, meningkatkan pemahaman Al-Qur'an dan praktik ajaran Islam bagi mahasiswa.</p>
        </div>
        <div class="sm:flex-1" data-aos="fade-left">
            <img src="{{ asset('images/foto_1.png') }}" alt="" class="shadow-lg">
        </div>
    </div>
    <div class="container mx-auto px-4 flex flex-col items-center sm:flex-row-reverse sm:mt-16">
        <div class="font-poppins sm:flex-1 sm:p-6" data-aos="fade-left">
            <p class="text-gray-600 font-semibold hidden md:block">Tentang Kami</p>
            <h1 class="text-2xl text-center mt-3 sm:text-left">SAINS: Program untuk Meningkatkan Pemahaman Al-Qur'an</h1>
            <p class="text-sm text-justify text-gray-600">SAINS diharapkan menjadi program yang bermanfaat dalam pendidikan, meningkatkan pemahaman Al-Qur'an dan praktik ajaran Islam bagi mahasiswa.</p>
        </div>
        <div class="sm:flex-1" data-aos="fade-right">
            <img src="{{ asset('images/foto_2.png') }}" alt="" class="shadow-lg">
        </div>
    </div>
</section>

<section>
    <div class="container mx-auto px-4 mt-16 flex flex-col sm:flex-row" data-aos="fade-up">
        <div class="font-poppins mb-5 sm:flex-2 sm:mb-0 sm:pr-20">
            <h1 class="text-center text-2xl font-bold sm:text-left">Kata Mereka Tentang SAINS</h1>
            <p class="text-sm text-center text-gray-500">SAINS telah diikuti lebih dari 10.000 mahasiswa</p>
        </div>
        <div class="font-poppins text-sm sm:flex-1">
            <p class="text-justify">"Setelah mengikuti kelas SAINS, ilmu saya tentang Al-Quran itu bertambah drastis. Terima kasih kepada kakak-kakak SAINS yang telah membimbing kami sesabar mungkin. "</p>
            <div class="flex">
                <div class="pr-5">
                    <img src="{{ asset('images/logo-sains.png') }}" alt="" class="w-10">
                </div>
                <div class="d">
                    <p class="font-semibold">Surya Agus Nanro</p>
                    <p class="text-gray-400 text-sm">Mahasiswa Sistem Informasi</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container mx-auto px-4 mt-5 flex flex-col sm:mt-16 sm:flex-row" data-aos="fade-up">
        <div class="hidden font-poppins  sm:block sm:flex-2 sm:pr-20">
            <h1 class="text-center text-2xl font-bold sm:text-left">Kata Mereka Tentang SAINS</h1>
            <p class="text-sm text-center text-gray-500">SAINS telah diikuti lebih dari 10.000 mahasiswa</p>
        </div>
        <div class="font-poppins text-sm sm:flex-1">
            <p class="text-justify">"Sangat baik karena dapat memperdalam ilmu tajwid dan cara bacaan al-quran saya secara baik dan benar, Setelah menyelesaikan sains saya semakin bersemangat untuk memperdalam ilmu tajwid."</p>
            <div class="flex">
                <div class="pr-5">
                    <img src="{{ asset('images/logo-sains.png') }}" alt="" class="w-10">
                </div>
                <div class="d">
                    <p class="font-semibold">Muh. Taufan Sandi</p>
                    <p class="text-gray-400 text-sm">Mahasiswa Sistem Informasi</p>
                </div>
            </div>
        </div>
    </div>
</section>




@endsection

