@extends('dashboard.user.base-user')

@section('title', 'Dashboard')

@section('content')

<div class="container mx-auto px-4 flex flex-col justify-center">
    <div class="relative min-h-96 bg-contain bg-center flex items-center justify-center" style="background-image: url({{ asset('images/bg_study-group.png')}}); background-repeat: no-repeat">
        tes
    </div>

    <div class="md:flex-1">
        @foreach ($facultyList as $faculty)
        <div class="border-b border-gray-300 bg-primary px-5 text-white">
            <button class="w-full flex justify-between items-center text-left py-4" onclick="toggleAccordion('{{ $faculty->id }}', 'icon1')">
                <span class="font-semibold">{{ $faculty->faculty_name }}</span>
                <span id="icon1" class="text-2xl font-bold">+</span>
            </button>
            <div id="{{ $faculty->id }}" class="accordion-content hidden" style="max-height: 0;">
                @foreach ($faculty->courses as $courses)
                    <li class="text-white">{{ $courses->course_name }}</li>
                @endforeach

            </div>
        </div>
        @endforeach
    </div>
</div>
{{-- @foreach ($facultyList as $faculty)
<h1>{{ $faculty -> faculty_name }}</h1>    
@endforeach --}}

@endsection