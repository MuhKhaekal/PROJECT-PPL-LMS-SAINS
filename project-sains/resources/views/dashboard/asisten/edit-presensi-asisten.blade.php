@extends('dashboard.asisten.base-asisten')

@section('title', 'SAINS - Edit Presensi')

@section('content')

<div class="container mx-auto px-4 flex flex-col justify-center font-poppins">
    <div class="text-center m-5 font-semibold">
        <h2>Edit Presensi - {{ $meetingName }}</h2>
    </div>
    <form action="{{ route('presensi.update', $attendances->first()->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="meeting_id" value="{{ $meetingId }}">
        <input type="hidden" name="course_id" value="{{ $course->id }}">

        <table class="w-full table-auto border-collapse border border-slate-500">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Nama</th>
                    <th>Hadir</th>
                    <th>Sakit</th>
                    <th>Izin</th>
                    <th>Alfa</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr class="border-collapse border">
                    <td class="p-5">{{ $student->name }}</td>
                    @php
                        $status = isset($attendances[$student->id]) ? $attendances[$student->id]->status : '';
                        $keterangan = isset($attendances[$student->id]) ? $attendances[$student->id]->keterangan : '';
                    @endphp
                    <td class="text-center">
                        <input type="radio" name="status[{{ $student->id }}]" value="hadir" {{ $status == 'hadir' ? 'checked' : '' }}>
                    </td>
                    <td class="text-center">
                        <input type="radio" name="status[{{ $student->id }}]" value="sakit" {{ $status == 'sakit' ? 'checked' : '' }}>
                    </td>
                    <td class="text-center">
                        <input type="radio" name="status[{{ $student->id }}]" value="izin" {{ $status == 'izin' ? 'checked' : '' }}>
                    </td>
                    <td class="text-center">
                        <input type="radio" name="status[{{ $student->id }}]" value="alfa" {{ $status == 'alfa' ? 'checked' : '' }}>
                    </td>
                    <td class="text-center">
                        <input type="text" name="keterangan[{{ $student->id }}]" value="{{ $keterangan }}" placeholder="Keterangan">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <div class="text-end mt-5">
            <button type="submit" class="bg-primary text-white font-bold py-2 px-4 rounded">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>

@endsection