<?php

namespace App\Http\Controllers\Asisten;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PraktikanGroup;
use App\Models\Meeting;
use App\Models\Presence;
use Illuminate\Support\Facades\Auth;


class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $userId = Auth::id();
        $meetingId = $request->input('meeting_id');
    
        // Validasi meeting ID
        $meeting = Meeting::find($meetingId);
        $meetingName = Meeting::where('id', $meetingId)
        ->select('meeting_name')
        ->first();

        $existingPresence = Presence::where('meeting_id', $meetingId)->first();

        if($existingPresence){
            return redirect()->route('presensi.edit', ['presensi' => $existingPresence->id]);
        }
        

    
        $courseName = PraktikanGroup::where('user_id', $userId)
            ->join('course', 'praktikangroup.course_id', '=', 'course.id')
            ->select('course.id', 'course.course_name')
            ->first();
    
        $students = PraktikanGroup::where('course.id', $courseName->id )
            ->join('users', 'praktikangroup.user_id', '=', 'users.id')
            ->join('course', 'praktikangroup.course_id', '=', 'course.id')
            ->where('users.role', 'user')
            ->select('users.id', 'users.name', 'course.course_name')
            ->get();

        return view('dashboard.asisten.presensi-asisten', compact('students', 'meetingId', 'courseName', 'meetingName', 'userId'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $meetingId = $request->input('meeting_id');
        $courseId = $request->input('course_id');
    
        foreach ($request->input('status') as $userId => $status) {
            // Use Eloquent to create a new Presence record for each student
            Presence::create([
                'user_id' => $userId,
                'meeting_id' => $meetingId,
                'course_id' => $courseId,
                'status' => $status,
                'keterangan' => $request->input("keterangan.$userId"), // Optional notes for each student
            ]);
        }

       

        return redirect()->route('asisten-group.index')->with('success', 'Presensi berhasil disimpan.');
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
/**
 * Show the form for editing the specified resource.
 */
public function edit(string $id)
{
    // Find the existing presence record
    $presence = Presence::with('user')->findOrFail($id);
    $meetingId = $presence->meeting_id;
    $courseId = $presence->course_id;

    // Get the meeting details
    $meeting = Meeting::findOrFail($meetingId);
    $meetingName = $meeting->meeting_name;

    // Get the course details
    $course = PraktikanGroup::where('course_id', $courseId)
        ->join('course', 'praktikangroup.course_id', '=', 'course.id')
        ->select('course.id', 'course.course_name')
        ->first();

    // Get students in the course
    $students = PraktikanGroup::where('praktikangroup.course_id', $courseId)
        ->join('users', 'praktikangroup.user_id', '=', 'users.id')
        ->where('users.role', 'user')
        ->select('users.id', 'users.name')
        ->get();

    // Get the attendance status for each student
    $attendances = Presence::where('meeting_id', $meetingId)->get()->keyBy('user_id');

    return view('dashboard.asisten.edit-presensi-asisten', compact('students', 'meetingId', 'course', 'meetingName', 'attendances'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Ambil meeting_id dari Presence yang sedang diedit
        $presence = Presence::findOrFail($id);
        $meetingId = $presence->meeting_id;
        $courseId = $presence->course_id;
    
        // Loop untuk setiap status kehadiran
        foreach ($request->input('status') as $userId => $status) {
            // Perbarui atau buat data Presence untuk setiap siswa
            Presence::updateOrCreate(
                [
                    'user_id' => $userId,
                    'meeting_id' => $meetingId
                ],
                [
                    'course_id' => $courseId,
                    'status' => $status,
                    'keterangan' => $request->input("keterangan.$userId"), // Catatan opsional untuk setiap siswa
                ]
            );
        }
    
        return redirect()->route('asisten-group.index')->with('success', 'Presensi berhasil diperbarui.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {           
        //
    }

    
}
