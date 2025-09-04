@extends('dashboard.asisten.base-asisten')

@section('title', 'SAINS - Pre-Test')

@section('content')

<div class="container mx-auto px-4 min-h-screen">
    <h1 class="my-10 font-bold text-center md:text-2xl">Akumulasi Nilai</h1>

    
    <form action="{{ route('pretest.store') }}" method="POST">    
        @csrf
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left p-3 rtl:text-right text-primary bg-gray-50">
                <!-- Heading Utama -->
                <thead class="text-xs text-white uppercase bg-primary">
                    <tr>
                        <th rowspan="2" scope="col" class="px-6 py-3 text-center">NIM</th>
                        <th rowspan="2" scope="col" class="px-6 py-3 text-center">Nama</th>
                        <th colspan="3" scope="col" class="px-6 py-3 text-center bg-green-900">Pre-Test</th>
                        <th colspan="4" scope="col" class="px-6 py-3 text-center border-x border-primary">3 Pekanan 1</th>
                        <th colspan="4" scope="col" class="px-6 py-3 text-center bg-yellow-800 border-b border-x border-primary">3 Pekanan 2</th>
                        <th colspan="3" scope="col" class="px-6 py-3 text-center bg-slate-700 border-x border-primary">Post-Test</th>
                    </tr>
                    <!-- Subheading -->
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center bg-green-600 border-t border-primary">K</th>
                        <th scope="col" class="px-6 py-3 text-center bg-green-600 border-t border-x border-primary">Hukum Bacaan</th>
                        <th scope="col" class="px-6 py-3 text-center bg-green-600 border-t border-primary">Makharijul Huruf</th>
                        <th scope="col" class="px-6 py-3 text-center bg-blue-500 border-x border-primary">I</th>
                        <th scope="col" class="px-6 py-3 text-center bg-blue-500 border-x border-primary">II</th>
                        <th scope="col" class="px-6 py-3 text-center bg-blue-500 border-x border-primary">III</th>
                        <th scope="col" class="px-6 py-3 text-center bg-yellow-400 border-x border-primary">IV</th>
                        <th scope="col" class="px-6 py-3 text-center bg-yellow-400 border-x border-primary">V</th>
                        <th scope="col" class="px-6 py-3 text-center bg-yellow-400 border-x border-primary">VI</th>
                        <th scope="col" class="px-6 py-3 text-center bg-slate-400 border-x border-primary">K</th>
                        <th scope="col" class="px-6 py-3 text-center bg-slate-400 border-x border-primary">Hukum Bacaan</th>
                        <th scope="col" class="px-6 py-3 text-center bg-slate-400 border-x border-primary">Makharijul Huruf</th>
                    </tr>

                </thead>
                <!-- Data -->
                <tbody>
                    @foreach ($students as $student)
                    <tr class="border-b">
                        <td class="px-6 py-4 border border-slate-200">{{ $student->nim }}</td>
                        <td class="px-6 py-4 border border-slate-200">{{ $student->name }}</td>
                        <td class="px-6 py-4 text-center border border-slate-200">{{ $student->prekelancaran }}</td>
                        <td class="px-6 py-4 text-center border border-slate-200">{{ $student->prehukum_bacaan }}</td>
                        <td class="px-6 py-4 text-center border border-slate-200">{{ $student->premakharijul_huruf }}</td>
                        <td class="px-6 py-4 text-center border border-slate-200">{{ $student->p1 }}</td>
                        <td class="px-6 py-4 text-center border border-slate-200">{{ $student->p2 }}</td>
                        <td class="px-6 py-4 text-center border border-slate-200">{{ $student->p3 }}</td>
                        <td class="px-6 py-4 text-center border border-slate-200">{{ $student->p4 }}</td>
                        <td class="px-6 py-4 text-center border border-slate-200">{{ $student->p5 }}</td>
                        <td class="px-6 py-4 text-center border border-slate-200">{{ $student->p6 }}</td>
                        <td class="px-6 py-4 text-center border border-slate-200">{{ $student->postkelancaran }}</td>
                        <td class="px-6 py-4 text-center border border-slate-200">{{ $student->posthukum_bacaan }}</td>
                        <td class="px-6 py-4 text-center border border-slate-200">{{ $student->postmakharijul_huruf }}</td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        


        <div class="flex justify-end mt-5">
            <a href="{{ route('nilaiperpekan.exportToExcel') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Download Excel</a>

            <button type="submit" class="bg-blue-500 px-4 py-2 rounded-md text-white">Simpan</button>
        </div>
    </form>

</div>
@endsection