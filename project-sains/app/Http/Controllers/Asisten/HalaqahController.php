<?php

namespace App\Http\Controllers\Asisten;

use App\Http\Controllers\Controller;
use App\Exports\StudentsExport;
use App\Models\halaqah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class HalaqahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $courseName = halaqah::where('user_id', $userId)
        ->join('course', 'halaqah.course_id', '=', 'course.id')
        ->select('course.id', 'course.course_name')
        ->first();

        $students = halaqah::where('course.id', $courseName->id )
        ->join('users', 'halaqah.user_id', '=', 'users.id')
        ->join('course', 'halaqah.course_id', '=', 'course.id')
        ->join('pretests', 'users.id', '=', 'pretests.user_id')
        ->join('posttests', 'users.id', '=', 'posttests.user_id')
        ->join('weekly_scores', 'users.id', '=', 'weekly_scores.user_id')
        ->where('users.role', 'user')
        ->select('users.id', 
        'users.name',
        'users.nim', 
        'course.course_name', 
        'pretests.kelancaran as prekelancaran',
        'pretests.hukum_bacaan as prehukum_bacaan', 
        'pretests.makharijul_huruf as premakharijul_huruf', 
        'posttests.kelancaran as postkelancaran',
        'posttests.hukum_bacaan as posthukum_bacaan', 
        'posttests.makharijul_huruf as postmakharijul_huruf',
        'weekly_scores.*') 
        ->get();

        return view('dashboard.asisten.list-praktikan', compact('students'));

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
    public function exportToExcel()
{
    $userId = Auth::id();
    $courseName = halaqah::where('user_id', $userId)
        ->join('course', 'halaqah.course_id', '=', 'course.id')
        ->select('course.id', 'course.course_name')
        ->first();

    $students = halaqah::where('course.id', $courseName->id )
        ->join('users', 'halaqah.user_id', '=', 'users.id')
        ->join('course', 'halaqah.course_id', '=', 'course.id')
        ->join('pretests', 'users.id', '=', 'pretests.user_id')
        ->join('posttests', 'users.id', '=', 'posttests.user_id')
        ->join('weekly_scores', 'users.id', '=', 'weekly_scores.user_id')
        ->where('users.role', 'user')
        ->select('users.id', 
            'users.name',
            'users.nim', 
            'course.course_name', 
            'pretests.kelancaran as prekelancaran',
            'pretests.hukum_bacaan as prehukum_bacaan', 
            'pretests.makharijul_huruf as premakharijul_huruf', 
            'posttests.kelancaran as postkelancaran',
            'posttests.hukum_bacaan as posthukum_bacaan', 
            'posttests.makharijul_huruf as postmakharijul_huruf',
            'weekly_scores.*') 
        ->get();

    return Excel::download(new StudentsExport($students), 'laporan-akhir.xlsx');
}
}
