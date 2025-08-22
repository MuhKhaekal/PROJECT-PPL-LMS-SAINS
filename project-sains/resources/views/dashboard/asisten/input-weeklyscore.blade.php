{{-- DEBUG --}}
<p class="text-red-500 text-sm">
    course_id: {{ $course_id }} <br>
    meeting_id: {{ $meeting_id }} <br>
    Total Mahasiswa: {{ count($students) }}
</p>


@extends('dashboard.asisten.base-asisten')

@section('title', 'Input Nilai Per-Pekan')

@section('content')
<div class="container mx-auto px-4 min-h-screen">
    <h1 class="my-10 font-bold text-center md:text-2xl">
        Input Nilai Pekan Ke-{{ $meeting_id }}
    </h1>

    <form action="{{ route('nilaiperpekan.store') }}" method="POST">
        @csrf
        <input type="hidden" name="course_id" value="{{ $course_id }}">
        <input type="hidden" name="meeting_id" value="{{ $meeting_id }}">

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-primary bg-gray-50">
                <thead class="text-xs text-white uppercase bg-primary">
                    <tr>
                        <th class="px-6 py-3 text-center">Nama</th>
                        <th class="px-6 py-3 text-center">NIM</th>
                        <th class="px-6 py-3 text-center">Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr class="border-b">
                            <td class="px-6 py-4">{{ $student->name }}</td>
                            <td class="px-6 py-4">{{ $student->nim }}</td>
                            <td class="px-6 py-4 text-center">
                                <input type="hidden" name="student_id[]" value="{{ $student->user_id }}">
                                <input type="number" name="score[]" min="10" max="100" class="border-gray-300 px-2 py-1 rounded-md w-24 text-center" required>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex justify-end mt-5">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
