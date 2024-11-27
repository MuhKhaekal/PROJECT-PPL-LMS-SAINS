<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PraktikanGroup;
use App\Models\Meeting;
use App\Models\Material;
use Illuminate\Support\Facades\Auth;

class MaterialController extends Controller
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

        $materials = Material::where('user_id', $userId)
        ->where('meeting_id', $meetingId)
        ->where('course_id', $courseName->id)
        ->get();


        return view('dashboard.asisten.material-asisten', compact('meetingId', 'materials'));
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

        return view('dashboard.asisten.create-material-asisten', compact('students', 'meetingId', 'courseName', 'meetingName', 'userId'));
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
            'material_name' => 'required|string|max:255',
            'material_file_name' => 'required|file|mimes:pdf,doc,docx,png,jpg,jpeg|max:10240',
        ], [
            'material_file_name.mimes' => 'Format file tidak didukung. Unggah file dengan tipe pdf, doc, docx, png, jpg, atau jpeg.',
            'material_file_name.max' => 'Ukuran file terlalu besar. Maksimal 10MB.',
        ]);
    
        // Proses file jika validasi berhasil
        if ($request->hasFile('material_file_name')) {
            $fileName = time() . '-' . $request->file('material_file_name')->getClientOriginalName();
            $filePath = 'uploads/materials/' . $fileName;
            $request->file('material_file_name')->move(public_path('uploads/materials'), $fileName);
        } 

        Material::create([
            'user_id' => $userId,
            'meeting_id' => $meetingId,
            'course_id' => $courseId,
            'material_name' => $request->input('material_name'),
            'material_file_name' => $filePath,
            'description' => $request->input('description'),
        ]);

        return redirect()->route('asisten-group.index')->with('success', 'Presensi berhasil disimpan.');
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
        $material = Material::findOrFail($id);
        return view('dashboard.asisten.edit-material-asisten', compact('material'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $material = Material::findOrFail($id);
    
        // Validasi input
        $request->validate([
            'material_name' => 'required|string|max:255',
            'material_file_name' => 'nullable|file|mimes:pdf,doc,docx,png,jpg,jpeg|max:10240',
        ], [
            'material_file_name.mimes' => 'Format file tidak didukung. Unggah file dengan tipe pdf, doc, docx, png, jpg, atau jpeg.',
            'material_file_name.max' => 'Ukuran file terlalu besar. Maksimal 10MB.',
        ]);
    
        // Cek apakah ada file baru yang diunggah
        if ($request->hasFile('material_file_name')) {
            // Hapus file lama jika ada
            if (file_exists(public_path($material->material_file_name))) {
                unlink(public_path($material->material_file_name));
            }
    
            // Simpan file baru
            $fileName = time() . '-' . $request->file('material_file_name')->getClientOriginalName();
            $filePath = 'uploads/materials/' . $fileName;
            $request->file('material_file_name')->move(public_path('uploads/materials'), $fileName);
            
            // Update file path di database
            $material->material_file_name = $filePath;
        }
    
        // Update field lain di database
        $material->material_name = $request->input('material_name');
        $material->description = $request->input('description');
        $material->save();
    
        return redirect()->route('asisten-group.index')->with('success', 'Pertemuan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $material = Material::findOrFail($id);
        $meetingId = $material->meeting_id;
        
        $material->delete();
        return redirect()->route('materi.index', ['meeting_id' => $meetingId])->with('success', 'Pertemuan berhasil dihapus.');
    }
}
