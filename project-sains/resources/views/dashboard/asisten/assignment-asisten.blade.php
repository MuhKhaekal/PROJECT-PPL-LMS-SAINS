@extends('dashboard.asisten.base-asisten')

@section('title', 'SAINS - Tugas')

@section('content')

<div class="container mx-auto px-4 min-h-screen font-poppins">
    <h1 class="text-center m-5 font-bold">Daftar Materi Pertemuan 1</h1>
    
    @foreach ($assignments as $assignment)
    <div class="border-b border-gray-300 flex items-center">
        <button class="w-full flex items-center  text-left py-4">
            <span><img src="{{ asset('images/tugas.png') }}" alt="" class="w-10 me-4"></span>
            <a href="{{ route('assignment.edit', $assignment->id) }}">{{ $assignment->assignment_name }}</a>
        </button>

        <a href="{{ route('assignment.show', ['assignment' => $assignment->id  ]) }}" class="text-blue-500 underline mx-4">Submission</a>
    
        <form action="{{ route('assignment.destroy', $assignment->id) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="button" onclick="openModalDelete({{ $assignment->id }}, '{{ $assignment->assignment_name }}')" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Hapus</button>
        </form>
    </div>
    
    @endforeach
    
    <div id="confirmationModalDelete" class="fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white rounded-lg p-6 shadow-lg max-w-md w-full">
                <h2 class="text-lg font-semibold mb-4">Konfirmasi Penghapusan</h2>
                <p id="modalCourseNameDelete" class="mb-4">Apakah Anda yakin ingin menghapus tugas ini?</p>
                <div class="flex justify-end">
                    <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2" onclick="closeModalDelete()">Batal</button>
                    <button id="confirmDeleteButton" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Konfirmasi</button>
                </div>
            </div>
        </div>
    </div>

    <a href="{{ route('assignment.create', ['meeting_id' => $meetingId  ]) }}" >
        <div class="text-center bg-primary rounded-md pb-2 mt-10">
                <h1 class="text-white">+ Tambahkan Tugas</h1>
        </div>
    </a>
</div>

<script>
let currentDeleteId = null;

function openModalDelete(assignmentId, assignmentName) {
    currentDeleteId = assignmentId; // Simpan ID tugas yang akan dihapus
    document.getElementById('modalCourseNameDelete').textContent = "Apakah Anda yakin ingin menghapus tugas: " + assignmentName + "?";
    document.getElementById('confirmationModalDelete').classList.remove('hidden');
}

function closeModalDelete() {
    document.getElementById('confirmationModalDelete').classList.add('hidden');
}

// Ketika tombol konfirmasi ditekan, ubah aksi form untuk menggunakan ID yang benar
document.getElementById('confirmDeleteButton').onclick = function() {
    const form = document.querySelector(`form[action*="${currentDeleteId}"]`);
    if (form) {
        form.submit(); // Submit form untuk menghapus tugas yang benar
    }
    closeModalDelete(); // Tutup modal setelah konfirmasi
};
</script>
@endsection