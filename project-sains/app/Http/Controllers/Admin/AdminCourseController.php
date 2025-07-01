<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Faculty;
use Illuminate\Http\Request;

class AdminCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $facultyId = $request->query('admincourse');
        return view('dashboard.admin.createcourse-admin', compact('facultyId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_name' => 'required|string|max:255',
            'faculty_id' => 'required',
        ]);
    
        Course::create([
            'course_name' => $request->input('course_name'),
            'faculty_id' => $request->input('faculty_id'),
        ]);

        return redirect()->route('admincourse.index');
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
        $course = Course::findOrFail($id);
        return view('dashboard.admin.editcourse-admin', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'course_name' => 'required|string|max:255',
        ]);

        $course = Course::findOrFail($id);

        $course->update($request->only('course_name'));
        
        return redirect()->route('adminfaculty.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->route('adminfaculty.index');
    }
}
