<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\PraktikanGroup;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()   
    {
        $userId = Auth::id();
        $courseName = PraktikanGroup::where('user_id', $userId)
        ->join('course', 'praktikangroup.course_id', '=', 'course.id')
        ->select('course.id', 'course.course_name')
        ->first();
        
        return view('dashboard.asisten.meeting-asisten', compact('courseName'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'meeting_name' => 'required|string|max:255',
            'meeting_topic' => 'required|string|max:255',
            'description' => 'nullable|string',
            'course_id' => 'required|exists:course,id'
        ]);
    
        // dd($request->all());
        Meeting::create([
            'meeting_name' => $request->input('meeting_name'),
            'meeting_topic' => $request->input('meeting_topic'),
            'description' => $request->input('description'),
            'course_id' => $request->input('course_id'),
        ]);

        return redirect()->route('asisten-group.index');
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
        $meeting = Meeting::findOrFail($id);
        return view('dashboard.asisten.edit-meeting-asisten', compact('meeting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'meeting_name' => 'required|string|max:255',
            'meeting_topic' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
    
        $meeting = Meeting::findOrFail($id);
        $meeting->update($request->only('meeting_name', 'meeting_topic', 'description'));
    
        return redirect()->route('asisten-group.index')->with('success', 'Pertemuan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $meeting = Meeting::findOrFail($id);
        $meeting->delete();    
        return redirect()->route('asisten-group.index')->with('success', 'Pertemuan berhasil dihapus.');
    }
}
