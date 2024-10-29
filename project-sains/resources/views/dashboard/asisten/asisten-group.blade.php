@extends('dashboard.asisten.base-asisten')

@section('title', 'SAINS - Asisten Group')

@section('content')

@if($checkGroup->where('user_id', $userId)->isNotEmpty())
    <!-- Jika user sudah terdaftar, tampilkan pesan ini -->
    <div class="container mx-auto px-4 flex flex-col justify-center">
        <div class="relative min-h-96 bg-contain bg-center flex items-center justify-center" style="background-image: url({{ asset('images/bg_study-group.png')}}); background-repeat: no-repeat">
            <p class="font-poppins text-white text-sm font-semibold md:text-5xl md:my-48">{{$courseName->course_name }}</p>
        </div>

        <div class="md:flex-1">
            <div class="border-b border-gray-300">
                <a href="{{ route('presensi.index') }}" class="">
                    <button class="w-full flex items-center text-left py-4">
                        <span><img src="{{ asset('images/peserta_presensi.png') }}" alt="" class="w-10 me-4"></span>
                        <span class="font-semibold">Presensi Kehadiran</span>
                    </button>
                </a>
            
            </div>
            @foreach ($meetings as $meeting)
                <div class="border-b border-gray-300">
                    <button class="w-full flex justify-between items-center text-left py-4" onclick="toggleAccordion({{ $meeting->id }}, 'icon1')">
                        <span class="font-semibold">{{ $meeting->meeting_name . " | " . $meeting->meeting_topic}}</span>
                        <span id="icon1" class="text-2xl font-bold">+</span>
                    </button>
                    <div class="flex space-x-2">
                        <!-- Tombol Edit -->
                        <a href="{{ route('pertemuan.edit', $meeting->id) }}" class="bg-blue-500 text-white px-4 py-1 rounded hover:bg-blue-600">Edit</a>
                        <!-- Tombol Hapus -->
                        <form action="{{ route('pertemuan.destroy', $meeting->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="openModalDelete()" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Hapus</button>

                            <div id="confirmationModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
                                <div class="flex items-center justify-center min-h-screen">
                                    <div class="bg-white rounded-lg p-6 shadow-lg max-w-md w-full">
                        
                                        <h2 class="text-lg font-semibold mb-4">Konfirmasi Pengunggahan</h2>
                                        <p id="modalCourseName" class="mb-4">Apakah data pertemuan sudah benar?</p>
                                        <div class="flex justify-end">
                                            <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2" onclick="closeModalDelete()">Batal</button>
                                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Konfirmasi</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="{{ $meeting->id }}" class="accordion-content hidden" style="max-height: 0;">
                        <p class="p-4 text-gray-700">
                            {{ $meeting->description }}
                        </p>
                    </div>
                </div>
            @endforeach
            <a href="{{ route('pertemuan.create') }}">
                <div class="text-center bg-primary rounded-md pb-2">
                        <h1 class="text-white text-4xl">+</h1>
                </div>
            </a>
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

    function openModalDelete() {
        document.getElementById('confirmationModal').classList.remove('hidden');
    }

    function closeModalDelete() {
        document.getElementById('confirmationModal').classList.add('hidden');
    }
</script>
