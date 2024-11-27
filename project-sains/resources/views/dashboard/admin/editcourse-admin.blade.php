@extends('dashboard.admin.base-admin')

@section('title', 'SAINS - Tambah Fakultas')

@section('content')
<h1 class="text-3xl font-bold">TAMBAH AKUN</h1>
<form action="{{ route('admincourse.update', ['admincourse' => $course->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class=" grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="col-span-full mt-10">
            <label for="pertemuan" class="block text-sm/6 font-medium text-gray-900">Nama Group</label>
            <div class="mt-2">
            <input type="text" name="course_name" id="course_name" autocomplete="nama-course" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6" required placeholder="Ilmu Hukum" value="{{ $course->course_name}}">
            </div>
            <p class="italic text-gray-400 text-xs mt-3">Isi sesuai dengan nama yang telah ditentukan</p>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-3 py-2 rounded-md">+ Buat</button>
    </div>

</form>
@endsection