@extends('dashboard.admin.base-admin')

@section('title', 'SAINS - E-Certificate')

@section('content')

<div class="bg-white p-8 rounded-md">
    <h1 class="font-semibold text-3xl">Pengesahan Sertifikat</h1>
    <p class="text-gray-400">{{ $type }}</p>
    
    @if ($certificateverification) 
    <form action="{{ route('fillcertificate.destroyByType', ['certificatetype' => $type]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('DELETE')
        <input type="hidden" value="{{ $type }}" name='certificatetype'>
            <button type="submit" class="bg-btn-primary hover:bg-yellow-500 focus:line text-primary px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-lg my-5">Batalkan validasi</button>
            @if (session('success'))
            <div id="success-message" class="relative bg-green-500 text-white p-4 rounded-md mb-4" data-aos="fade">
                {{ session('success') }}
            </div>
            @endif           
    </form>
    
    @else
    <form action="{{ route('fillcertificate.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{ $type }}" name='certificatetype'>
        @if ($type == 'Sertifikat Peserta Umum' || $type == 'Sertifikat Asisten Umum')
            <button type="submit" class="bg-btn-primary hover:bg-yellow-500 focus:line text-primary px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-lg my-5">Validasi Semua</button>
            @if (session('success'))
            <div id="success-message" class="relative bg-green-500 text-white p-4 rounded-md mb-4" data-aos="fade">
                {{ session('success') }}
            </div>
            @endif
        @else
        <button type="submit" class="bg-btn-primary hover:bg-yellow-500 focus:line text-primary px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-lg mt-5">Validasi</button>
        @endif
    </form>
    @endif


    <p class="mt-5">Daftar Praktikan :</p>
    <form method="GET" action="{{ route('fillcertificate.process') }}" class="mb-4 mt-5 flex">
        <input type="hidden" name="certificatetype" value="{{ $type }}">
        <input type="text" name="search" placeholder="Cari pengguna..." class="border rounded p-2 w-full" value="{{ request()->get('search') }}">
        <button type="submit" class="bg-blue-500 text-white rounded p-2 mx-2">Cari</button>
    </form>
    @foreach ($certificates as $certificate)
        
    
    <div class="border-b border-gray-300">
        <button class="w-full flex justify-between items-center text-left py-4" onclick="toggleAccordion('{{ $certificate->id }}', 'icon1')">
            <span class="font-semibold">{{ $certificate->name }}</span>
            <span id="icon1" class="text-2xl font-bold">+</span>
        </button>
        <div id='{{ $certificate->id }}' class="accordion-content hidden" style="max-height: 0;">
            <div id="pdfViewer" class="mt-4" data-aos="fade-up">
                <iframe id="pdfFrame" src="{{ $base64pdfs[$certificate->id] }}" style="width: 100%; height: 500px;" frameborder="0"></iframe>
            </div>   
        </div>
    </div>
    @endforeach

    <div class="mt-4">
        {{ $certificates->appends(['certificatetype' => $type, 'search' => request('search')])->links() }}
        
    </div>
</div>



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