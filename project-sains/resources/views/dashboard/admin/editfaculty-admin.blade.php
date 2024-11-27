@extends('dashboard.admin.base-admin')

@section('title', 'SAINS - Edit Fakultas')

@section('content')
<h1 class="text-3xl font-bold">TAMBAH AKUN</h1>
<form action="{{ route('adminfaculty.update', ['adminfaculty' => $faculty->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class=" grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="col-span-full mt-10">
            <label for="pertemuan" class="block text-sm/6 font-medium text-gray-900">Nama Fakultas</label>
            <div class="mt-2">
            <input type="text" name="faculty_name" id="faculty_name" autocomplete="nama-fakultas" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6" required placeholder="Fakultas Hukum" value="{{ $faculty->faculty_name }}">
            </div>
            <p class="italic text-gray-400 text-xs mt-3">Diawali dengan kata "fakultas". Mis. Fakultas Hukum</p>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-3 py-2 rounded-md">+ Buat</button>
    </div>

</form>
@endsection