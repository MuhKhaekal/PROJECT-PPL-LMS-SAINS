@extends('dashboard.asisten.base-asisten')

@section('title', 'SAINS - Asisten Group')

@section('content')

@if($checkGroup->where('user_id', $userId)->isNotEmpty())
    <!-- Jika user sudah terdaftar, tampilkan pesan ini -->
    <div class="container mx-auto px-4 flex flex-col justify-center">
        <div class="relative min-h-96 bg-contain bg-center flex items-center justify-center" style="background-image: url({{ asset('images/bg_study-group.png')}}); background-repeat: no-repeat" data-aos="fade-right">
            <p class="font-poppins text-white text-sm font-semibold md:text-5xl md:my-48">{{$courseName->course_name }}</p>
        </div>

        
    @if (session('success'))
        <div id="success-message" class="relative bg-green-500 text-white p-4 rounded-md mb-4 mt-10" data-aos="fade">
            {{ session('success') }}
        </div>
    @endif

        <div class="flex border rounded-md my-2">
            <img src="{{ asset('images/rekap-nilai.png') }}" alt=""  class="size-8 md:size-16">
            <a href="{{ route('daftarnilaipraktikan.index') }}" class="flex items-center mx-3 font-semibold" >Akumulasi Nilai</a>
        </div>
        @if ($checkPreTest->where('course_id', $courseName->id)->isNotEmpty())
            <div class="flex border rounded-md my-2">
                <img src="{{ asset('images/pre-tests.png') }}" alt=""  class="size-8 md:size-16">
                <a href="{{ route('pretest.edit', ['pretest' => $courseName->id ]) }}" class="flex items-center mx-3 font-semibold" > Daftar Nilai Pre-Test</a>
            </div>
        @else
            <div class="flex border rounded-md my-2">
                <img src="{{ asset('images/pre-tests.png') }}" alt=""  class="size-8 md:size-16">
                <a href="{{ route('pretest.index') }}" class="flex items-center mx-3 font-semibold" > Daftar Nilai Pre-Test</a>
            </div>
        @endif

        @if ($checkWeeklyScore->where('course_id', $courseName->id)->isNotEmpty())
        <div class="flex border rounded-md my-2">
            <img src="{{ asset('images/nilai-pekan.png') }}" alt=""  class="size-8 md:size-16">
            <a href="{{ route('nilaiperpekan.edit', ['nilaiperpekan' => $courseName->id ]) }}" class="flex items-center mx-3 font-semibold" > Daftar Nilai Per-pekan</a>
        </div>
        @else
            <div class="flex border rounded-md my-2">
                <img src="{{ asset('images/nilai-pekan.jpg') }}" alt=""  class="size-8 md:size-16">
                <a href="{{ route('nilaiperpekan.index') }}" class="flex items-center mx-3 font-semibold" > Daftar Nilai Per-pekan</a>
            </div>
        @endif

        @if ($checkPostTest->where('course_id', $courseName->id)->isNotEmpty())
            <div class="flex border rounded-md my-2">
                <img src="{{ asset('images/post-tests.png') }}" alt=""  class="size-8 md:size-16">
                <a href="{{ route('posttest.edit', ['posttest' => $courseName->id ]) }}" class="flex items-center mx-3 font-semibold" > Daftar Nilai Post-Test</a>
            </div>
        @else
            <div class="flex border rounded-md my-2">
                <img src="{{ asset('images/post-tests.png') }}" alt=""  class="size-8 md:size-16">
                <a href="{{ route('posttest.index') }}" class="flex items-center mx-3 font-semibold" > Daftar Nilai Post-Test</a>
            </div>
        @endif




        <div class="md:flex-1">

            @foreach ($meetings as $meeting)
                <div class="border-b border-gray-300" data-aos="fade-left">
                    <button class="w-full flex justify-between items-center text-left py-4" onclick="toggleAccordion({{ $meeting->id }}, 'icon1')">
                        <span class="font-semibold">{{ $meeting->meeting_name . " | " . $meeting->meeting_topic}}</span>
                        <span id="icon1" class="text-2xl font-bold">+</span>
                    </button>
                    <div class="flex space-x-2">
                        <!-- Tombol Edit -->
                        <a href="{{ route('pertemuan.edit', $meeting->id) }}">
                            <p class="bg-blue-500 text-white px-5 py-1 rounded hover:bg-blue-600">Edit</p>
                        </a>
                        <!-- Tombol Hapus -->
                        <form action="{{ route('pertemuan.destroy', $meeting->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Hapus</button>

                            <div id="confirmationModalDelete" class="fixed z-10 inset-0 overflow-y-auto hidden">
                                <div class="flex items-center justify-center min-h-screen">
                                    <div class="bg-white rounded-lg p-6 shadow-lg max-w-md w-full">
    
                                        <h2 class="text-lg font-semibold mb-4">Konfirmasi Pengunggahan</h2>
                                        <p id="modalCourseNameDelete" class="mb-4">Apakah data pertemuan sudah benar?</p>
                                        <div class="flex justify-end">
                                            <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2" onclick="closeModalDelete()">Batal</button>
                                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Konfirmasi</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="{{ $meeting->id }}" class="accordion-content hidden" style="max-height: 0;" >
                        <p class="p-4 text-gray-700" >
                            {{ $meeting->description }}
                        </p>
                        <div class="flex justify-center flex-col md:flex-row" >
                            <div class="md:flex-1">
                                <a href="{{ route('presensi.create', ['meeting_id' => $meeting->id  ]) }}" class="flex justify-center border p-3 md:flex-col md:items-center">
                                    <img src="{{ asset('images/peserta_presensi.png') }}" alt="" class="size-8 md:size-16">
                                    <p class="ms-3 font-semibold md:ms-0">Presensi</p>
                                </a>
                            </div>
                            
                            <div class="md:flex-1">
                                <a href="{{ route('materi.index', ['meeting_id' => $meeting->id  ])}}" class="flex justify-center border p-3 md:flex-col md:items-center">
                                    <img src="{{ asset('images/materi.png') }}" alt="" class="size-8 md:size-16">
                                    <p class="ms-3 font-semibold md:ms-0">Unggah Materi</p>
                                </a>
                            </div>
                            <div class="md:flex-1">
                                <a href="{{ route('assignment.index', ['meeting_id' => $meeting->id  ])}}" class="flex justify-center border p-3 md:flex-col md:items-center">
                                    <img src="{{ asset('images/tugas.png') }}" alt="" class="size-8 md:size-16">
                                    <p class="ms-3 font-semibold md:ms-0">Unggah Tugas</p>
                                </a>
                            </div>
                            @if ($checkWeeklyScore->where('course_id', $courseName->id)->isNotEmpty())
                            <div class="md:flex-1">
                                <a href="{{ route('nilaiperpekan.input', ['meeting_id' => $meeting->id, 'course_id' => $courseName->id]) }}" class="flex justify-center border p-3 md:flex-col md:items-center">
                                    <img src="{{ asset('images/nilai-pekan.png') }}" alt="" class="size-8 md:size-16">
                                    <p class="ms-3 font-semibold md:ms-0">Nilai Pekan ke-{{ $loop->iteration }}</p>
                                </a>
                            </div>
                            @else
                            <div class="md:flex-1">
                                <a href="{{ route('nilaiperpekan.index') }}" class="flex justify-center border p-3 md:flex-col md:items-center">
                                    <img src="{{ asset('images/nilai-pekan.jpg') }}" alt="" class="size-8 md:size-16">
                                    <p class="ms-3 font-semibold md:ms-0">Nilai Per-pekan</p>
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach

            @if($certificate)
                <div class="border border-gray-300 rounded-md p-3 mt-2">
                    <button class="w-full flex items-center text-left py-4">
                        <span><img src="{{ asset('images/certifikat.png') }}" alt="" class="w-10 me-4"></span>
                        <a href="{{ asset($certificate->certificate_verification_name) }}">Klaim Sertifikat: Keikutsertaan Peserta</a>
                    </button>
                </div>
            @endif
        
            @if($personCertificate)
                <div class="border border-gray-300 rounded-md p-3 mt-2">
                    <button class="w-full flex items-center text-left py-4">
                        <span><img src="{{ asset('images/certifikat.png') }}" alt="" class="w-10 me-4"></span>
                        <a href="{{ asset($personCertificate->certificate_verification_name) }}">Klaim Sertifikat: <span class="italic font-semibold">Peserta Terbaik</span></a>
                    </button>
                </div>
            @endif                

            <div class="bg-primary rounded-md text-white flex justify-center py-2">
                <a href="{{ route('pertemuan.create') }}">+ Tambah Pertemuan</a>
            </div>
        </div>
    </div>



@else
    <!-- Jika user belum terdaftar, tampilkan bagian pendaftaran -->
    <div class="container mx-auto px-4 flex flex-col justify-center">
        <div class="relative min-h-96 bg-contain bg-center flex items-center justify-center" style="background-image: url({{ asset('images/bg_study-group.png')}}); background-repeat: no-repeat">
            <p class="font-poppins text-white text-sm font-semibold md:text-5xl md:my-48">Study Group</p>
        </div>

        <div class="md:flex-1">
            @foreach ($facultyList as $faculty)
            <div class="border-b border-gray-300 bg-primary px-5 text-white rounded-md m-2">
                <button class="w-full flex justify-between items-center text-left py-4" onclick="toggleAccordion('{{ $faculty->id }}', 'icon1')">
                    <span class="font-semibold">{{ $faculty->faculty_name }}</span>
                    <span id="icon1" class="text-2xl font-bold">+</span>
                </button>
                <div id="{{ $faculty->id }}" class="accordion-content hidden" style="max-height: 0;">
                    @foreach ($faculty->courses as $course)
                    <div class="flex justify-between m-5">
                        <li class="text-white">{{ $course->course_name }}</li>
                        <!-- Tambahkan event onclick untuk menampilkan modal -->
                        <button type="button" class="ms-3 bg-btn-primary text-green-950 font-bold py-2 px-4 rounded" 
                                onclick="openModal({{ $course->id }}, '{{ $course->course_name }}')">
                            {{ __('Daftar') }}
                        </button>
                        

                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endif

<!-- Modal Popup -->
<div id="confirmationModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white rounded-lg p-6 shadow-lg max-w-md w-full">
            <h2 class="text-lg font-semibold mb-4">Konfirmasi Pendaftaran</h2>
            <p id="modalCourseName" class="mb-4"></p>
            <form id="registrationForm" action="{{ route('asisten-group.store') }}" method="POST">
                @csrf
                <input type="hidden" name="course_id" id="courseIdInput">
                <div class="flex justify-end">
                    <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2" onclick="closeModal()">
                        Batal
                    </button>
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        Konfirmasi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

<!-- Tambahkan JavaScript untuk kontrol modal -->
<script>
    function openModal(courseId, courseName) {
        // Tampilkan modal
        document.getElementById('confirmationModal').classList.remove('hidden');
        
        // Set detail course pada modal
        document.getElementById('modalCourseName').textContent = "Apakah Anda yakin ingin mendaftar pada course: " + courseName + "?";
        
        // Set course_id di form
        document.getElementById('courseIdInput').value = courseId;
    }

    function closeModal() {
        // Sembunyikan modal
        document.getElementById('confirmationModal').classList.add('hidden');
    }

    function openModalDelete(meetingId) {
        document.getElementById('modalCourseNameDelete').textContent = "Apakah Anda yakin ingin mendaftar pada course: " + meetingId + "?";
        document.getElementById('confirmationModalDelete').classList.remove('hidden');
    }

    function closeModalDelete() {
        document.getElementById('confirmationModal').classList.add('hidden');
    }
</script>
