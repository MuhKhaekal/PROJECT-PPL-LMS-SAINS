@extends('dashboard.asisten.base-asisten')

@section('title', 'SAINS - Edit Nilai Per-pekan')

@section('content')

<div class="container mx-auto px-4 min-h-screen">
    @if ($errors->any())
    <div class="bg-red-500 text-white p-4 rounded-md mb-4 mt-10" data-aos="fade">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <h1 class="my-10 font-bold text-center md:text-2xl">Daftar Nilai Pekanan</h1>
    <form action="{{ route('nilaiperpekan.updateAll', ['courseId' => $courseId]) }}" method="POST">    
        @csrf
        @method('PUT')
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left p-3 rtl:text-right text-primary bg-gray-50">
                <thead class="text-xs text-white uppercase bg-primary">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center">Nama</th>
                        <th scope="col" class="px-6 py-3 text-center">P1</th>
                        <th scope="col" class="px-6 py-3 text-center">P2</th>
                        <th scope="col" class="px-6 py-3 text-center">P3</th>
                        <th scope="col" class="px-6 py-3 text-center">P4</th>
                        <th scope="col" class="px-6 py-3 text-center">P5</th>
                        <th scope="col" class="px-6 py-3 text-center">P6</th>
                        <th scope="col" class="px-6 py-3 text-center">P7</th>
                        <th scope="col" class="px-6 py-3 text-center">P8</th>
                        <th scope="col" class="px-6 py-3 text-center">P9</th>
                        <th scope="col" class="px-6 py-3 text-center">P10</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr class="border-b">
                            <td class="px-6 py-4">{{ $student->name }}</td>
                            <input type="hidden" name="user_id[]" value="{{ $student->user_id }}">
                            
                            <td>
                                <input type="number" name="p1[]" min="10" max="100" class="text-sm rounded-md mx-1 border-gray-200" value="{{ $weeklyScoreData->get($student->user_id)->p1 ?? 10 }}" >
                            </td>
                            <td>
                                <input type="number" name="p2[]" min="10" max="100" class="text-sm rounded-md mx-1 border-gray-200" value="{{ $weeklyScoreData->get($student->user_id)->p2 ?? 10 }}">
                            </td>
                            <td>
                                <input type="number" name="p3[]" min="10" max="100" class="text-sm rounded-md mx-1 border-gray-200" value="{{ $weeklyScoreData->get($student->user_id)->p3 ?? 10 }}">
                            </td>
                            <td>
                                <input type="number" name="p4[]" min="10" max="100" class="text-sm rounded-md mx-1 border-gray-200" value="{{ $weeklyScoreData->get($student->user_id)->p4 ?? 10 }}">
                            </td>
                            <td>
                                <input type="number" name="p5[]" min="10" max="100" class="text-sm rounded-md mx-1 border-gray-200" value="{{ $weeklyScoreData->get($student->user_id)->p5 ?? 10 }}">
                            </td>
                            <td>
                                <input type="number" name="p6[]" min="10" max="100" class="text-sm rounded-md mx-1 border-gray-200" value="{{ $weeklyScoreData->get($student->user_id)->p6 ?? 10 }}">
                            </td>
                            <td>
                                <input type="number" name="p7[]" min="10" max="100" class="text-sm rounded-md mx-1 border-gray-200" value="{{ $weeklyScoreData->get($student->user_id)->p7 ?? 10 }}">
                            </td>
                            <td>
                                <input type="number" name="p8[]" min="10" max="100" class="text-sm rounded-md mx-1 border-gray-200" value="{{ $weeklyScoreData->get($student->user_id)->p8 ?? 10 }}">
                            </td>
                            <td>
                                <input type="number" name="p9[]" min="10" max="100" class="text-sm rounded-md mx-1 border-gray-200" value="{{ $weeklyScoreData->get($student->user_id)->p9 ?? 10 }}">
                            </td>
                            <td>
                                <input type="number" name="p10[]" min="10" max="100" class="text-sm rounded-md mx-1 border-gray-200" value="{{ $weeklyScoreData->get($student->user_id)->p10 ?? 10 }}">
                            </td>
                        </tr>
                @endforeach

                </tbody>
            </table>
        </div>

        <div class="flex justify-end mt-5">
            <button type="submit" class="bg-blue-500 px-4 py-2 rounded-md text-white">Simpan</button>
        </div>
    </form>

</div>



@endsection