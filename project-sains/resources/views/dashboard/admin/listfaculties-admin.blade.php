@extends('dashboard.admin.base-admin')

@section('title', 'SAINS - List User')

@section('content')
<h1 class="text-3xl font-bold bg-gray-500 w-fit px-5 py-2  rounded-md shadow-md text-white">DAFTAR GRUP SAINS</h1>

<form method="GET" action="{{ route('adminfaculty.index') }}" class="mb-4 mt-5 flex">
    <input type="text" name="search" placeholder="Cari pengguna..." class="border rounded p-2 w-full" value="{{ request()->get('search') }}">
    <button type="submit" class="bg-blue-500 text-white rounded p-2 mx-2">Cari</button>
</form>

<h1 class="font-bold mt-10">Daftar Fakultas :</h1>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nama
                </th>
                <th scope="col" class="px-6 py-3">
                    Jumlah Grup
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($faculties as $faculty)
                <tr>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                        <a href="{{ route('adminfaculty.show', ['adminfaculty'=>$faculty->id]) }}" class="hover:underline">{{ $faculty->faculty_name }}</a>
                    </th>
                    <td class="px-6 py-4">
                        {{ $faculty->courses_count }} <!-- Menggunakan courses_count -->
                    </td>
                    <td class="px-6 py-4 flex">
                        <a href="{{ route('adminfaculty.edit', ['adminfaculty'=>$faculty->id]) }}" class="font-medium text-blue-600 hover:underline mx-2">Edit</a>
                        <form action="{{ route('adminfaculty.destroy', ['adminfaculty'=>$faculty->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="submit" class="font-medium text-red-600 hover:underline mx-2">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Menambahkan link pagination -->
<div class="mt-4">
    {{ $faculties->links() }}
</div>

<a href="{{ route('adminfaculty.create') }}" class="bg-blue-500 text-white px-3 py-2 rounded-md mt-5">
    + Tambah Fakultas
</a>

@endsection