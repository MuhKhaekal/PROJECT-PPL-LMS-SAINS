@extends('dashboard.asisten.base-asisten')

@section('title', 'SAINS - FAQ')

@section('content')

<div class="container mx-auto px-4 mt-10">
    <h2 class="mb-2 text-lg font-semibold text-gray-900">Daftar Pertanyaan:</h2>
    <ul class="space-y-2 ms-5 text-gray-800 list-disc list-inside">
        @foreach ($faqs as $faq)
        <li class="">
            {{ $faq->question }}
        </li>
        <div class="border-b mb-2 flex">
            @if (empty($faq->answer))
                <a href="{{ route('faqasisten.edit', ['faqasisten' => $faq->id]) }}" class=" mx-3 hover:underline text-blue-500 mb-3">Jawab pertanyaan</a>   
            @else
                <a href="{{ route('faqasisten.edit', ['faqasisten' => $faq->id]) }}" class="mx-3 hover:underline text-blue-500 mb-3">Edit Jawaban</a>
            @endif
            
            <form action="{{ route('faqasisten.destroy', ['faqasisten' => $faq->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button  class=" mx-3 hover:underline text-red-500 mb-3">Hapus Pertanyaan</button>
            </form>
            </div>

        @endforeach
        
    </ul>

</div>


@endsection