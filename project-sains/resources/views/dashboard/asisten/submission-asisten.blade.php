@extends('dashboard.asisten.base-asisten')

@section('title', 'SAINS - Daftar Kiriman Tugas')

@section('content')


<div class="min-h-screen container mx-auto px-4 mt-10">
    <h1 class="text-2xl mt-5 font-bold">Submission</h1>
    <div class="mb-5 mt-5">
        @foreach ($submissions as $submission)
                <div class="border-b md:flex md:justify-between p-3 md:items-center">
                    <p>{{ $submission->name }}</p>
                    <div class="flex md:items-center">
                        {{ $submission->assignmnet_check_file_name }}
                        <div class="flex-1 mx-5">
                            <a href="{{ route('submission.edit', ['submission' => $submission->id  ]) }}" class="underline text-blue-500" target="_blank">Lihat Tugas</a>
                        </div>
                    </div>
                </div>

          
        @endforeach

    </div>
</div>
@endsection