<?php

namespace App\Http\Controllers\Asisten;

use App\Http\Controllers\Controller;
use App\Models\PraktikanGroup;
use App\Models\WeeklyScore;
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
        $course_id = $request->input('course_id');
        $p1 = $request->input('p1', []);
        $p2 = $request->input('p2', []);
        $p3 = $request->input('p3', []);
        $p4 = $request->input('p4', []);
        $p5 = $request->input('p5', []);
        $p6 = $request->input('p6', []);
        $p7 = $request->input('p7', []);
        $p8 = $request->input('p8', []);
        $p9 = $request->input('p9', []);
        $p10 = $request->input('p10', []);

    
        foreach ($studentIds as $index => $studentId) {
            WeeklyScore::create([
                'user_id' => $studentId,
                'course_id' => $course_id,
                'p1' => $p1[$index] ?? 10,
                'p2' => $p2[$index] ?? 10,
                'p3' => $p3[$index] ?? 10,
                'p4' => $p4[$index] ?? 10,
                'p5' => $p5[$index] ?? 10,
                'p6' => $p6[$index] ?? 10,
                'p7' => $p7[$index] ?? 10,
                'p8' => $p8[$index] ?? 10,
                'p9' => $p9[$index] ?? 10,
                'p10' => $p10[$index] ?? 10,
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

    public function updateAll(Request $request, $courseId){
        $studentIds = $request->input('user_id', []);
        $p1 = $request->input('p1', []);
        $p2 = $request->input('p2', []);
        $p3 = $request->input('p3', []);
        $p4 = $request->input('p4', []);
        $p5 = $request->input('p5', []);
        $p6 = $request->input('p6', []);
        $p7 = $request->input('p7', []);
        $p8 = $request->input('p8', []);
        $p9 = $request->input('p9', []);
        $p10 = $request->input('p10', []);

        foreach ($studentIds as $index => $studentId) {
            WeeklyScore::updateOrCreate(
                ['user_id' => $studentId, 'course_id' => $courseId],
                [
                    'p1' => $p1[$index] ?? 10,
                    'p2' => $p2[$index] ?? 10,
                    'p3' => $p3[$index] ?? 10,
                    'p4' => $p4[$index] ?? 10,
                    'p5' => $p5[$index] ?? 10,
                    'p6' => $p6[$index] ?? 10,
                    'p7' => $p7[$index] ?? 10,
                    'p8' => $p8[$index] ?? 10,
                    'p9' => $p9[$index] ?? 10,
                    'p10' => $p10[$index] ?? 10,
                ]
            );
        }

        return redirect()->route('asisten-group.index')->with('success', 'Data nilai per-pekan berhasil diperbarui.');
    }
}
