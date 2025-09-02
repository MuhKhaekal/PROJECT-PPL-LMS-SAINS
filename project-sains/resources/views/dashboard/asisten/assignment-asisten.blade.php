@extends('dashboard.asisten.base-asisten')

@section('title', 'SAINS - Tugas')

@section('content')

<div class="container mx-auto px-4 min-h-screen font-poppins">
    <h1 class="text-center m-5 font-bold">Daftar Tugas Pertemuan {{ $meetingId }}</h1>
    
    @foreach ($assignments as $assignment)
    <div class="border-b border-gray-300 flex items-center">
        <button class="w-full flex items-center text-left py-4">
            <span><img src="{{ asset('images/tugas.png') }}" alt="" class="w-10 me-4"></span>
            <a href="{{ route('assignment.edit', $assignment->id) }}">{{ $assignment->assignment_name }}</a>
        </button>

        <a href="{{ route('assignment.show', ['assignment' => $assignment->id]) }}" class="text-blue-500 underline mx-4">Submission</a>
    
        <!-- ✨ Tombol delete hanya buka modal -->
        <button type="button" 
                onclick="openModalDelete({{ $assignment->id }}, '{{ $assignment->assignment_name }}')" 
                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
            Hapus
        </button>
    </div>
    @endforeach
    
    <!-- Modal Konfirmasi -->
    <div id="confirmationModalDelete" class="fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white rounded-lg p-6 shadow-lg max-w-md w-full">
                <h2 class="text-lg font-semibold mb-4">Konfirmasi Penghapusan</h2>
                <p id="modalCourseNameDelete" class="mb-4">Apakah Anda yakin ingin menghapus tugas ini?</p>
                <div class="flex justify-end">
                    <button type="button" 
                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2" 
                            onclick="closeModalDelete()">Batal</button>
                    <button id="confirmDeleteButton" 
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        Konfirmasi
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ✨ Form Global Hidden -->
    <form id="deleteForm" method="POST" style="display:none;">
        @csrf
        @method('DELETE')
    </form>

    <div class="bg-primary rounded-md text-white flex justify-center py-2">
        <a href="{{ route('assignment.create', ['meeting_id' => $meetingId]) }}">+ Tambah Tugas</a>
    </div>
</div>

<script>
let currentDeleteId = null;

// ✨ pakai route helper dari Laravel
const deleteRoute = @json(route('assignment.destroy', ':id'));

function openModalDelete(assignmentId, assignmentName) {
    currentDeleteId = assignmentId;
    document.getElementById('modalCourseNameDelete').textContent =
        "Apakah Anda yakin ingin menghapus tugas: " + assignmentName + "?";
    document.getElementById('confirmationModalDelete').classList.remove('hidden');
}

function closeModalDelete() {
    document.getElementById('confirmationModalDelete').classList.add('hidden');
}

document.getElementById('confirmDeleteButton').onclick = function() {
    const form = document.getElementById('deleteForm');
    form.action = deleteRoute.replace(':id', currentDeleteId); // ✨ replace :id dengan id asli
    form.submit();
};
</script>
@endsection
