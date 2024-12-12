@extends('dashboard.admin.base-admin')

@section('title', 'SAINS - Unggah Certificate')

@section('content')
<h1 class="text-3xl font-bold">Edit Sertifikat</h1>

<form action="{{ route('admincertificate.update', ['admincertificate' => $certificate->id]) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
        <label for="sertifikat" class="block text-sm/6 font-medium text-gray-900 mt-5">Sertifikat Peserta</label>
        <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
          <div class="text-center">
              <input id="sertifikat" name="sertifikat" type="file" class="sr-only" onchange="handleFileUpload(event, 'peserta_link')">
              <label for="sertifikat" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                  <span>Upload a file</span>
              </label>
              <p class="pl-1">or drag and drop</p>
              <p id="peserta_link" class="mt-3 text-sm underline text-blue-600"></p>
              @if (!empty($certificate->user_id))
              <select id="list_nama" name="list_nama" class="mt-5 text-sm rounded-lg block w-full bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" style="max-height: 200px; overflow-y: auto;">
                
                @php
                    $isPraktikan = $praktikan->contains('id', $certificate->user_id);
                    $isAsisten = $asisten->contains('id', $certificate->user_id);
                @endphp
                
                @if ($isPraktikan)
                    <option disabled selected>Pilih Praktikan</option>

                    @foreach ($praktikan as $item)
                        <option value="{{ $item->id }}" {{ $certificate->user_id === $item->id ? 'selected' : '' }}>
                            Praktikan: {{ $item->nim }} - {{ $item->name }}
                        </option>
                    @endforeach
                @elseif ($isAsisten)
                   <option disabled selected>Pilih Asisten</option>

                    @foreach ($asisten as $item)
                        <option value="{{ $item->id }}" {{ $certificate->user_id === $item->id ? 'selected' : '' }}>
                            Asisten: {{ $item->nim }} - {{ $item->name }}
                        </option>
                    @endforeach
                @else
                    <option disabled>Tidak ada praktikan atau asisten yang ditemukan.</option>
                @endif

            </select>
              @endif
              <p class="peserta_error text-red-600"></p>
          </div>
        </div>

  <button type="submit" class="bg-blue-500 mt-5 text-white px-3 py-2 rounded-md">+ Edit Sertifikat</button>
</form>





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