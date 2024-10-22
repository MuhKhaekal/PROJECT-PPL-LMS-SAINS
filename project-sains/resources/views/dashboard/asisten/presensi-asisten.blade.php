@extends('dashboard.asisten.base-asisten')

@section('title', 'SAINS - Dashboard')

@section('content')

<div class="container mx-auto px-4 flex flex-col justify-center font-poppins">
    <div class="text-center m-5 font-semibold">
        <p>Presensi Kehadiran</p>
    </div>
    <div class="">
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
                @foreach ($allStudents as $student)
              <tr class="border-collapse border">
                <td class="p-5">{{ $student->name }}</td>
                <td class="text-center"><input type="radio" name="presensi" value="1"></td>
                <td class="text-center"><input type="radio" name="presensi" value="1"></td>
                <td class="text-center"><input type="radio" name="presensi" value="1"></td>
                <td class="text-center"><input type="radio" name="presensi" value="1"></td>
                <td class="text-center"><input type="text" ></td>
              </tr>
              @endforeach
                
            </tbody>
          </table>
          <div class="text-end mt-5">
            <button type="button" class="ms-3 bg-primary text-white font-bold py-2 px-4 rounded" 
            onclick="">
            {{ __('Simpan') }}
            </button>
          </div>


    </div>
</div>

@endsection

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
</script>