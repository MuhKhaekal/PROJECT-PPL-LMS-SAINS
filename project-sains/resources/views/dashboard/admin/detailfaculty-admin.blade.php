@extends('dashboard.admin.base-admin')

@section('title', 'SAINS - Detail Fakultas')

@section('content')
<h1 class="text-3xl font-bold">{{ $faculty->faculty_name }}</h1>


<h1 class="font-bold mt-10">Daftar Grup :</h1>

<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                Nama Grup
            </th>
            <th scope="col" class="px-6 py-3">
                Jumlah Mahasiswa
            </th>
            <th scope="col" class="px-6 py-3">
                Action
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($courses as $course)
            <tr>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                    <a href="{{ route('adminfaculty.show', ['adminfaculty'=>$faculty->id]) }}" class="hover:underline">{{ $course->course_name }}</a>
                </th>
                <td class="px-6 py-4">
                    {{ $courseGroupsCount[$course->id] }}
                </td>
                <td class="px-6 py-4 flex">
                    <a href="{{ route('admincourse.edit', ['admincourse'=>$course->id]) }}" class="font-medium text-blue-600 hover:underline mx-2">Edit</a>
                    <form action="{{ route('admincourse.destroy', ['admincourse'=>$course->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button onclick="submit" class="font-medium text-red-600 hover:underline mx-2">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="mt-4">
    {{ $courses->links() }}
</div>

<a href="{{ route('admincourse.create', ['admincourse' => $faculty->id]) }}" class="bg-blue-500 text-white px-3 py-2 rounded-md mt-5">
    + Tambah Group
</a>
@endsection