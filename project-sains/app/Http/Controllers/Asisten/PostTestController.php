<?php

namespace App\Http\Controllers\Asisten;

use App\Http\Controllers\Controller;
use App\Models\Posttest;
use App\Models\PraktikanGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostTestController extends Controller
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
        return view('dashboard.asisten.post-test', compact('students', 'course'));
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
            'student_id.*' => 'required|exists:users,id',
            'kelancaran.*' => 'required|integer|min:0|max:10',
            'hukum_bacaan.*' => 'required|integer|min:0|max:10',
            'makharijul_huruf.*' => 'required|integer|min:0|max:10',
        ]);

        $studentIds = $request->input('student_id');
        $course_id = $request->input('course_id');
        $kelancaran = $request->input('kelancaran', []); // Gunakan array kosong jika tidak ada
        $hukumBacaan = $request->input('hukum_bacaan', []); // Default array kosong
        $makharijulHuruf = $request->input('makharijul_huruf', []); // Default array kosong
    
        foreach ($studentIds as $index => $studentId) {
            Posttest::create([
                'user_id' => $studentId,
                'course_id' => $course_id,
                'kelancaran' => $kelancaran[$index] ?? 0,
                'hukum_bacaan' => $hukumBacaan[$index] ?? 0,
                'makharijul_huruf' => $makharijulHuruf[$index] ?? 0,
            ]);
        }
    
        // Redirect dengan pesan sukses
        return redirect()->route('asisten-group.index')->with('success', 'Data pre-test berhasil disimpan.');
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
        $postTestData = PostTest::whereIn('user_id', $students->pluck('user_id'))
            ->get()
            ->keyBy('user_id'); // Key by student_id for easier lookup

        return view('dashboard.asisten.edit-post-test', compact('students', 'postTestData', 'courseId' ));
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
        $kelancaran = $request->input('kelancaran', []);
        $hukumBacaan = $request->input('hukum_bacaan', []);
        $makharijulHuruf = $request->input('makharijul_huruf', []);

        foreach ($studentIds as $index => $studentId) {
            PostTest::updateOrCreate(
                ['user_id' => $studentId],
                [
                    'kelancaran' => $kelancaran[$index] ?? 0,
                    'hukum_bacaan' => $hukumBacaan[$index] ?? 0,
                    'makharijul_huruf' => $makharijulHuruf[$index] ?? 0,
                ]
            );
        }

        return redirect()->route('asisten-group.index')->with('success', 'Data pre-test berhasil diperbarui.');
    }
}
