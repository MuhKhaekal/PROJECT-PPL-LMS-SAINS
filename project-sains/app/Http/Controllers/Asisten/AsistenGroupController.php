<?php

namespace App\Http\Controllers\Asisten;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\CertificateVerification;
use Illuminate\Http\Request;
use App\Models\Faculty;
use App\Models\PraktikanGroup;
use App\Models\Meeting;
use App\Models\Posttest;
use App\Models\Pretest;
use App\Models\WeeklyScore;
use Illuminate\Support\Facades\Auth;

class AsistenGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facultyList = Faculty::with('courses')->get();
        $userId = Auth::id();
        $checkGroup = PraktikanGroup::all();
        $checkPreTest = Pretest::all();
        $checkPostTest = Posttest::all();
        $checkWeeklyScore = WeeklyScore::all();
        $courseName = PraktikanGroup::where('user_id', $userId)
        ->join('course', 'praktikangroup.course_id', '=', 'course.id')
        ->select('course.id', 'course.course_name')
        ->first();
        if ($courseName) {
            $meetings = Meeting::where('course.id', $courseName->id)
                ->join('course', 'meeting.course_id', '=', 'course.id')
                ->join('praktikangroup', 'course.id', '=', 'praktikangroup.course_id')
                ->select('meeting.id','meeting.meeting_name', 'meeting.meeting_topic', 'meeting.description', 'meeting.course_id')
                ->distinct()
                ->get();
                $personCertificate = CertificateVerification::whereNot('type', 'Sertifikat Asisten Umum')->where('user_id', $userId)->first();    
                $certificate = CertificateVerification::where('user_id', $userId)->first(); 
        } else {
            // Jika tidak ada courseName, set meetings sebagai koleksi kosong
            $meetings = collect();
            $certificate = collect();
            $personCertificate = collect();
        }
        return view('dashboard.asisten.asisten-group', compact('facultyList', 'userId', 'checkGroup', 'checkPreTest', 'checkPostTest', 'checkWeeklyScore', 'courseName', 'meetings', 'certificate', 'personCertificate'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:course,id'
        ]);

        $userId = Auth::id();
        $courseId = $request->input('course_id');

        $existingEnrollment = PraktikanGroup::where('user_id', $userId)
        ->where('course_id', $courseId)
        ->first();

        // Jika sudah terdaftar, kembalikan dengan pesan error
        if ($existingEnrollment) {
            return view('dashboard.asisten.home-asisten');
        }

        // Jika belum, daftarkan ke dalam tabel practitioner_group
        PraktikanGroup::create([
            'user_id' => $userId,
            'course_id' => $courseId,
        ]);

    // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Berhasil mendaftar ke program studi!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

    }
    
}
