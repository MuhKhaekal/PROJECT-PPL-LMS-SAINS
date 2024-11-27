@extends('dashboard.user.base-user')

@section('title', 'SAINS - Detail Materi')

@section('content')

<div class="container mx-auto px-4 font-poppins">
    
    <h1 class="mt-10 text-4xl underline" data-aos="fade-right">{{ $material->material_name }}</h1>

    <p class="mt-3 text-justify" data-aos="fade">{{ $material->description }} Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque amet dignissimos aut consequuntur, laboriosam ipsam. Quos quibusdam iure laborum aperiam quo suscipit atque eligendi voluptate maiores, sapiente cum sed accusantium consectetur, consequatur cumque nisi recusandae repellendus. Consectetur, explicabo inventore? Neque pariatur, earum dolore aut maiores saepe adipisci optio officia ipsam assumenda itaque quidem et rerum unde asperiores sequi placeat illo harum tempore. Expedita minima dolorem quos, eum consequuntur adipisci minus pariatur sunt dolores placeat fuga corporis veritatis? Ipsum ab illum quia placeat alias labore nam minima, mollitia pariatur praesentium incidunt officiis beatae! Odit, animi tempora qui voluptate eveniet possimus? Enim.</p>
    <div id="pdfViewer" class="mt-4" data-aos="fade-up">
        <iframe id="pdfFrame" src="{{ $base64Pdf }}" style="width: 100%; height: 500px;" frameborder="0"></iframe>
    </div>    
</div>


<script>
    function togglePdf(pdfUrl) {
        const pdfViewer = document.getElementById('pdfViewer');
        const pdfFrame = document.getElementById('pdfFrame');
        
        pdfFrame.src = pdfUrl;
        pdfViewer.classList.remove('hidden');
    }
</script>
@endsection