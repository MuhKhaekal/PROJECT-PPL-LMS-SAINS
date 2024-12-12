@extends('dashboard.asisten.base-asisten')

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
        <div class="flex-1">
            <form class="max-w-lg mx-auto" method="POST" action="{{ route('announcementasisten.store') }}" enctype="multipart/form-data">
                @csrf
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 mt-10">Pengumuman: </label>
                <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Isi pengumuman disini ... " name="text"></textarea>

                <label class="block mb-2 mt-10 text-sm font-medium text-gray-900 " for="user_avatar">Unggah file</label>
                <input class="block w-full text-sm text-gray-900 p-2 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none " aria-describedby="user_avatar_help" id="user_avatar" type="file" name="file_name" accept=".pdf">
                <div class="mt-1 text-sm text-gray-500 " id="user_avatar_help">A profile picture is useful to confirm your are logged into your account</div>

                <input type="hidden" name="user_id" value="{{ $userId }}">

                <button type="submit" class="bg-btn-primary font-semibold hover:bg-yellow-500 focus:line text-primary px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-lg my-5">Unggah</button>
            </form>
  
        </div>
        
        <div class="flex-1" data-aos="fade-right">
            @foreach ($announcements as $announcement)
            <div class="flex mt-10" data-aos='fade'>
            <img class="w-8 h-8 rounded-full mt-10" src="{{ asset('images/profile.png') }}" alt="Bonnie Green image">
            <div class="flex flex-col gap-1">
               <div class="flex flex-col w-full max-w-[700px] leading-1.5 p-4 border-gray-500 bg-primary rounded-e-xl rounded-es-xl shadow-2xl drop-shadow-xl">
                  <div class="flex items-center space-x-2 rtl:space-x-reverse">
                     <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ $announcement->name }}</span>

                  </div>
                  <div class="flex items-start my-2.5 bg-gray-600 rounded-xl p-2">
                     <div class="me-2">
                        <div class="my-2">
                            <p class="text-white font-light">{{ $announcement->text }}</p>
                        </div>
                        @if ( $announcement->file_name )
                        <span class="flex items-center gap-2 text-sm font-medium text-white pb-2">
                            <svg fill="none" aria-hidden="true" class="w-5 h-5 flex-shrink-0" viewBox="0 0 20 21">
                               <g clip-path="url(#clip0_3173_1381)">
                                  <path fill="#E2E5E7" d="M5.024.5c-.688 0-1.25.563-1.25 1.25v17.5c0 .688.562 1.25 1.25 1.25h12.5c.687 0 1.25-.563 1.25-1.25V5.5l-5-5h-8.75z"/>
                                  <path fill="#B0B7BD" d="M15.024 5.5h3.75l-5-5v3.75c0 .688.562 1.25 1.25 1.25z"/>
                                  <path fill="#CAD1D8" d="M18.774 9.25l-3.75-3.75h3.75v3.75z"/>
                                  <path fill="#F15642" d="M16.274 16.75a.627.627 0 01-.625.625H1.899a.627.627 0 01-.625-.625V10.5c0-.344.281-.625.625-.625h13.75c.344 0 .625.281.625.625v6.25z"/>
                                  <path fill="#fff" d="M3.998 12.342c0-.165.13-.345.34-.345h1.154c.65 0 1.235.435 1.235 1.269 0 .79-.585 1.23-1.235 1.23h-.834v.66c0 .22-.14.344-.32.344a.337.337 0 01-.34-.344v-2.814zm.66.284v1.245h.834c.335 0 .6-.295.6-.605 0-.35-.265-.64-.6-.64h-.834zM7.706 15.5c-.165 0-.345-.09-.345-.31v-2.838c0-.18.18-.31.345-.31H8.85c2.284 0 2.234 3.458.045 3.458h-1.19zm.315-2.848v2.239h.83c1.349 0 1.409-2.24 0-2.24h-.83zM11.894 13.486h1.274c.18 0 .36.18.36.355 0 .165-.18.3-.36.3h-1.274v1.049c0 .175-.124.31-.3.31-.22 0-.354-.135-.354-.31v-2.839c0-.18.135-.31.355-.31h1.754c.22 0 .35.13.35.31 0 .16-.13.34-.35.34h-1.455v.795z"/>
                                  <path fill="#CAD1D8" d="M15.649 17.375H3.774V18h11.875a.627.627 0 00.625-.625v-.625a.627.627 0 01-.625.625z"/>
                               </g>
                               <defs>
                                  <clipPath id="clip0_3173_1381">
                                     <path fill="#fff" d="M0 0h20v20H0z" transform="translate(0 .5)"/>
                                  </clipPath>
                               </defs>
                            </svg>
                            <p>File Lampiran</p>
                            
                         </span>
                        @endif
                        <span class="flex text-xs font-normal text-gray-500 gap-2">
                           
                           <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="self-center" width="3" height="4" viewBox="0 0 3 4" fill="none">
                              <circle cx="1.5" cy="2" r="1.5" fill="#6B7280"/>
                           </svg>
                           PDF
                           <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="self-center" width="3" height="4" viewBox="0 0 3 4" fill="none">
                              <circle cx="1.5" cy="2" r="1.5" fill="#6B7280"/>
                           </svg>
                           {{ $announcement->date_post }} 
                           <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="self-center" width="3" height="4" viewBox="0 0 3 4" fill="none">
                              <circle cx="1.5" cy="2" r="1.5" fill="#6B7280"/>
                           </svg>
                           {{ $announcement->time_post }}
                        </span>
                     </div>
                     @if ($announcement->file_name)    
                     <div class="inline-flex self-center items-center">
                         <a class="inline-flex self-center items-center p-2 text-sm font-medium text-center text-gray-900  rounded-lg  focus:ring-4 focus:outline-none dark:text-white  bg-gray-600 focus:ring-gray-600" type="button" href="{{ asset($announcement->file_name) }}">
                             <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z"/>
                                <path d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
                            </svg>
                        </a>
                     </div>
                     @endif
                    </div>
                    <div class="flex space-x-5">
                        <a href="{{ route('announcementasisten.edit', ['announcementasisten' => $announcement->id]) }}" class="text-blue-500 hover:text-blue-700 hover:underline">Edit</a>
                        <form action="{{ route('announcementasisten.destroy', ['announcementasisten' => $announcement->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 hover:underline">Hapus</button>
                        </form>
                    </div>
               </div>
            </div>
        </div>
            @endforeach
        </div>
    </div>
</div>


@endsection