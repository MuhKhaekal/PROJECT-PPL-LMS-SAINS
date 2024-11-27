@extends('dashboard.admin.base-admin')

@section('title', 'SAINS - Detail Akun')

@section('content')
<h1 class="text-3xl font-bold">Detail Akun</h1>

<h1 class="text-xl mt-5">Data Akun :</h1>
<table class="w-full text-sm text-left rtl:text-right  text-gray-900 border" >
    <tr>
        <th scope="col" class="px-6 py-3 bg-gray-200">Nama</th>
        <td class="px-6 py-4 bg-gray-200" >: {{ $user->name }}</td>
    </tr>
    <tr>
        <th scope="col" class="px-6 py-3 bg-gray-100">Email</th>
        <td class="px-6 py-4 bg-gray-100" >: {{ $user->email }}</td>
    </tr>
    <tr>
        <th scope="col" class="px-6 py-3 bg-gray-200">NIM</th>
        <td class="px-6 py-4 bg-gray-200" >: {{ $user->nim }}</td>
    </tr>
    <tr>
        <th scope="col" class="px-6 py-3 bg-gray-100">Role</th>
        <td class="px-6 py-4 bg-gray-100" >: {{ $user->role }}</td>
    </tr>
</table>

<h1 class="text-xl mt-5">Group SAINS :</h1>
<table class="w-full text-sm text-left rtl:text-right text-gray-900 border">
    @if ($facultyName && $courseName)
        <tr>
            <th scope="col" class="px-6 py-3 bg-gray-200">Fakultas</th>
            <td class="px-6 py-4 bg-gray-200">: {{ $facultyName->faculty_name }}</td>
        </tr>
        <tr>
            <th scope="col" class="px-6 py-3 bg-gray-200">Group</th>
            <td class="px-6 py-4 bg-gray-200">: {{ $courseName->course_name }}</td>
        </tr>
    @else
        <tr>
            <td colspan="2" class="px-6 py-4 bg-gray-200 text-center">Data Group SAINS tidak tersedia.</td>
        </tr>
    @endif
</table>

@if ($user->role == 'asisten')
    <h1 class="hidden text-xl mt-5">Daftar Presensi :</h1>
    <table class="hidden w-full text-sm text-left rtl:text-right text-gray-900 border">
        @if ($presences->isNotEmpty())
            @foreach ($presences as $presence)
                <tr>
                    <th scope="col" class="px-6 py-3 bg-gray-200">{{ $presence->meeting_name }}</th>
                    <td class="px-6 py-4 bg-gray-200">: {{ $presence->status }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="2" class="px-6 py-4 bg-gray-200 text-center">Data presensi tidak tersedia.</td>
            </tr>
        @endif
    </table>


    <h1 class=" hidden text-xl mt-5">Daftar Tugas</h1>
    <table class="hidden w-full text-sm text-left rtl:text-right  text-gray-900 border" >
        @foreach ($submissions as $submission)
        <tr>
            <th scope="col" class="px-6 py-3 bg-gray-200">{{ $submission->assignment_name }}</th>
            <td class="px-6 py-4 bg-gray-200">
                <a href="{{ asset($submission->assignment_check_file_name) }}" target="_blank" class="underline text-blue-500">Link Tugas</a>
            </td>
            <td class="px-6 py-4 bg-gray-200">Nilai: {{ $submission->score }}</td>
        </tr>        
        @endforeach
    </table>
@else
    <h1 class="text-xl mt-5">Daftar Presensi :</h1>
    <table class="w-full text-sm text-left rtl:text-right text-gray-900 border">
        @if ($presences->isNotEmpty())
            @foreach ($presences as $presence)
                <tr>
                    <th scope="col" class="px-6 py-3 bg-gray-200">{{ $presence->meeting_name }}</th>
                    <td class="px-6 py-4 bg-gray-200">: {{ $presence->status }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="2" class="px-6 py-4 bg-gray-200 text-center">Data presensi tidak tersedia.</td>
            </tr>
        @endif
    </table>


    <h1 class="text-xl mt-5">Daftar Tugas</h1>
    <table class="w-full text-sm text-left rtl:text-right  text-gray-900 border" >
        @foreach ($submissions as $submission)
        <tr>
            <th scope="col" class="px-6 py-3 bg-gray-200">{{ $submission->assignment_name }}</th>
            <td class="px-6 py-4 bg-gray-200">
                <a href="{{ asset($submission->assignment_check_file_name) }}" target="_blank" class="underline text-blue-500">Link Tugas</a>
            </td>
            <td class="px-6 py-4 bg-gray-200">Nilai: {{ $submission->score }}</td>
        </tr>        
        @endforeach
    </table>
@endif

@endsection