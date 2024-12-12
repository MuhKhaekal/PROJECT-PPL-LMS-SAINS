<?php

namespace App\Charts;

use App\Models\Faculty;
use App\Models\Meeting;
use App\Models\User;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use SebastianBergmann\FileIterator\Facade;

class MonthlyUsersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    } 
   

    public function buildPie()
    {

        $countAdmin = User::where('role', 'admin')->count();
        $countUser = User::where('role', 'user')->count();
        $countAsisten = User::where('role', 'asisten')->count();
        return $this->chart->pieChart()
            ->setTitle('Pie Chart Pengguna')
            ->setSubtitle('Menampilkan jumlah pengguna dengan berbagai role')
            ->setDataset([$countAdmin, $countUser, $countAsisten]) // Ganti addData dengan setDataset
            ->setLabels(['Admin', 'User', 'Asisten']);
    }

    public function buildBar()
    {
        // Mengambil data fakultas dengan jumlah pengguna 'user' yang terkait

        $faculties = Faculty::select('faculty_name')
            ->withCount(['courses as count_faculty'])
            ->having('count_faculty', '>', 0)
            ->get();
        
    
        // Persiapkan data untuk chart
        $facultyNames = $faculties->pluck('faculty_name');
        $courseCounts = $faculties->pluck('count_faculty');
    
        // Membuat chart line
        return $this->chart->barChart()
            ->setTitle('Jumlah Grup berdasarkan Fakultas')
            ->setSubtitle('Menampilkan jumlah grup berdasarkan fakultas')
            ->addData('Jumlah Grup', $courseCounts->toArray()) // Menggunakan data yang diambil
            ->setXAxis($facultyNames->toArray()); // Menggunakan nama fakultas untuk sumbu X
    }
    public function buildLine()
    {
        $results = Meeting::select('meeting_name')
        ->selectRaw('
            COUNT(CASE WHEN p.status = "hadir" THEN 1 END) AS count_hadir,
            COUNT(CASE WHEN p.status = "alfa" THEN 1 END) AS count_alfa,
            COUNT(CASE WHEN p.status = "izin" THEN 1 END) AS count_izin,
            COUNT(CASE WHEN p.status = "sakit" THEN 1 END) AS count_sakit
        ')
        ->join('presence AS p', 'meeting.id', '=', 'p.meeting_id')
        ->groupBy('meeting_name')
        ->orderByRaw('CAST(SUBSTRING_INDEX(meeting_name, " ", -1) AS UNSIGNED) ASC') // Pengurutan berdasarkan angka setelah kata "Pertemuan"
        ->get();
    

// Menyiapkan data untuk chart
$countHadir = $results->pluck('count_hadir');
$countAlfa = $results->pluck('count_alfa');
$countIzin = $results->pluck('count_izin');
$countSakit = $results->pluck('count_sakit');
$meetiingName = $results->pluck('meeting_name');

// Menggunakan data tersebut untuk chart
return $this->chart->lineChart()
    ->setTitle('Line Chart Kehadiran praktikan berdasarkan Pertemuan')
    ->setSubtitle('Menampilkan masing-masing jumlah status presensi berdasarkan pertemuan')
    ->addData('Jumlah Hadir', $countHadir->toArray()) // Data jumlah hadir
    ->addData('Jumlah Alfa', $countAlfa->toArray()) // Data jumlah alfa
    ->addData('Jumlah Izin', $countIzin->toArray()) // Data jumlah izin
    ->addData('Jumlah Sakit', $countSakit->toArray()) // Data jumlah sakit
    ->setXAxis($meetiingName->toArray()); // Menampilkan nama meeting sebagai sumbu X
    }
    
    

    

    
    
}