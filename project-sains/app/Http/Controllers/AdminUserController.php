<?php

namespace App\Http\Controllers;

use App\Models\AssignmentCheck;
use App\Models\PraktikanGroup;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(Request $request)
{
    $search = $request->get('search');

    // Menggunakan paginate pada query untuk mendapatkan pengguna dengan role 'user' dan filter berdasarkan pencarian
    $users = User::query()
                ->when($search, function ($query) use ($search) {
                    return $query->where('name', 'like', "%{$search}%")
                                 ->orWhere('nim', 'like', "%{$search}%")
                                 ->orWhere('role', 'like', "%{$search}%")
                                 ->orWhere('email', 'like', "%{$search}%");
                })
                ->paginate(5);

    // Menggunakan paginate pa

    return view('dashboard.admin.listuser-admin', compact('users'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.createuser-admin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'nim' => 'required|size:10',
            'role' => 'required',
            'password' => 'required|min:8'
        ], [
            'nim.size' => 'Jumlah NIM tidak sesuai',
            'password' => 'Jumlah Passsword minimal 8'
        ]);

        
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    
        // dd($request->all());
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'nim' => $request->input('nim'),
            'role' => $request->input('role'),
            'password' => bcrypt($request->input('password')) ,
        ]);

        return redirect()->route('adminuser.index')->with('success', 'Akun telah berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findorfail($id);
        $courseName = PraktikanGroup::where('user_id', $user->id)
        ->join('course', 'praktikangroup.course_id', '=', 'course.id')
        ->select('course.id', 'course.course_name')
        ->first();

        if ($courseName) {
            $facultyName = PraktikanGroup::where('user_id', $user->id)
                ->join('course', 'praktikangroup.course_id', '=', 'course.id')
                ->join('faculty', 'course.faculty_id', '=', 'faculty.id')
                ->select('faculty.id', 'faculty.faculty_name')
                ->first();
        
            $presences = PraktikanGroup::where('presence.user_id', $user->id)
                ->join('course', 'praktikangroup.course_id', '=', 'course.id')
                ->join('meeting', 'course.id', '=', 'meeting.course_id')
                ->join('presence', 'meeting.id', '=', 'presence.meeting_id')
                ->select('presence.id', 'presence.status', 'meeting.meeting_name')
                ->distinct()
                ->get();
        
            $submissions = AssignmentCheck::where('assignment_checks.user_id', $user->id)
                ->join('assignments', 'assignment_checks.assignment_id', '=', 'assignments.id')
                ->get();
        } else {
            $facultyName = null; // Pastikan null, bukan collect()
            $courseName = null;  // Tambahkan null untuk konsistensi
            $presences = collect();
            $submissions = collect();
        }
        
        

        return view('dashboard.admin.detailuser-admin', compact('user','courseName', 'submissions', 'facultyName', 'presences'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findorfail($id);
        return view('dashboard.admin.edituser-admin', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'nim' => 'required|size:10',
            'role' => 'required',
            'password' => 'required'
        ]);
    
        $user = User::findOrFail($id);
        $user->update($request->only('name', 'email', 'nim', 'role', bcrypt('password')));
    
        return redirect()->route('adminuser.index')->with('success', 'Pertemuan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();    
        return redirect()->route('adminuser.index');
    }
}
