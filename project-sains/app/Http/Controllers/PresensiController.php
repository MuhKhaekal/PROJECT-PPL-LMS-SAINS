<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PraktikanGroup;
class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allStudents = PraktikanGroup::join('users', 'praktikangroup.user_id', '=', 'users.id')
        ->join('course', 'praktikangroup.course_id', '=', 'course.id')
        ->select('users.name', 'course.course_name') // Memilih nama mahasiswa dan nama kursus
        ->get();
        return view('dashboard.asisten.presensi-asisten', compact('allStudents'));
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
