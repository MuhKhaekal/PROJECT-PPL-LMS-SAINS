@extends('dashboard.user.base-user')

@section('title', 'SAINS - Detail Tugas2')

@section('content')

<div class="container mx-auto px-4 font-poppins">

        
        <h1 class="mt-10 text-4xl  underline" data-aos="fade-right">{{ $assignment->assignment_name }}</h1>

        <p class="mt-3 text-justify" data-aos="fade">{{ $assignment->description }} </p>
        <div id="pdfViewer" class="mt-4" data-aos="fade-up">
            <iframe id="pdfFrame" src="{{ $base64Pdf }}" style="width: 100%; height: 500px;" frameborder="0"></iframe>
        </div> 
        

        <div class=" border-gray-300" >
            <button class="py-3 bg-primary mt-5 text-white px-5 rounded-md active:bg-slate-500" value="tes" onclick="toggleAccordion('accordion1', 'icon1')" data-aos="fade-right">
            Unggah Tugas
            </button>
            <button class="py-3 bg-primary mt-5 text-white px-5 rounded-md active:bg-slate-500" value="tes" onclick="toggleAccordion('accordion2', 'icon2')" data-aos="fade-right">
                Kelola Tugas Saya
                </button>
            <div id='accordion1' class="accordion-content hidden mt-5" style="max-height: 0;">
                <form action="{{ route('assignmentcheck.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ $assignment->id }}" name="assignment_id">
                    <input type="hidden" value="{{ $userId }}" name="user_id">
                    <div class="col-span-full">
                        <label for="cover-photo" class="block text-sm/6 font-medium text-gray-900">File Tugas </label>
                        <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                        <div class="text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" />
                            </svg>
                            <div class="mt-4 flex text-sm/6 text-gray-600">
                            <label for="assignment_check_file_name" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                <span>Upload a file</span>
                                <input id="assignment_check_file_name" name="assignment_check_file_name" type="file" class="sr-only">
                            </label>
                            <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs/5 text-gray-600">PDF up to 10MB</p>
                            <p id="fileLinkContainer" class="mt-3 text-sm underline text-blue-600"></p>
                            <p class="errorContainer text-red-600"></p>
                        </div>
                        </div>
                    </div>
                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <button type="button" class="text-sm/6 font-semibold text-gray-900" onclick="closeModal()">Cancel</button>
                        <button type="button" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" onclick="openModal()">Save</button>
                    </div>

                    <div id="confirmationModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
                        <div class="flex items-center justify-center min-h-screen">
                            <div class="bg-white rounded-lg p-6 shadow-lg max-w-md w-full">

                                <h2 class="text-lg font-semibold mb-4">Konfirmasi Pengunggahan</h2>
                                <p id="modalCourseName" class="mb-4">Apakah tugas yang dikirimkan sudah benar?</p>
                                <div class="flex justify-end">
                                    <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2" onclick="closeModal()">Batal</button>
                                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Konfirmasi</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            
            <!-- Accordion 2 - Kelola Tugas yang Sudah Disubmit -->
            <div id='accordion2' class="accordion-content hidden mt-5" style="max-height: 0;">
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="text-lg font-semibold mb-4">Tugas yang Sudah Disubmit</h3>
                    
                    @php
                        $userSubmissions = \App\Models\AssignmentCheck::where('assignment_id', $assignment->id)
                            ->where('user_id', $userId)
                            ->get();
                    @endphp

                    @if($userSubmissions->count() > 0)
                        <div class="space-y-4">
                            @foreach($userSubmissions as $submission)
                                <div class="bg-white p-4 rounded-lg border border-gray-200 shadow-sm">
                                    <div class="flex justify-between items-center">
                                        <div class="flex-1">
                                            <div class="flex items-center space-x-3">
                                                <!-- File Icon -->
                                                <svg class="h-8 w-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                </svg>
                                                
                                                <div>
                                                    <p class="text-sm font-medium text-gray-900">
                                                        {{ basename($submission->assignment_check_file_name) }}
                                                    </p>
                                                    <p class="text-xs text-gray-500">
                                                        Disubmit: {{ $submission->created_at->format('d M Y, H:i') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="flex items-center space-x-2">
                                            <a " 
                                                class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                 <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                 </svg>
                                                 {{ $submission->score }}
                                             </a>

                                            <!-- Download Button -->
                                            <a href="{{ asset($submission->assignment_check_file_name) }}" 
                                               download 
                                               class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                </svg>
                                                Download
                                            </a>
                                            
                                            <!-- Delete Button -->
                                            <button type="button" 
                                                    onclick="openDeleteModal({{ $submission->id }})"
                                                    class="inline-flex items-center px-3 py-2 border border-red-300 shadow-sm text-sm leading-4 font-medium rounded-md text-red-700 bg-white hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                Hapus
                                            </button>

                                            <!-- Hidden form for deletion -->
                                            <form id="deleteForm-{{ $submission->id }}" 
                                                  action="{{ route('assignmentcheck.destroy', $submission->id) }}" 
                                                  method="POST" 
                                                  class="hidden">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <p class="mt-2 text-sm text-gray-600">Belum ada tugas yang disubmit</p>
                            <p class="text-xs text-gray-500">Gunakan form "Unggah Tugas" untuk mengirim tugas Anda</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteConfirmationModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white rounded-lg p-6 shadow-lg max-w-md w-full">
            <div class="flex items-center mb-4">
                <svg class="h-6 w-6 text-red-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                </svg>
                <h2 class="text-lg font-semibold text-gray-900">Konfirmasi Penghapusan</h2>
            </div>
            <p class="mb-6 text-gray-600">Apakah Anda yakin ingin menghapus submit tugas ini? Tindakan ini tidak dapat dibatalkan.</p>
            <div class="flex justify-end space-x-3">
                <button type="button" 
                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded" 
                        onclick="closeDeleteModal()">
                    Batal
                </button>
                <button type="button" 
                        id="confirmDeleteBtn"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Hapus
                </button>
            </div>
        </div>
    </div>
</div>


<script>
    function togglePdf(pdfUrl) {
        const pdfViewer = document.getElementById('pdfViewer');
        const pdfFrame = document.getElementById('pdfFrame');
        
        pdfFrame.src = pdfUrl;
        pdfViewer.classList.remove('hidden');
    }

    function openModal() {
      document.getElementById('confirmationModal').classList.remove('hidden');
  }

  function closeModal() {
      document.getElementById('confirmationModal').classList.add('hidden');
  }

  document.getElementById('assignment_check_file_name').addEventListener('change', function(event) {
    const fileInput = event.target;
    const file = fileInput.files[0];
    const fileLinkContainer = document.getElementById('fileLinkContainer');
    const existingErrorMessage = document.querySelector('.text-red-500'); // Cari pesan error yang ada

    // Hapus pesan error sebelumnya jika ada
    if (existingErrorMessage) {
        existingErrorMessage.remove();
    }

    // Hapus link file yang sudah ada
    fileLinkContainer.innerHTML = '';

    if (file) {
        // Validasi tipe file
        const validTypes = ['pdf', 'doc', 'docx', 'png', 'jpg', 'jpeg'];
        const fileType = file.name.split('.').pop().toLowerCase();

        // Validasi ukuran file (maksimal 10MB)
        const maxSize = 10 * 1024 * 1024; // 10MB
        const fileSize = file.size;

        // Jika file tidak sesuai tipe atau ukuran
        if (!validTypes.includes(fileType)) {
            // Tampilkan pesan error jika tipe file tidak valid
            const errorMessage = document.createElement('div');
            errorMessage.classList.add('text-red-500', 'mt-2');
            errorMessage.textContent = 'Tipe file tidak valid. Hanya file PDF, DOC, DOCX, PNG, JPG, JPEG yang diperbolehkan.';
            fileInput.insertAdjacentElement('afterend', errorMessage);
            return;
        }

        if (fileSize > maxSize) {
            // Tampilkan pesan error jika ukuran file lebih besar dari 10MB
            const errorMessage = document.createElement('div');
            errorMessage.classList.add('text-red-500', 'mt-2');
            errorMessage.textContent = 'Ukuran file terlalu besar. Maksimal 10MB.';
            fileInput.insertAdjacentElement('afterend', errorMessage);
            return;
        }

        // Buat tag <a> untuk menampilkan nama file jika valid
        const link = document.createElement('a');
        link.href = URL.createObjectURL(file); // Buat URL dari file yang diunggah
        link.textContent = file.name;
        link.target = '_blank';

        // Tampilkan tautan file
        fileLinkContainer.appendChild(link);
    }
});

// Function untuk toggle accordion (pastikan ini ada)
function toggleAccordion(accordionId, iconId) {
    const accordion = document.getElementById(accordionId);
    const isHidden = accordion.classList.contains('hidden');
    
    if (isHidden) {
        accordion.classList.remove('hidden');
        accordion.style.maxHeight = accordion.scrollHeight + "px";
    } else {
        accordion.style.maxHeight = "0";
        setTimeout(() => {
            accordion.classList.add('hidden');
        }, 300);
    }
}

// Functions untuk delete modal
let currentSubmissionId = null;

function openDeleteModal(submissionId) {
    currentSubmissionId = submissionId;
    document.getElementById('deleteConfirmationModal').classList.remove('hidden');
}

function closeDeleteModal() {
    currentSubmissionId = null;
    document.getElementById('deleteConfirmationModal').classList.add('hidden');
}

// Event listener untuk tombol konfirmasi hapus
document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
    if (currentSubmissionId) {
        document.getElementById('deleteForm-' + currentSubmissionId).submit();
    }
});
</script>

@endsection