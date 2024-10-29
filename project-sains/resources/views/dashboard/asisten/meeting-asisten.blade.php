@extends('dashboard.asisten.base-asisten')

@section('title', 'SAINS - Pertemuan')

@section('content')
<div class="container mx-auto px-4">
    <form action="{{ route('pertemuan.store') }}" method="POST">
        @csrf
        <input type="hidden" name="course_id" value="{{ $courseName->id }}">
        <div class="space-y-12 mt-10">
          <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base/7 font-semibold text-gray-900">Unggah Topik Pertemuan</h2>
            <p class="mt-1 text-sm/6 text-gray-600">Silahkan upload Topik Pertemuan sesuai dengan minggu pertemuan sekarang ini.</p>
            

            <div class="col-span-full mt-10">
                <label for="pertemuan" class="block text-sm/6 font-medium text-gray-900">Pertemuan ke-</label>
                <div class="mt-2">
                  <input type="text" name="meeting_name" id="meeting_name" autocomplete="topik-pertemuan" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6" placeholder="mis. Pertemuan 1" required>

                </div>
            </div>


            <div class="col-span-full mt-10">
                <label for="topik-pertemuan" class="block text-sm/6 font-medium text-gray-900">Topik Pertemuan</label>
                <div class="mt-2">
                  <input type="text" name="meeting_topic" id="meeting_topic" autocomplete="topik-pertemuan" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6" required>

                </div>
            </div>

            <div class="col-span-full mt-10">
                <label for="about" class="block text-sm/6 font-medium text-gray-900">Deskripsi</label>
                <div class="mt-2">
                  <textarea id="description" name="description" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6" required></textarea>
                </div>
                <p class="mt-3 text-sm/6 text-gray-600">Tulis deskripsi pembahasan yang akan dilakukan pada pertemuan kali ini.</p>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm/6 font-semibold text-gray-900" onclick="closeModal()">Cancel</button>
                <button type="button" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" onclick="openModal()">Save</button>
            </div>
        </div>
        
        <!-- Modal Konfirmasi -->
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

@endsection

<script>
    function openModal() {
        document.getElementById('confirmationModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('confirmationModal').classList.add('hidden');
    }
</script>
