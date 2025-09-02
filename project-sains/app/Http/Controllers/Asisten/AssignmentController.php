<?php

namespace App\Http\Controllers\Asisten;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\AssignmentCheck;
use Illuminate\Http\Request;
use App\Models\PraktikanGroup;
use App\Models\Meeting;
use Illuminate\Support\Facades\Auth;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $meetingId = $request->input('meeting_id');
        $userId = Auth::id();
        $courseName = PraktikanGroup::where('user_id', $userId)
        ->join('course', 'praktikangroup.course_id', '=', 'course.id')
        ->select('course.id', 'course.course_name')
        ->first();

        $assignments = Assignment::where('user_id', $userId)
        ->where('meeting_id', $meetingId)
        ->where('course_id', $courseName->id)
        ->get();


        return view('dashboard.asisten.assignment-asisten', compact('meetingId', 'assignments'));
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

        // $existingMaterial = Material::where('meeting_id', $meetingId)->first();

        // if($existingMaterial){
        //     // return redirect()->route('materi.edit', ['materi' => $existingMaterial->id]);
        //     return redirect()->route('materi.index', ['meeting' => $meetingId]);
        // }
        

    
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

        return view('dashboard.asisten.create-assignment-asisten', compact('students', 'meetingId', 'courseName', 'meetingName', 'userId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $meetingId = $request->input('meeting_id');
        $courseId = $request->input('course_id');
        $userId = $request->input('user_id');

        $request->validate([
            'assignment_name' => 'required|string|max:255',
            'assignment_file_name' => 'required|file|mimes:pdf,doc,docx,png,jpg,jpeg|max:10240',
        ], [
            'assignment_file_name.mimes' => 'Format file tidak didukung. Unggah file dengan tipe pdf, doc, docx, png, jpg, atau jpeg.',
            'assignment_file_name.max' => 'Ukuran file terlalu besar. Maksimal 10MB.',
        ]);
    
        // Proses file jika validasi berhasil
        if ($request->hasFile('assignment_file_name')) {
            $fileName = time() . '-' . $request->file('assignment_file_name')->getClientOriginalName();
            $filePath = 'uploads/assignments/' . $fileName;
            $request->file('assignment_file_name')->move(public_path('uploads/assignments'), $fileName);
        } 

        Assignment::create([
            'user_id' => $userId,
            'meeting_id' => $meetingId,
            'course_id' => $courseId,
            'assignment_name' => $request->input('assignment_name'),
            'assignment_file_name' => $filePath,
            'description' => $request->input('description'),
        ]);

        return redirect()->route('asisten-group.index')->with('success', 'File tugas berhasil diunggah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $assignment = Assignment::findOrFail($id);
        $submissions = AssignmentCheck::where('assignment_id', $assignment->id )
        ->join('users', 'assignment_checks.user_id', '=', 'users.id')
        ->select('assignment_checks.id', 'users.name', 'assignment_checks.score', 'assignment_checks.assignment_check_file_name')
        ->get();
        // $filePath = public_path($assignment->assignment_check_file_name);
        // $pdfContent = file_get_contents($filePath);
        return view('dashboard.asisten.submission-asisten', compact('assignment', 'submissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $assignment = Assignment::findOrFail($id);
        return view('dashboard.asisten.edit-assignment-asisten', compact('assignment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $assignment = Assignment::findOrFail($id);
    
        // Validasi input
        $request->validate([
            'assignment_name' => 'required|string|max:255',
            'assignment_file_name' => 'nullable|file|mimes:pdf,doc,docx,png,jpg,jpeg|max:10240',
        ], [
            'assignment_file_name.mimes' => 'Format file tidak didukung. Unggah file dengan tipe pdf, doc, docx, png, jpg, atau jpeg.',
            'assignment_file_name.max' => 'Ukuran file terlalu besar. Maksimal 10MB.',
        ]);
    
        // Cek apakah ada file baru yang diunggah
        if ($request->hasFile('assignment_file_name')) {
            // Hapus file lama jika ada
            if (file_exists(public_path($assignment->assignment_file_name))) {
                unlink(public_path($assignment->assignment_file_name));
            }
    
            // Simpan file baru
            $fileName = time() . '-' . $request->file('assignment_file_name')->getClientOriginalName();
            $filePath = 'uploads/assignments/' . $fileName;
            $request->file('assignment_file_name')->move(public_path('uploads/assignments'), $fileName);
            
            // Update file path di database
            $assignment->assignment_file_name = $filePath;
        }
    
        // Update field lain di database
        $assignment->assignment_name = $request->input('assignment_name');
        $assignment->description = $request->input('description');
        $assignment->save();
    
        return redirect()->route('asisten-group.index')->with('success', 'File tugas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $assignment = Assignment::findOrFail($id);
        
        $assignment->delete();
        return redirect()->route('asisten-group.index')->with('success', 'File tugas berhasil dihapus.');
    }
}
