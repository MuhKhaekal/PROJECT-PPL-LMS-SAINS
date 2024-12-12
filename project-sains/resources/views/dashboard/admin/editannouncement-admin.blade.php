@extends('dashboard.admin.base-admin')

@section('title', 'SAINS - Announcement')

@section('content')
<div class="container mx-auto px-4 min-h-screen">
    @if (session('success'))
    <div class="bg-green-500 text-white p-4 rounded-md mb-4 mt-10">
        {{ session('success') }}
    </div>
    @endif
    
    @if ($errors->any())
        <div class="bg-red-500 text-white p-4 rounded-md mb-4 mt-10" data-aos="fade">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="md:flex" data-aos="fade-left"> 
            <form class="max-w-lg mx-auto" method="POST" action="{{ route('adminannouncement.update', ['adminannouncement' => $announcement->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 mt-10">Pengumuman: </label>
                <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Isi pengumuman disini ... " name="text">{{ $announcement->text }}</textarea>

                <label class="block mb-2 mt-10 text-sm font-medium text-gray-900 " for="user_avatar">Unggah file</label>
                <input class="block w-full text-sm text-gray-900 p-2 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none " aria-describedby="user_avatar_help" id="user_avatar" type="file" name="file_name" accept=".pdf">
                <div class="mt-1 text-sm text-gray-500 " id="user_avatar_help">A profile picture is useful to confirm your are logged into your account</div>


                <button type="submit" class="bg-btn-primary font-semibold hover:bg-yellow-500 focus:line text-primary px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-lg my-5">Unggah</button>
            </form>
  
        
    </div>
</div>


@endsection