@extends('dashboard.admin.base-admin')

@section('title', 'SAINS - FAQ')

@section('content')

    
<div class="container mx-auto my-auto md:py-8 lg:py-36 px-4 font-poppins ">
    <div class="md:flex md:items-center">
        <div class="md:flex-1" data-aos="fade-right">
            <p class="font-bold text-3xl">{{ $faq->question }}</p>
        </div>
        <div class="md:flex-1 mx-20" data-aos="fade-left">
            <form action="{{ route('adminfaq.update', ['adminfaq' => $faq->id]) }}" method="POST">
                @csrf                
                @method('PUT')
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 ">Jawab Pertanyaan :</label>
                @if (empty($faq->answer))
                <textarea id="message" rows="4" name="answer" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Tulis jawaban disini ..." required></textarea>
                @else
                <textarea id="message" rows="4" name="answer" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Tulis jawaban disini ..." required>{{ $faq->answer }}</textarea>
                @endif

                <button type="submit" class="bg-blue-500 text-white px-3 py-2 rounded-md mt-5 hover:bg-blue-600">Kirim</button>
            </form>
        </div>      
    </div>


</div>




@endsection