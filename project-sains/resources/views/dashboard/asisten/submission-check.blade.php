@extends('dashboard.asisten.base-asisten')

@section('title', 'SAINS - Detail Tugas')

@section('content')

<div class="container mx-auto px-4 font-poppins">

        
        {{-- <h1 class="mt-10 text-4xl font-semibold underline">{{ $assignmentCheckId->assignment_check_name }}</h1> --}}

        <form action="{{ route('submission.update', $assignmentCheckId->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div id="pdfViewer" class="mt-4">
                <iframe id="pdfFrame" src="{{ $base64Pdf }}" style="width: 100%; height: 500px;" frameborder="0"></iframe>
            </div> 
            
    
            <div class="flex justify-between">
                <div class="font-poppins mt-5 flex-1">
                    <label for="number-input-{{ $assignmentCheckId->id }}" class="block mb-2 text-sm ">Nilai :</label>
                    <input type="number" id="number-input-{{ $assignmentCheckId->id }}" name="score" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5  dark:border-gray-600 dark:placeholder-gray-400      dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0-100" min="0" max="100" required />
                </div> 
                
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="button" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" onclick="openModal()">Save</button>
                </div>
        
                <div id="confirmationModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
                    <div class="flex items-center justify-center min-h-screen">
                        <div class="bg-white rounded-lg p-6 shadow-lg max-w-md w-full">
        
                            <h2 class="text-lg font-semibold mb-4">Konfirmasi Pengunggahan</h2>
                            <p id="modalCourseName" class="mb-4">Apakah data pertemuan sudah benar?</p>
                            <div class="flex justify-end">
                                <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2" onclick="closeModal()">Batal</button>
                                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Konfirmasi</button>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </form>



    
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

  document.getElementById('assignment_file_name').addEventListener('change', function(event) {
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
</script>
@endsection