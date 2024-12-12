@extends('dashboard.asisten.base-asisten')

@section('title', 'SAINS - FAQ')

@section('content')
<div class="container mx-auto px-4">
    <div class="relative min-h-96 bg-contain bg-center flex items-center justify-center" style="background-image: url({{ asset('images/bg_study-group.png')}}); background-repeat: no-repeat" data-aos="fade-right">
        <p class="font-poppins text-white text-sm font-semibold md:text-5xl md:my-48">FAQ Page</p>
    </div>

    @if (session('success'))
    <div id="success-message" class="relative bg-green-500 text-white p-4 rounded-md mb-4" data-aos="fade">
        {{ session('success') }}
    </div>
    @endif

    <div class="md:flex">
        <div class="md:flex-1 p-4 ">
            <div data-aos="fade-right" class="mb-10 p-5 h-96 rounded-md overflow-auto border border-dashed border-blue-300">
                @foreach ($faqs as $faq)
                <form action="{{ in_array($faq->id, $checkFaq) ? route('showfaqasisten.destroy', $faq->id) : route('showfaqasisten.store') }}" method="POST">
                    @csrf
                    @if (in_array($faq->id, $checkFaq))
                        
                    @endif
                    <div class="border p-4 rounded-md m-2">
                        <p class="font-bold">{{ $faq->question }}</p>
                        <p class="italic">{{ $faq->answer }}</p>
                        @if (in_array($faq->id, $checkFaq))

                        @else
                            <input type="hidden" value="{{ $faq->id }}" name="faqId">
                            <button type="submit" class="bg-btn-primary hover:bg-yellow-500 focus:line text-primary px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-lg my-5">Tambahkan</button>
                        @endif
                        @if (empty($faq->answer))
                        <a href="{{ route('faqasisten.edit', ['faqasisten' => $faq->id]) }}" class=" mx-3 hover:underline text-blue-500 mb-3">Jawab pertanyaan</a>   
                        @else
                        <a href="{{ route('faqasisten.edit', ['faqasisten' => $faq->id]) }}" class="mx-3 hover:underline text-blue-500 mb-3">Edit Jawaban</a>
                        @endif

                        
                    </div>
                </form>
                @endforeach
            </div>
        </div>
        <div class="md:flex-1 p-4 " data-aos="fade-left">
            <h1 class="font-bold text-2xl">Daftar FAQ yang ditampilkan :</h1>
            @if ($faqCount < 1)
                <p class="mt-5 text-gray-500 text-center italic">Belum ada FAQ yang ditampilkan</p>
            @endif
            <div class="mb-10">
                @foreach ($faqShows as $faqShow)
                <div class="border-b border-gray-300 ">
                    <button class="w-full flex justify-between items-center text-left py-4" onclick="toggleAccordion('accordion{{ $faqShow->id }}', 'icon{{ $faqShow->id }}')">
                        <span class="font-semibold">{{ $faqShow->question }}</span>
                        <span id="icon{{ $faqShow->id }}" class="text-2xl font-bold">+</span>
                    </button>
                    <div id="accordion{{ $faqShow->id }}" class="accordion-content hidden" style="max-height: 0;">
                        <p class="p-4 text-gray-700">
                            {{ $faqShow->answer }}
                        </p>
                        <form action="{{ route('showfaqasisten.destroy', $faqShow->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 focus:line px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-lg my-5 text-white">Hapus dari daftar</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>


   
</div>
@endsection