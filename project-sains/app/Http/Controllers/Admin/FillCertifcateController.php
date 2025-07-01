<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\CertificateVerification;
use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;


class FillCertifcateController extends Controller
{
    
    
    public function process(Request $request)
    {
        $type = $request->input('certificatetype');
        $search = $request->get('search');

        $certificateverification = CertificateVerification::where('type', $type)->first();

        $certificates = Certificate::where('type', $type)->when($search, function ($query) use ($search){
            return $query->where('name', 'like', "%{$search}%");
        })->paginate(5);

        $base64pdfs = [];

        foreach ($certificates as $certificate) {
            $nama = $certificate->name;
            $outputfile = public_path('uploads/certificates/fill/' . $type . '-' . $certificate->name . '.pdf');
            $this->fillPDF(public_path($certificate->certificate_name), $outputfile, $nama);


            $filePath = public_path('uploads/certificates/fill/' . $type . '-' . $certificate->name . '.pdf');
            $pdfContent = file_get_contents($filePath);
            $base64pdfs[$certificate->id] = 'data:application/pdf;base64,' . base64_encode($pdfContent);
        }

        return view('dashboard.admin.fillcertificate-admin', compact('type', 'certificates', 'base64pdfs', 'certificateverification'))->with('query', $request->query());;
    }

    public function store(Request $request){
        $type = $request->input('certificatetype');
        $certificates = Certificate::where('type', $type)->get();

        foreach ($certificates as $certificate) {
            $nama = $certificate->name;
            $outputfile = 'uploads/certificates/fill/' . $type . '-' . $certificate->name . '.pdf';

            CertificateVerification::create([
                'certificate_verification_name' => $outputfile,
                'name' => $nama,
                'type' => $type,
                'user_id' => $certificate->user_id,
            ]);
    }

    return redirect()->route('fillcertificate.process', ['certificatetype' => $type])->with('success', 'Sertifikat telah divalidasi.');
    }

    public function fillPDF($file, $outputfile, $name)
    {
        $fpdi = new FPDI();
        $fpdi->setSourceFile($file);
        $template = $fpdi->importPage(1);
        $size = $fpdi->getTemplateSize($template);
        $fpdi->AddPage($size['orientation'], [$size['width'], $size['height']]);
        $fpdi->useTemplate($template);
        
        // Set font, ukuran teks, dan warna
        $fpdi->SetFont("Arial", "", 32);
        $fpdi->SetTextColor(25, 26, 25);
        
        // Tentukan posisi teks (center horizontal)
        $name = $name; // Nama yang akan ditulis
        $top = 100;    // Posisi vertikal (Y)
        $pageWidth = $size['width'];
        $textWidth = $fpdi->GetStringWidth($name); // Panjang teks
        $centerX = ($pageWidth - $textWidth) / 2; // Posisi X di tengah
        
        // Tambahkan teks ke PDF
        $fpdi->text($centerX, $top, $name);
        

        return $fpdi->Output($outputfile, 'F');
        
    }

    public function destroyByType(Request $request)
    {
        // Ambil tipe sertifikat dari input request
        $type = $request->input('certificatetype');
    
        // Hapus semua entri yang memiliki tipe yang sesuai
        CertificateVerification::where('type', $type)->delete();
    
        return redirect()->route('fillcertificate.process', ['certificatetype' => $type])->with('success', 'Validasi sertifikat telah dibatalkan.');
    }
    
}
