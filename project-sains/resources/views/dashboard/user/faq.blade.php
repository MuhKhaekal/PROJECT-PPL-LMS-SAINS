@extends('dashboard.user.base-user')

@section('title', 'SAINS - FAQ')

@section('content')

<section>
    

    <div class="container mx-auto min-h-screen px-4 font-poppins">

        <div class="relative min-h-96 bg-contain bg-center flex items-center justify-center" style="background-image: url({{ asset('images/bg_study-group.png')}}); background-repeat: no-repeat" data-aos="fade-right">
            <p class="font-poppins text-white text-sm font-semibold md:text-5xl md:my-48">FAQ Page</p>
        </div>
        @if (session('success'))
            <div id="success-message" class="relative bg-green-500 text-white p-4 rounded-md mb-4" data-aos="fade">
                {{ session('success') }}
            </div>
        @endif
        <div class="md:flex md:items-center">
            <div class="md:flex-1" data-aos="fade-right">
                @foreach ($faqShows as $faq)
                    
                <div class="border-b border-gray-300">
                    <button class="w-full flex justify-between items-center text-left py-4" onclick="toggleAccordion('accordion{{ $faq->id }}', 'icon{{ $faq->id }}')">
                        <span class="font-semibold">{{ $faq->question }}</span>
                        <span id="icon{{ $faq->id }}" class="text-2xl font-bold">+</span>
                    </button>
                    <div id="accordion{{ $faq->id }}" class="accordion-content hidden" style="max-height: 0;">
                        <p class="p-4 text-gray-700">
                            {{ $faq->answer }}
                        </p>
                    </div>
                </div>
                @endforeach
                
            </div>
            <div class="md:flex-1 mx-20" data-aos="fade-left">
                <form action="{{ route('faq.store') }}" method="POST">
                    @csrf                
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 ">Apakah kamu masih bingung?</label>
                    <textarea id="message" rows="4" name="question" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Tulis pertanyaanmu disini ..." required></textarea>
                    <button type="submit" class="bg-blue-500 text-white px-3 py-2 rounded-md mt-5 hover:bg-blue-600">Kirim</button>
                </form>
            </div>      
        </div>


    </div>


</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const successMessage = document.getElementById('success-message');
        if (successMessage) {
            setTimeout(function() {
                successMessage.style.display = 'none';
            }, 3000); // 5000 milliseconds = 5 seconds
        }
    });
</script>
@endsection