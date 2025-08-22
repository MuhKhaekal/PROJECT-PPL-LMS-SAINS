<?php

namespace App\Http\Controllers\Asisten;

use App\Http\Controllers\Controller;
use App\Models\PraktikanGroup;
use App\Models\WeeklyScore;
use App\Models\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class WeeklyScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $course = PraktikanGroup::where('user_id', $userId)
        ->join('course', 'praktikangroup.course_id', '=', 'course.id')
        ->select('course.id', 'course.course_name')
        ->first();

        $students = PraktikanGroup::where('course.id', $course->id )
        ->join('users', 'praktikangroup.user_id', '=', 'users.id')
        ->join('course', 'praktikangroup.course_id', '=', 'course.id')
        ->where('users.role', 'user')
        ->select('users.id', 'users.name', 'users.nim', 'course.course_name')
        ->get();

        return view('dashboard.asisten.weekly-score', compact('students', 'course'));
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
        $studentIds = $request->input('student_id');
        $courseId = $request->input('course_id');
        $meetingId = $request->input('meeting_id');
        $scores = $request->input('score');
        

    
        foreach ($studentIds as $index => $student_id) {
            WeeklyScore::updateOrCreate([
                'user_id' => $student_id,
                'course_id' => $courseId,
                'meeting_id' => $meetingId,
                'score' => $request->input('score')[$index] ?? 10,
            ]);
        }


    
        // Redirect dengan pesan sukses
        return redirect()->route('asisten-group.index')->with('success', 'Data nilai per-pekan berhasil disimpan');
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
    public function edit($courseId)
    {
        $students = PraktikanGroup::where('course_id', $courseId)
        ->join('users', 'praktikangroup.user_id', '=', 'users.id')
        ->join('course', 'praktikangroup.course_id', '=', 'course.id')
        ->where('users.role', 'user')
        ->select('users.id as user_id', 'users.name', 'users.nim', 'course.course_name')
        ->get();

    // Ambil data pre-test berdasarkan mahasiswa
        $weeklyScoreData = WeeklyScore::whereIn('user_id', $students->pluck('user_id'))
            ->get()
            ->keyBy('user_id'); // Key by student_id for easier lookup

        return view('dashboard.asisten.edit-weeklyscore', compact('students', 'weeklyScoreData', 'courseId' ));
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
    public function destroy(string $id)
    {
        //
    }

    public function updateAll(Request $request, $courseId)
{
    $request->validate([
        'user_id' => 'required|array',
        'user_id.*' => 'required|exists:users,id',
        'meeting_id' => 'required|exists:meeting,id',
        'score' => 'required|array',
        'score.*' => 'nullable|integer|min:10|max:100',
    ]);

    $studentIds = $request->input('user_id', []);
    $meetingId = $request->input('meeting_id');
    $scores = $request->input('score');

    foreach ($studentIds as $index => $studentId) {
        WeeklyScore::updateOrCreate(
            ['user_id' => $student_id, 'course_id' => $course_id, 'meeting_id' => $meeting_id],
            ['score' => $scores[$index] ?? 10]
        );
    }

    return redirect()->route('asisten-group.index')->with('success', 'Data nilai per-pekan berhasil diperbarui.');
}


    /**
     * Show the form for inputting weekly score for a specific meeting.
     */
    // public function input(Request $request)
    // {
    //     $meeting_id = $request->query('meeting_id');
    //     $course_id = $request->query('course_id');

    //     $students = \App\Models\PraktikanGroup::where('course_id', $course_id)
    //         ->join('users', 'praktikangroup.user_id', '=', 'users.id')
    //         ->where('users.role', 'user')
    //         ->select('users.id', 'users.name', 'users.nim')
    //         ->get();
    //     $course = (object)[
    //         'id' => $course_id,
    //     ];
    //     return view('dashboard.asisten.weekly-score', compact('students', 'course', 'weekNumber'));
    // }
    public function input(Request $request)
    {
        $meeting_id = $request->query('meeting_id');
        $course_id = $request->query('course_id');

        $students = PraktikanGroup::where('course_id', $course_id)
            ->join('users', 'praktikangroup.user_id', '=', 'users.id')
            ->where('users.role', 'user')
            ->select('users.id', 'users.name', 'users.nim')
            ->get();
        
        return view('dashboard.asisten.input-weeklyscore', compact('students', 'meeting_id', 'course_id'));
    }
}
