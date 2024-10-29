<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PraktikanGroup;
use Illuminate\Support\Facades\Auth;


class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();

        $courseName = PraktikanGroup::where('user_id', $userId)
        ->join('course', 'praktikangroup.course_id', '=', 'course.id')
        ->select('course.id', 'course.course_name')
        ->first();
        
        $students = PraktikanGroup::where('course.id', $courseName->id )
        ->join('users', 'praktikangroup.user_id', '=', 'users.id')
        ->join('course', 'praktikangroup.course_id', '=', 'course.id')
        ->where('users.role', 'user')
        ->select('users.name', 'course.course_name') // Memilih nama mahasiswa dan nama kursus
        ->get();
        return view('dashboard.asisten.presensi-asisten', compact('students'));
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
        //
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
