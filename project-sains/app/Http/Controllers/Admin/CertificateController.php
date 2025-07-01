<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\User;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certificates = Certificate::select('type')->distinct()->get();
        $checkcertificate = Certificate::select('type')->distinct()->first();
    
        return view('dashboard.admin.certificate-admin', compact('certificates', 'checkcertificate'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $asisten = User::where('role', 'asisten')->orderBy('nim', 'asc')->get();
        $praktikan = User::where('role', 'user')->orderBy('nim', 'asc')->get();
        return view('dashboard.admin.createcertificate-admin', compact('asisten', 'praktikan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'peserta' => 'required|file|mimes:pdf|max:10240',
            'praktikan_ikhwan_file' => 'required|file|mimes:pdf|max:10240',
            'praktikan_akhwat_file' => 'required|file|mimes:pdf|max:10240',
            'asisten' => 'required|file|mimes:pdf|max:10240',
            'asisten_ikhwan_file' => 'required|file|mimes:pdf|max:10240',
            'asisten_akhwat_file' => 'required|file|mimes:pdf|max:10240',
            'list-praktikan-ikhwan' => 'required',
            'list-praktikan-akhwat' => 'required',
            'list-asisten-ikhwan' => 'required',
            'list-asisten-akhwat' => 'required',
            ], [
                'peserta.mimes' => 'Format file tidak didukung. Unggah File dengan tipe pdf',
                'praktikan_ikhwan_file.mimes' => 'Format file tidak didukung. Unggah File dengan tipe pdf',
                'praktikan_akhwat_file.mimes' => 'Format file tidak didukung. Unggah File dengan tipe pdf',
                'asisten.mimes' => 'Format file tidak didukung. Unggah File dengan tipe pdf',
                'asisten_ikhwan_file.mimes' => 'Format file tidak didukung. Unggah File dengan tipe pdf',
                'asisten_akhwat_file.mimes' => 'Format file tidak didukung. Unggah File dengan tipe pdf',
                'peserta.required' => 'Silahkan Unggah Template Sertifikat Peserta',
                'praktikan_ikhwan_file.required' => 'Silahkan Unggah Template Sertifikat Peserta Ikhwan Terbaik',
                'praktikan_akhwat_file.required' => 'Silahkan Unggah Template Sertifikat Peserta Akhwat Terbaik',
                'asisten.required' => 'Silahkan Unggah Template Sertifikat Asisten',
                'asisten_ikhwan_file.required' => 'Silahkan Unggah Template Sertifikat Asisten Ikhwan Terbaik',
                'asisten_akhwat_file.required' => 'Silahkan Unggah Template Sertifikat Asisten Akhwat Terbaik',
                'list-praktikan-ikhwan.required' => 'Silahkan Pilih Praktikan Ikhwan Terbaik',
                'list-praktikan-akhwat.required' => 'Silahkan Pilih Praktikan Akhwat Terbaik',
                'list-asisten-ikhwan.required' => 'Silahkan Pilih Asisten Ikhwan Terbaik',
                'list-asisten-akhwat.required' => 'Silahkan Pilih Praktikan Akhwat Terbaik',
            ]);

            $praktikanIkhwanId = $request->input('list-praktikan-ikhwan');
            $praktikanAkhwatId = $request->input('list-praktikan-akhwat');
            $asistenIkhwanId = $request->input('list-asisten-ikhwan');
            $asistenAkhwatId = $request->input('list-asisten-akhwat');

            $type1 = $request->input('sertifikatPeserta');
            $type2 = $request->input('sertifikatAsisten');
            $type3 = $request->input('sertifikatPesertaIkhwanTerbaik');
            $type4 = $request->input('sertifikatPesertaAkhwatTerbaik');
            $type5 = $request->input('sertifikatAsistenIkhwanTerbaik');
            $type6 = $request->input('sertifikatAsistenAkhwatTerbaik');

            $asisten = User::where('role', 'asisten')->get();
            $praktikan = User::where('role', 'user')->get();
            $bestIkhwanPraktikan = User::where('id', $praktikanIkhwanId)->first();
            $bestAkhwatPraktikan = User::where('id', $praktikanAkhwatId)->first();
            $bestIkhwanAsisten = User::where('id', $asistenIkhwanId)->first();
            $bestAkhwatAsisten = User::where('id', $asistenAkhwatId)->first();

        if ($request->hasFile('peserta')) {
            $fileName = time() . '-' . $request->file('peserta')->getClientOriginalName();
            $filePath = 'uploads/certificates/' . $fileName;
            $request->file('peserta')->move(public_path('uploads/certificates'), $fileName);

            foreach ($praktikan as $item) {
                Certificate::create([
                    'certificate_name' => $filePath,
                    'name' => $item->name,
                    'type' => $type1,
                    'user_id' => $item->id
                ]);
            }
            
        } 

        if ($request->hasFile('asisten')) {
            $fileName = time() . '-' . $request->file('asisten')->getClientOriginalName();
            $filePath = 'uploads/certificates/' . $fileName;
            $request->file('asisten')->move(public_path('uploads/certificates'), $fileName);

            foreach ($asisten as $item) {
                Certificate::create([
                    'certificate_name' => $filePath,
                    'name' => $item->name,
                    'type' => $type2,
                    'user_id' => $item->id
                ]);
            }
        }

        if ($request->hasFile('praktikan_ikhwan_file')) {
            $fileName = time() . '-' . $request->file('praktikan_ikhwan_file')->getClientOriginalName();
            $filePath = 'uploads/certificates/' . $fileName;
            $request->file('praktikan_ikhwan_file')->move(public_path('uploads/certificates'), $fileName);

            Certificate::create([
                'certificate_name' => $filePath,
                'name' => $bestIkhwanPraktikan->name,
                'type' => $type3,
                'user_id' => $praktikanIkhwanId,
            ]);
        } 
        
        if ($request->hasFile('praktikan_akhwat_file')) {
            $fileName = time() . '-' . $request->file('praktikan_akhwat_file')->getClientOriginalName();
            $filePath = 'uploads/certificates/' . $fileName;
            $request->file('praktikan_akhwat_file')->move(public_path('uploads/certificates'), $fileName);

            Certificate::create([
                'certificate_name' => $filePath,
                'name' => $bestAkhwatPraktikan->name,
                'type' => $type4,
                'user_id' => $praktikanAkhwatId,
            ]);
        } 

        if ($request->hasFile('asisten_ikhwan_file')) {
            $fileName = time() . '-' . $request->file('asisten_ikhwan_file')->getClientOriginalName();
            $filePath = 'uploads/certificates/' . $fileName;
            $request->file('asisten_ikhwan_file')->move(public_path('uploads/certificates'), $fileName);

            Certificate::create([
                'certificate_name' => $filePath,
                'name' => $bestIkhwanAsisten->name,
                'type' => $type5,
                'user_id' => $asistenIkhwanId,
            ]);
        } 

        if ($request->hasFile('asisten_akhwat_file')) {
            $fileName = time() . '-' . $request->file('asisten_akhwat_file')->getClientOriginalName();
            $filePath = 'uploads/certificates/' . $fileName;
            $request->file('asisten_akhwat_file')->move(public_path('uploads/certificates'), $fileName);

            Certificate::create([
                'certificate_name' => $filePath,
                'name' => $bestAkhwatAsisten->name,
                'type' => $type6,
                'user_id' => $asistenAkhwatId,
            ]);
        } 

        return redirect()->route('admincertificate.index')->with('success', 'Template Sertifikat Berhasil diunggah.');
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
        $certificate = Certificate::findOrFail($id);

        $asisten = User::where('role', 'asisten')->orderBy('nim', 'asc')->get();
        $praktikan = User::where('role', 'user')->orderBy('nim', 'asc')->get();

        $isPraktikan = $praktikan->contains('id', $certificate->user_id);
        $isAsisten = $asisten->contains('id', $certificate->user_id);



        return view('dashboard.admin.editcertificate-admin', compact('certificate', 'asisten', 'praktikan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $certificate = Certificate::findOrFail($id);
        $request->validate([
            'sertifikat' => 'required|file|mimes:pdf,doc,docx,png,jpg,jpeg|max:10240'
        ]);


        if ($request->hasFile('sertifikat')) {
            // Hapus file lama jika ada
            if (file_exists(public_path($certificate->certificate_name))) {
                unlink(public_path($certificate->certificate_name));
            }
    
            $fileName = time() . '-' . $request->file('sertifikat')->getClientOriginalName();
            $filePath = 'uploads/certificates/' . $fileName;
            $request->file('sertifikat')->move(public_path('uploads/certificates'), $fileName);
            
            $certificate->certificate_name = $filePath;
            $certificate->user_id = $request->input('list_nama');
            $certificate->save();

            return redirect()->route('admincertificate.index')->with('success', 'Sertifikat berhasil diperbarui.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        Certificate::truncate(); // Menghapus semua entri dalam tabel certificates
        return redirect()->route('admincertificate.index')->with('success', 'Semua sertifikat telah dihapus.');
    }

    public function destroyAll()
    {
        Certificate::truncate(); // Menghapus semua entri dalam tabel certificates
        return redirect()->route('admincertificate.index')->with('success', 'Semua Template sertifikat telah dihapus.');
    }
}

