<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use App\Models\PraktikanGroup;
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
        $courseName = PraktikanGroup::where('user_id', $userId)
        ->join('course', 'praktikangroup.course_id', '=', 'course.id')
        ->select('course.course_name')
        ->first();
        return view('dashboard.asisten.asisten-group', compact('facultyList', 'userId', 'checkGroup', 'courseName'));
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
    public function destroy(string $id)
    {
        //
    }
}
