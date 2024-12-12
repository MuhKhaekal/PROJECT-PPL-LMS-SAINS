@extends('dashboard.asisten.base-asisten')

@section('title', 'SAINS - Pre-Test')

@section('content')

<div class="container mx-auto px-4 min-h-screen">
    <h1 class="my-10 font-bold text-center md:text-2xl">Daftar Nilai Pre-Test</h1>

    
    <form action="{{ route('pretest.store') }}" method="POST">    
        @csrf
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left p-3 rtl:text-right text-primary bg-gray-50">
                <thead class="text-xs text-white uppercase bg-primary ">
                    <tr>
                        <th scope="col" class="px-6 py-3">Nama</th>
                        <th scope="col" class="px-6 py-3">Kelancaran</th>
                        <th scope="col" class="px-6 py-3">Hukum Bacaan</th>
                        <th scope="col" class="px-6 py-3">Makharijurl Huruf</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr class="border-b">
                            <td class="px-6 py-4">{{ $student->name }}</td>
                            <input type="hidden" name="student_id[]" value="{{ $student->id }}">
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <td class="px-6 py-4">
                                <select name="kelancaran[]" class="rounded-md text-sm">
                                    <option value="" disabled selected>Nilai</option>
                                    @for ($i = 0; $i <= 10; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </td>
                            <td class="px-6 py-4">
                                <select name="hukum_bacaan[]" class="rounded-md text-sm">
                                    <option value="" disabled selected>Nilai</option>
                                    @for ($i = 0; $i <= 10; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </td>
                            <td class="px-6 py-4">
                                <select name="makharijul_huruf[]" class="rounded-md text-sm">
                                    <option value="" disabled selected>Nilai</option>
                                    @for ($i = 0; $i <= 10; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
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