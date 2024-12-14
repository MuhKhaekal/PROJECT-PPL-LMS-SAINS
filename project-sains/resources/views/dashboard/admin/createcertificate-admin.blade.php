@extends('dashboard.admin.base-admin')

@section('title', 'SAINS - Unggah Certificate')

@section('content')
<div class="bg-white min-h-screen p-8 rounded-md border-2">
  <h1 class="text-3xl font-bold bg-yellow-400 w-fit px-5 py-2  rounded-md shadow-md text-primary">UNGGAH TEMPLATE SERTIFIKAT</h1>

<form action="{{ route('admincertificate.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
    @if ($errors->any())
          <div class="rounded-md bg-red-50 p-4 mt-5">
              <div class="flex">
                  <div class="flex-shrink-0">
                      <!-- Icon error -->
                      <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M10 14l2-2m0 0l2-2m-2 2l2 2m-2-2l-2 2m10-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                  </div>
                  <div class="ml-3">
                      <h3 class="text-sm font-bold text-red-800">Ada beberapa masalah dengan input Anda:</h3>
                      <div class="mt-2 text-sm text-red-700">
                          <ul class="list-disc pl-5 space-y-1">
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      @endif

  <div class="col-span-full  mb-10">
    <div class="flex">
      <div class="flex-1 mx-4">
        <label for="peserta" class="block text-sm/6 font-bold text-gray-900 mt-5">Sertifikat Peserta</label>
        <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
          <div class="text-center">
              <input type="hidden" name="sertifikatPeserta" value="Sertifikat Peserta Umum">
              <input id="peserta" name="peserta" type="file" class="sr-only" onchange="handleFileUpload(event, 'peserta_link')">
              <label for="peserta" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                  <span>Upload a file</span>
              </label>
              <p class="pl-1">or drag and drop</p>
              <p id="peserta_link" class="mt-3 text-sm underline text-blue-600"></p>
              <p class="peserta_error text-red-600"></p>
          </div>
        </div>
  
        <div class="flex">
          <div class="flex-1 mx-2">
            <label for="praktikan_ikhwan-file" class="block text-sm/6 font-bold text-gray-900 mt-5">Praktikan Ikhwan Terbaik</label>
            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                <div class="text-center">
                    <input type="hidden" name="sertifikatAsisten" value="Sertifikat Asisten Umum">
                    <input id="praktikan_ikhwan_file" name="praktikan_ikhwan_file" type="file" class="sr-only" onchange="handleFileUpload(event, 'praktikan_ikhwan_file_link')">
                    <label for="praktikan_ikhwan_file" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                        <span>Upload a file</span>
                    </label>
                    <p class="pl-1">or drag and drop</p>
                    <p id="praktikan_ikhwan_file_link" class="mt-3 text-sm underline text-blue-600"></p>
                    <p class="praktikan_ikhwan_error text-red-600"></p>
                    <select id="list-praktikan-ikhwan" name="list-praktikan-ikhwan" class="mt-5 text-sm rounded-lg block w-full bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" style="max-height: 200px; overflow-y: auto;">
                      <option disabled selected>Pilih Praktikan</option>
                      @foreach ($praktikan as $item)
                      <option value="{{ $item->id }}">{{ $item->nim }} - {{ $item->name }}</option>
                      @endforeach
                  </select>
                </div>
            </div>
          </div>
    
          <div class="flex-1 mx-2">
            <label for="praktikan_akhwat_file" class="block text-sm/6 font-bold text-gray-900 mt-5">Praktikan Akhwat Terbaik</label>
            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                <div class="text-center">
                    <input type="hidden" name="sertifikatPesertaIkhwanTerbaik" value="Sertifikat Peserta Ikhwan Terbaik">
                    <input id="praktikan_akhwat_file" name="praktikan_akhwat_file" type="file" class="sr-only" onchange="handleFileUpload(event, 'praktikan_akhwat_file_link')">
                    <label for="praktikan_akhwat_file" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                        <span>Upload a file</span>
                    </label>
                    <p class="pl-1">or drag and drop</p>
                    <p id="praktikan_akhwat_file_link" class="mt-3 text-sm underline text-blue-600"></p>
                    <p class="praktikan_akhwat_error text-red-600"></p>
  
                    <select id="list-praktikan-akhwat" name="list-praktikan-akhwat" class="mt-5 text-sm rounded-lg block w-full bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" style="max-height: 200px; overflow-y: auto;">
                        <option disabled selected>Pilih Praktikan</option>
                        @foreach ($praktikan as $item)
                        <option value="{{ $item->id }}">{{ $item->nim }} - {{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                
            </div>
          </div>
        </div>
      </div>
      
      <div class="flex-1 mx-4">
        <label for="asisten" class="block text-sm/6 font-bold text-gray-900 mt-5">Sertifikat Asisten</label>
        <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
            <div class="text-center">
                <input type="hidden" name="sertifikatPesertaAkhwatTerbaik" value="Sertifikat Peserta Akhwat Terbaik">
                <input id="asisten" name="asisten" type="file" class="sr-only" onchange="handleFileUpload(event, 'asisten_link')">
                <label for="asisten" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                    <span>Upload a file</span>
                </label>
                <p class="pl-1">or drag and drop</p>
                <p id="asisten_link" class="mt-3 text-sm underline text-blue-600"></p>
                <p class="asisten_error text-red-600"></p>
                
            </div>
        </div>
    
        <div class="flex">
          <div class="flex-1 mx-2">
            <label for="asisten_ikhwan-file" class="block text-sm/6 font-bold text-gray-900 mt-5">Asisten Ikhwan Terbaik</label>
            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                <div class="text-center">
                    <input type="hidden" name="sertifikatAsistenIkhwanTerbaik" value="Sertifikat Asisten Ikhwan Terbaik">
                    <input id="asisten_ikhwan_file" name="asisten_ikhwan_file" type="file" class="sr-only" onchange="handleFileUpload(event, 'asisten_ikhwan_file_link')">
                    <label for="asisten_ikhwan_file" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                        <span>Upload a file</span>
                    </label>
                    <p class="pl-1">or drag and drop</p>
                    <p id="asisten_ikhwan_file_link" class="mt-3 text-sm underline text-blue-600"></p>
                    <p class="asisten_ikhwan_error text-red-600"></p>
                    <select id="list-asisten-ikhwan" name="list-asisten-ikhwan" class="mt-5 text-sm rounded-lg block w-full bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" style="max-height: 200px; overflow-y: auto;">
                      <option selected>Pilih Asisten</option>
                      @foreach ($asisten as $item)
                      <option value="{{ $item->id }}">{{ $item->nim }} - {{ $item->name }}</option>
                      @endforeach
                  </select>
                </div>
            </div>
          </div>
    
          <div class="flex-1 mx-2">
            <label for="asisten_akhwat_file" class="block text-sm/6 font-bold text-gray-900 mt-5">Asisten Akhwat Terbaik</label>
            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                <div class="text-center">
                   <input type="hidden" name="sertifikatAsistenAkhwatTerbaik" value="Sertifikat Asisten Akhwat Terbaik">
                    <input id="asisten_akhwat_file" name="asisten_akhwat_file" type="file" class="sr-only" onchange="handleFileUpload(event, 'asisten_akhwat_file_link')">
                    <label for="asisten_akhwat_file" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                        <span>Upload a file</span>
                    </label>
                    <p class="pl-1">or drag and drop</p>
                    <p id="asisten_akhwat_file_link" class="mt-3 text-sm underline text-blue-600"></p>
                    <p class="asisten_akhwat_error text-red-600"></p>
  
                    {{-- <button class="text-sm rounded-lg px-8 py-2 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"">Pilih Asisten</button> --}}
  
  
                    <select id="list-asisten-akhwat" name="list-asisten-akhwat" class="mt-5 text-sm rounded-lg block w-full bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" style="max-height: 200px; overflow-y: auto;">
                        <option selected>Pilih Asisten</option>
                        @foreach ($asisten as $item)
                        <option value="{{ $item->id }}">{{ $item->nim }} - {{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <button type="submit" class="bg-blue-500 text-white px-3 py-2 rounded-md">+ Unggah Sertifikat</button>
</form>
</div>





<script>
  function handleFileUpload(event, linkContainerId) {
      const fileInput = event.target;
      const file = fileInput.files[0];
      const fileLinkContainer = document.getElementById(linkContainerId);
      const existingErrorMessage = document.querySelector(`.${linkContainerId}_error`);
  
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
              const errorMessage = document.createElement('div');
              errorMessage.classList.add('text-red-500', 'mt-2');
              errorMessage.textContent = 'Tipe file tidak valid. Hanya file PDF, DOC, DOCX, PNG, JPG, JPEG yang diperbolehkan.';
              fileInput.insertAdjacentElement('afterend', errorMessage);
              return;
          }
  
          if (fileSize > maxSize) {
              const errorMessage = document.createElement('div');
              errorMessage.classList.add('text-red-500', 'mt-2');
              errorMessage.textContent = 'Ukuran file terlalu besar. Maksimal 10MB.';
              fileInput.insertAdjacentElement('afterend', errorMessage);
              return;
          }
  
          // Buat tag <a> untuk menampilkan nama file jika valid
          const link = document.createElement('a');
          link.href = URL.createObjectURL(file);
          link.textContent = file.name;
          link.target = '_blank';
  
          // Tampilkan tautan file
          fileLinkContainer.appendChild(link);
      }
  }
  </script>
@endsection