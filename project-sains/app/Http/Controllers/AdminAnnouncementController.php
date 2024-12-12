<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminAnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();

        $name = Announcement::where('user_id', $userId)->join('users', 'announcements.user_id', '=', 'users.id')->select('users.name')->first();
        if($name == null){
            $name = collect();
        }
        $announcements = Announcement::join('users', 'announcements.user_id', '=', 'users.id')->select('announcements.*', 'users.name')->get();
        return view('dashboard.admin.announcement-admin', compact('announcements', 'userId', 'name'));
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
        $validator = Validator::make($request->all(), [
            'text' => 'required|max:255',
            'file_name' => 'mimes:pdf|max:10240',
        ], [
            'text.required' => 'Isi dari pengumuman masih kosong',
            'file_name.mimes' => 'Mohon upload file PDF',
            'file_name.max' => 'File anda melebihi batas unggah',
            'text.max' => 'Isi dari pengumaman terlalu panjang'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $filePath = null;   
        if ($request->hasFile('file_name')) {
            $fileName = time() . '-' . $request->file('file_name')->getClientOriginalName();
            $filePath = 'uploads/announcements/' . $fileName;
            $request->file('file_name')->move(public_path('uploads/announcements'), $fileName);
        } 

        Announcement::create([
            'file_name' => $filePath,
            'text' => $request->input('text'),
            'date_post' => now()->toDateString(),
            'time_post' => now()->toTimeString(),
            'user_id' => $request->input('user_id')
        ]);

        return back()->with('success', 'Pengumuman berhasil diunggah.');
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
        $announcement = Announcement::findOrFail($id);
        return view('dashboard.admin.editannouncement-admin', compact('announcement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
        {
            $announcement = Announcement::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'text' => 'required|max:255',
                'file_name' => 'nullable|mimes:pdf|max:10240', // file_name bisa null
            ], [
                'text.required' => 'Isi dari pengumuman masih kosong',
                'file_name.mimes' => 'Mohon upload file PDF',
                'file_name.max' => 'File anda melebihi batas unggah',
                'text.max' => 'Isi dari pengumuman terlalu panjang'
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            // Simpan file lama sebagai default
            $filePath = $announcement->file_name; 

            if ($request->hasFile('file_name')) {
                // Hapus file lama jika ada
                if ($filePath) {
                    $oldFilePath = public_path($filePath);
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                // Simpan file baru
                $fileName = time() . '-' . $request->file('file_name')->getClientOriginalName();
                $filePath = 'uploads/announcements/' . $fileName;
                $request->file('file_name')->move(public_path('uploads/announcements'), $fileName);
            }

            // Update data pengumuman
            $announcement->file_name = $filePath; // Gunakan $filePath yang sudah diatur
            $announcement->text = $request->input('text');
            $announcement->save();

            return redirect()->route('adminannouncement.index')->with('success', 'Pengumuman berhasil diubah');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
