@extends('dashboard.asisten.base-asisten')

@section('title', 'SAINS - Edit Nilai Per-pekan')

@section('content')
<div class="container mx-auto px-4 min-h-screen">
    @if (session('success'))
        <div class="bg-green-500 text-white p-4 rounded-md mb-4 mt-10" data-aos="fade">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="my-10 font-bold text-center md:text-2xl">Edit Nilai Per-Pekan</h1>

    {{-- Pastikan route dan parameter course_id dikirim --}}
    <form action="{{ route('nilaiperpekan.updateAll', ['course_id' => $courseId]) }}" method="POST">
        @csrf

        {{-- Kirim meeting_id dari query string --}}
        <input type="hidden" name="meeting_id" value="{{ request()->get('meeting_id') }}">

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left p-3 rtl:text-right text-primary bg-gray-50">
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
                            <td class="px-6 py-4 text-center">{{ $student->name }}</td>
                            <td class="px-6 py-4 text-center">{{ $student->nim }}</td>
                            <td class="px-6 py-4 text-center">
                                <input type="hidden" name="user_id[]" value="{{ $student->user_id }}">
                                <input
                                    type="number"
                                    name="score[]"
                                    min="10"
                                    max="100"
                                    class="text-sm rounded-md border-gray-300 px-2 py-1 w-24 text-center"
                                    value="{{ $weeklyScoreData[$student->user_id]->score ?? '' }}"
                                    required
                                >
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex justify-end mt-5">
            <button type="submit" class="bg-blue-500 px-4 py-2 rounded-md text-white hover:bg-blue-600 transition-all duration-200">
                Perbarui
            </button>
        </div>
    </form>
</div>
@endsection
