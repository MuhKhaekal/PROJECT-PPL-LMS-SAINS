@extends('dashboard.user.base-user')

@section('title', 'SAINS - Detail Tugas')

@section('content')

<div class="container mx-auto px-4 font-poppins">

        
        <h1 class="mt-10 text-4xl  underline" data-aos="fade-right">{{ $assignment->assignment_name }}</h1>

        <p class="mt-3 text-justify" data-aos="fade">{{ $assignment->description }} Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque amet dignissimos aut consequuntur, laboriosam ipsam. Quos quibusdam iure laborum aperiam quo suscipit atque eligendi voluptate maiores, sapiente cum sed accusantium consectetur, consequatur cumque nisi recusandae repellendus. Consectetur, explicabo inventore? Neque pariatur, earum dolore aut maiores saepe adipisci optio officia ipsam assumenda itaque quidem et rerum unde asperiores sequi placeat illo harum tempore. Expedita minima dolorem quos, eum consequuntur adipisci minus pariatur sunt dolores placeat fuga corporis veritatis? Ipsum ab illum quia placeat alias labore nam minima, mollitia pariatur praesentium incidunt officiis beatae! Odit, animi tempora qui voluptate eveniet possimus? Enim.</p>
        <div id="pdfViewer" class="mt-4" data-aos="fade-up">
            <iframe id="pdfFrame" src="{{ $base64Pdf }}" style="width: 100%; height: 500px;" frameborder="0"></iframe>
        </div> 
        

        <div class=" border-gray-300" >
            <button class="py-3 bg-primary mt-5 text-white px-5 rounded-md active:bg-slate-500" value="tes" onclick="toggleAccordion('accordion1', 'icon1')" data-aos="fade-right">
            Unggah Tugas
            </button>
            <div id='accordion1' class="accordion-content hidden mt-5" style="max-height: 0;">
                <form action="{{ route('assignmentcheck.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ $assignment->id }}" name="assignment_id">
                    <input type="hidden" value="{{ $userId }}" name="user_id">
                    <div class="col-span-full">
                        <label for="cover-photo" class="block text-sm/6 font-medium text-gray-900">File Tugas  </label>
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
                                <p id="modalCourseName" class="mb-4">Apakah data pertemuan sudah benar?</p>
                                <div class="flex justify-end">
                                    <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2" onclick="closeModal()">Batal</button>
                                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Konfirmasi</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

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
</script>
@endsection