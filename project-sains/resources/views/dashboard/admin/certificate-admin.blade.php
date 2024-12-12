@extends('dashboard.admin.base-admin')

@section('title', 'SAINS - E-Certificate')

@section('content')

<h1 class="text-3xl font-bold bg-gray-500 w-fit px-5 py-2  rounded-md shadow-md text-white">SERTIFIKASI</h1>

<div class="bg-white p-3 rounded-md shadow-md mt-5">
    
    @if (session('success'))
    <div id="success-message" class="relative bg-green-500 text-white p-4 rounded-md mb-4" data-aos="fade">
        {{ session('success') }}
    </div>
    @endif

    <label for="cover-photo" class="block text-sm/6 font-bold text-gray-900">Syarat Pemberian Sertifikat :</label>
    <ul class="list-disc text-sm ms-5 space-y-7">
        <li>Untuk Praktikan:
            <ol class="list-decimal ms-5 space-y-4">
                <li>Praktikan memenuhi jumlah minimum kehadiran yang telah ditetapkan yaitu 8 pertemuan dari total 10 pertemuan.</li>
                <li>Praktikan berpartisipasi/berkontribusi aktif dalam diskusi atau sesi tanya jawab selama kelas berlangsung.</li>
                <li>Praktikan menunjukkan sikap yang baik selama berada dalam kelas, seperti hadir tepat waktu, menghormati asisten yang mengajar, dan menjaga suasana pembelajaran yang baik dan kondusif</li>
                <li>Praktikan menyelesaikan ujian akhir dengan nilai memenuhi standar kelulusan ujian yaitu 70 dari total nilai 100.</li>
            </ol>
        </li>
        <li>Untuk Asisten
            <ul class="list-decimal ms-5 space-y-4">
                <li>Telah menyampaikan seluruh materi pembelajaran yang telah direncanakan sesuai dengan kurikulum yang ditetapkan</li>
                <li>Hadir dalam setiap pertemuan yang dijadwalkan, kecuali ada kondisi darurat/mendadak dengan memberikan pemberitahuan sebelum pembelajaran</li>
                <li>Membimbing praktikan dengan aktif selama proses pembelajaran, termasuk dalam diskusi, tugas, dan sesi tanya jawab.</li>
                <li>Mampu menciptakan suasana pembelajaran yang positif, interaktif, dan mendukung perkembangan pemahaman agama setiap praktikan.</li>
                <li>Menunjukkan sikap profesional kepada praktikan, seperti menjaga hubungan baik dengan praktikan, menghormati jadwal, dan menjaga etika dalam pembelajaran/pengajaran.</li>
                <li>Mengikuti evaluasi kinerja pengajaran yang dilakukan oleh pihak penyelenggara pembelajaran</li>
                <li>Menyusun laporan tentang pelaksanaan pembelajaran, termasuk evaluasi terhadap materi, metode, dan hasil pembelajaran praktikan.</li>
        
            </ul>
        </li>
    </ul>

    @if ($checkcertificate)
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-10">
        
        <div>
            <div class="max-w-sm p-6 bg-btn-primary border border-gray-200 rounded-lg shadow">
                
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">Sertifikat Umum: Peserta</h5>
                
                <p class="mb-3 font-normal text-gray-700 ">Nama Penerima Sertifikat</p>
                <a href="{{ route('fillcertificate.process', ['certificatetype' => 'Sertifikat Peserta Umum']) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-primary rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    Pengesahan 
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>
        </div>
        <div>
            <div class="max-w-sm p-6 bg-btn-primary border border-gray-200 rounded-lg shadow">
                
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">Sertifikat Umum: Asisten</h5>
                
                <p class="mb-3 font-normal text-gray-700 ">Nama Penerima Sertifikat</p>
                <a href="{{ route('fillcertificate.process', ['certificatetype' => 'Sertifikat Asisten Umum']) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-primary rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    Pengesahan 
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>
        </div>
        <div>
            <div class="max-w-sm p-6 bg-btn-primary border border-gray-200 rounded-lg shadow">
                
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">Sertifikat Peserta: Ikhwan Terbaik</h5>
                
                <p class="mb-3 font-normal text-gray-700 ">Nama Penerima Sertifikat</p>
                <a href="{{ route('fillcertificate.process', ['certificatetype' => 'Sertifikat Peserta Ikhwan Terbaik']) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-primary rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    Pengesahan 
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>
        </div>
        <div>
            <div class="max-w-sm p-6 bg-btn-primary border border-gray-200 rounded-lg shadow">
                
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">Sertifikat Peserta: Akhwat Terbaik</h5>
                
                <p class="mb-3 font-normal text-gray-700 ">Nama Penerima Sertifikat</p>
                <a href="{{ route('fillcertificate.process', ['certificatetype' => 'Sertifikat Peserta Akhwat Terbaik']) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-primary rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    Pengesahan 
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>
        </div>
        <div>
            <div class="max-w-sm p-6 bg-btn-primary border border-gray-200 rounded-lg shadow">
                
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">Sertifikat Asisten: Ikhwan Terbaik</h5>
                
                <p class="mb-3 font-normal text-gray-700 ">Nama Penerima Sertifikat</p>
                <a href="{{ route('fillcertificate.process', ['certificatetype' => 'Sertifikat Asisten Ikhwan Terbaik']) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-primary rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    Pengesahan
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>
        </div>
        <div>
            <div class="max-w-sm p-6 bg-btn-primary border border-gray-200 rounded-lg shadow">
                
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">Sertifikat Asisten: Akhwat Terbaik</h5>
                
                <p class="mb-3 font-normal text-gray-700 ">Nama Penerima Sertifikat</p>
                <a href="{{ route('fillcertificate.process', ['certificatetype' => 'Sertifikat Asisten Akhwat Terbaik']) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-primary rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    Pengesahan
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>
        </div>
        
    </div>

</div>

    <form action="{{ route('admincertificate.destroyAll') }}" method="POST">
        @csrf
        @method('DELETE')
        <button onclick="submit" class="bg-red-500 px-3 py-2 rounded-md text-white hover:bg-red-600 mt-5 ">Hapus semua sertifikat</button>
    </form>
    @else
    <div class="mt-5">
        <a href="{{ route('admincertificate.create') }}" class="bg-blue-500 text-white px-3 py-2 rounded-md">
            + Unggah Sertifikat
        </a>
    </div>
    @endif


    
    
    
    
    
    
    

    
    









<script>
    function togglePdf(pdfUrl) {
        const pdfViewer = document.getElementById('pdfViewer');
        const pdfFrame = document.getElementById('pdfFrame');
        
        pdfFrame.src = pdfUrl;
        pdfViewer.classList.remove('hidden');
    }

    document.addEventListener('DOMContentLoaded', function() {
        const successMessage = document.getElementById('success-message');
        if (successMessage) {
            setTimeout(function() {
                successMessage.style.display = 'none';
            }, 3000); // 5000 milliseconds = 5 seconds
        }
    });
</script>

@endsection