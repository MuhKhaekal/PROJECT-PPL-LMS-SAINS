<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Faculty;
use App\Models\PraktikanGroup;
use App\Models\User;
use Illuminate\Http\Request;

class AdminFacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');

        // Menggunakan paginate pada query untuk mendapatkan pengguna dengan role 'user' dan filter berdasarkan pencarian
        $faculties = Faculty::withCount('courses')
                    ->when($search, function ($query) use ($search) {
                        return $query->where('faculty_name', 'like', "%{$search}%");
                    })
                    ->paginate(8);
    
        // Menggunakan paginate pa
    
        // $faculties = Faculty::withCount('courses')->paginate(8);
    
        return view('dashboard.admin.listfaculties-admin', compact('faculties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.createfaculty-admin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'faculty_name' => 'required|string|max:255',
        ]);
    
        // dd($request->all());
        Faculty::create([
            'faculty_name' => $request->input('faculty_name'),
        ]);

        return redirect()->route('adminfaculty.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $faculty = Faculty::findOrFail($id);
    
    
        $courses = Course::where('faculty_id', $faculty->id)->paginate(5);

        $courseGroupsCount = [];

        // Loop through each course to get the count of PraktikanGroup
        foreach ($courses as $course) {
            $courseGroupsCount[$course->id] = PraktikanGroup::where('course_id', $course->id)->count();
        }
    
        return view('dashboard.admin.detailfaculty-admin', compact('faculty', 'courses', 'courseGroupsCount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $faculty = Faculty::findOrFail($id);
        return view('dashboard.admin.editfaculty-admin', compact('faculty'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'faculty_name' => 'required|string|max:255',
        ]);

        $faculty = Faculty::findOrFail($id);

        $faculty->update($request->only('faculty_name'));
        
        return redirect()->route('adminfaculty.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $faculty = Faculty::findOrFail($id);
        $faculty->delete();
        return redirect()->route('adminfaculty.index');
    }
}
