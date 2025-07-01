<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\AssignmentCheck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowAssignmentController extends Controller
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
        
        $assignment = Assignment::findOrFail($id);
        // Dalam Controller
        $filePath = public_path($assignment->assignment_file_name);
        $pdfContent = file_get_contents($filePath);
        $base64Pdf = 'data:application/pdf;base64,' . base64_encode($pdfContent);
        $userId = Auth::id();
        $checkSubmission = AssignmentCheck::where('assignment_id', $assignment->id)->where('user_id', $userId)->get();

        return view('dashboard.user.detail-assignment-user', compact('assignment', 'base64Pdf', 'userId', 'checkSubmission'));
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
