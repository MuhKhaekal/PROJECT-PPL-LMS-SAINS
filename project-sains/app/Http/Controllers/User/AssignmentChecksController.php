<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AssignmentCheck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\AssignRef;

class AssignmentChecksController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $assignmentid = $request->input('assignment_id');
        $userId = $request->input('user_id');

        $request->validate([
            'assignment_check_file_name' => 'required|file|mimes:pdf,doc,docx,png,jpg,jpeg|max:10240',
        ], [
            'assignment_check_file_name.mimes' => 'Format file tidak didukung. Unggah file dengan tipe pdf, doc, docx, png, jpg, atau jpeg.',
            'assignment_check_file_name.max' => 'Ukuran file terlalu besar. Maksimal 10MB.',
        ]);
    
        // Proses file jika validasi berhasil
        if ($request->hasFile('assignment_check_file_name')) {
            $fileName = time() . '-' . $request->file('assignment_check_file_name')->getClientOriginalName();
            $filePath = 'uploads/assignmentChecks/' . $fileName;
            $request->file('assignment_check_file_name')->move(public_path('uploads/assignmentChecks'), $fileName);
        } 

        AssignmentCheck::create([
            'user_id' => $userId,
            'assignment_id' => $assignmentid,
            'assignment_check_file_name' => $filePath,
        ]);

        return redirect()->route('study-group.index')->with('success', 'Submit tugas berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
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
        $userId = Auth::id();
    
        // Cari submission berdasarkan id di tabel assignment_checks dan pastikan milik user login
        $submission = AssignmentCheck::where('id', $id)
            ->where('user_id', $userId)
            ->firstOrFail();
    
        // Hapus file fisiknya kalau ada
        if ($submission->assignment_check_file_name && file_exists(public_path($submission->assignment_check_file_name))) {
            unlink(public_path($submission->assignment_check_file_name));
        }
    
        // Hapus record database
        $submission->delete();
    
        return redirect()->route('study-group.index')->with('success', 'Submit tugas berhasil dihapus');
    }
    
}
