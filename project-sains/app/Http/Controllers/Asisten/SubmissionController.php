<?php

namespace App\Http\Controllers\Asisten;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\AssignmentCheck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SubmissionController extends Controller
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
        $assignmentCheckId = AssignmentCheck::findorfail($id);
        // Dalam Controller
        $filePath = public_path($assignmentCheckId->assignment_check_file_name);
        $pdfContent = file_get_contents($filePath);
        $base64Pdf = 'data:application/pdf;base64,' . base64_encode($pdfContent);
        $userId = Auth::id();

        return view('dashboard.asisten.submission-check', compact('assignmentCheckId', 'base64Pdf', 'userId'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $score = $request->input('score');
        $assignmentCheck = AssignmentCheck::findOrFail($id);
        $assignmentCheck->update($request->only('score'));
        return view('close_tab');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
