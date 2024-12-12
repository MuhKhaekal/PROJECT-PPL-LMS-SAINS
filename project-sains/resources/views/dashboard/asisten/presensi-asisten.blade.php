@extends('dashboard.asisten.base-asisten')

@section('title', 'SAINS - Presensi')

@section('content')

{{-- @if ($checkPresence)
    tes
@else --}}
    


<div class="container mx-auto px-4 min-h-screen flex flex-col justify-center font-poppins">
  <div class="text-center mt-60 mb-5 md:mt-32 lg:mt-12 font-semibold">
    <p>Presensi Kehadiran</p>   
  </div>
  <div class="text-center mb-5">
    <p>{{ $meetingName->meeting_name }}</p>
  </div>
    <div class="">
      <form action="{{ route('presensi.store') }}" method="POST">
        @csrf
        <table class="w-full table-auto border-collapse border border-slate-500">
            <thead class="bg-primary text-white">
              <tr>
                <th>Nama</th>
                <th>Hadir</th>
                <th>Sakit</th>
                <th>Izin</th>
                <th>Alfa</th>
                <th>Keterangan</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($students as $student)
              <input type="hidden" name="user_id" value="{{ $student->id }}{{ $student->id }}">      
              <input type="hidden" name="meeting_id" value="{{ $meetingId}}">      
              <input type="hidden" name="course_id" value="{{ $courseName->id }}">      
            <tr class="border-collapse border">
                <td class="p-5">{{ $student->name }}</td>
                <td class="text-center"><input type="radio" name="status[{{ $student->id }}]" value="hadir"></td>
                <td class="text-center"><input type="radio" name="status[{{ $student->id }}]" value="sakit"></td>
                <td class="text-center"><input type="radio" name="status[{{ $student->id }}]" value="izin"></td>
                <td class="text-center"><input type="radio" name="status[{{ $student->id }}]" value="alfa"></td>
                <td class="text-center"><input type="text" name="keterangan[{{ $student->id }}]" placeholder=""></td>
            </tr>
            @endforeach
            </tbody>
          </table>
          <div class="text-end mt-5">
            <button type="button" class="ms-3 bg-primary text-white font-bold py-2 px-4 rounded" 
            onclick="openModal()">
            {{ __('Simpan') }}
            </button>
          </div>

          <div id="confirmationModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
            <div class="flex items-center justify-center min-h-screen">
                <div class="bg-white rounded-lg p-6 shadow-lg max-w-md w-full">
                    <h2 class="text-lg font-semibold mb-4">Konfirmasi Pendaftaran</h2>
                    <p id="modalCourseName" class="mb-4"></p>
                    <form id="registrationForm" action="{{ route('asisten-group.store') }}" method="POST">
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
      </form>

    </div>
</div>
{{-- @endif --}}

@endsection

<script>
    function openModal() {
        // Tampilkan modal
        document.getElementById('confirmationModal').classList.remove('hidden');
        
        // Set detail course pada modal
        document.getElementById('modalCourseName').textContent = "Apakah Apakah anda yakin menyimpan presensi?";
        

    }

    function closeModal() {
        // Sembunyikan modal
        document.getElementById('confirmationModal').classList.add('hidden');
    }
</script>