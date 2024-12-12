<?php

namespace Database\Seeders;

use App\Models\Meeting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MeetingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $meetings = 
        [
            [
                'meeting_name' => 'Pertemuan 1',
                'meeting_topic' => 'Pengertian & Pentingnya Al-Quran',
                'description' => 'Membahas pengertian tajwid, tujuan tajwid, dan pentingnya ilmu tajwid',
                'course_id' => '135'
            ],
            [
                'meeting_name' => 'Pertemuan 2',
                'meeting_topic' => 'Makharijul Huruf (Tempat Keluarnya Huruf)',
                'description' => 'Membahas pengertian makharijul huruf, dan contoh hurufnya',
                'course_id' => '135'
            ],
            [
                'meeting_name' => 'Pertemuan 3',
                'meeting_topic' => 'Hukum Bacaan dalam Tajwid',
                'description' => 'Membahas Idzhar, Ikhfa, Idgham, Iqlab, Al-Qalqalah',
                'course_id' => '135'
            ],
            [
                'meeting_name' => 'Pertemuan 4',
                'meeting_topic' => 'Al-Madd (Panjang dalam Bacaan)',
                'description' => 'Membahas pengertian Al-Madd, Jenis-jenis Al-Madd, dan pentingnya memahami Al-Madd',
                'course_id' => '135'
            ],
            [
                'meeting_name' => 'Pertemuan 5',
                'meeting_topic' => 'Hukum Bacaan Mad (Panjang) dan Qasr (Pendek)',
                'description' => 'Membahas pengertian Mad dan Qasr, dan pentingnya Mad dan Qasr',
                'course_id' => '135'
            ],
            [
                'meeting_name' => 'Pertemuan 6',
                'meeting_topic' => 'Tahsinul Qiraah (Memperbaiki Bacaan Al-Quran)',
                'description' => 'Membahas tujuan tahsinul qiraah, dan teknik meningkatkan bacaan',
                'course_id' => '135'
            ],
            [
                'meeting_name' => 'Pertemuan 7',
                'meeting_topic' => 'Ilmu Qiraat (Variasi Bacaan Al-Quran)',
                'description' => 'Membahas pengertian qiraat, contoh qiraat, dan pentingnya qiraat',
                'course_id' => '135'
            ],
            [
                'meeting_name' => 'Pertemuan 8',
                'meeting_topic' => 'Ulumul Quran (Ilmu-ilmu Al-Quran)',
                'description' => 'Membahas tafsir, ilmu asbabun nuzul, ilmu qiraat, dan ilmu tajwid',
                'course_id' => '135'
            ],
            [
                'meeting_name' => 'Pertemuan 9',
                'meeting_topic' => 'Rukun-Rukun Bacaan dalam Al-Quran',
                'description' => 'Membahas rukun bacaan, hukum wajib dan hukum sunnah, dan memahami pentingnya rukun bacaan',
                'course_id' => '135'
            ],
            [
                'meeting_name' => 'Pertemuan 10',
                'meeting_topic' => 'Peran Ulama dalam Menyampaikan Ilmu Al-Quran',
                'description' => 'Membahas peran ulama, dan peran qari dan hafidz',
                'course_id' => '135'
            ],
            [
                'meeting_name' => 'Pertemuan 1',
                'meeting_topic' => 'Pengertian & Pentingnya Al-Quran',
                'description' => 'Membahas pengertian tajwid, tujuan tajwid, dan pentingnya ilmu tajwid',
                'course_id' => '39'
            ],
            [
                'meeting_name' => 'Pertemuan 2',
                'meeting_topic' => 'Makharijul Huruf (Tempat Keluarnya Huruf)',
                'description' => 'Membahas pengertian makharijul huruf, dan contoh hurufnya',
                'course_id' => '39'
            ],
            [
                'meeting_name' => 'Pertemuan 3',
                'meeting_topic' => 'Hukum Bacaan dalam Tajwid',
                'description' => 'Membahas Idzhar, Ikhfa, Idgham, Iqlab, Al-Qalqalah',
                'course_id' => '39'
            ],
            [
                'meeting_name' => 'Pertemuan 4',
                'meeting_topic' => 'Al-Madd (Panjang dalam Bacaan)',
                'description' => 'Membahas pengertian Al-Madd, Jenis-jenis Al-Madd, dan pentingnya memahami Al-Madd',
                'course_id' => '39'
            ],
            [
                'meeting_name' => 'Pertemuan 5',
                'meeting_topic' => 'Hukum Bacaan Mad (Panjang) dan Qasr (Pendek)',
                'description' => 'Membahas pengertian Mad dan Qasr, dan pentingnya Mad dan Qasr',
                'course_id' => '39'
            ],
            [
                'meeting_name' => 'Pertemuan 6',
                'meeting_topic' => 'Tahsinul Qiraah (Memperbaiki Bacaan Al-Quran)',
                'description' => 'Membahas tujuan tahsinul qiraah, dan teknik meningkatkan bacaan',
                'course_id' => '39'
            ],
            [
                'meeting_name' => 'Pertemuan 7',
                'meeting_topic' => 'Ilmu Qiraat (Variasi Bacaan Al-Quran)',
                'description' => 'Membahas pengertian qiraat, contoh qiraat, dan pentingnya qiraat',
                'course_id' => '39'
            ],
            [
                'meeting_name' => 'Pertemuan 8',
                'meeting_topic' => 'Ulumul Quran (Ilmu-ilmu Al-Quran)',
                'description' => 'Membahas tafsir, ilmu asbabun nuzul, ilmu qiraat, dan ilmu tajwid',
                'course_id' => '39'
            ],
            [
                'meeting_name' => 'Pertemuan 9',
                'meeting_topic' => 'Rukun-Rukun Bacaan dalam Al-Quran',
                'description' => 'Membahas rukun bacaan, hukum wajib dan hukum sunnah, dan memahami pentingnya rukun bacaan',
                'course_id' => '39'
            ],
            [
                'meeting_name' => 'Pertemuan 10',
                'meeting_topic' => 'Peran Ulama dalam Menyampaikan Ilmu Al-Quran',
                'description' => 'Membahas peran ulama, dan peran qari dan hafidz',
                'course_id' => '39'
            ],
            [
                'meeting_name' => 'Pertemuan 1',
                'meeting_topic' => 'Pengertian & Pentingnya Al-Quran',
                'description' => 'Membahas pengertian tajwid, tujuan tajwid, dan pentingnya ilmu tajwid',
                'course_id' => '13'
            ],
            [
                'meeting_name' => 'Pertemuan 2',
                'meeting_topic' => 'Makharijul Huruf (Tempat Keluarnya Huruf)',
                'description' => 'Membahas pengertian makharijul huruf, dan contoh hurufnya',
                'course_id' => '13'
            ],
            [
                'meeting_name' => 'Pertemuan 3',
                'meeting_topic' => 'Hukum Bacaan dalam Tajwid',
                'description' => 'Membahas Idzhar, Ikhfa, Idgham, Iqlab, Al-Qalqalah',
                'course_id' => '13'
            ],
            [
                'meeting_name' => 'Pertemuan 4',
                'meeting_topic' => 'Al-Madd (Panjang dalam Bacaan)',
                'description' => 'Membahas pengertian Al-Madd, Jenis-jenis Al-Madd, dan pentingnya memahami Al-Madd',
                'course_id' => '13'
            ],
            [
                'meeting_name' => 'Pertemuan 5',
                'meeting_topic' => 'Hukum Bacaan Mad (Panjang) dan Qasr (Pendek)',
                'description' => 'Membahas pengertian Mad dan Qasr, dan pentingnya Mad dan Qasr',
                'course_id' => '13'
            ],
            [
                'meeting_name' => 'Pertemuan 6',
                'meeting_topic' => 'Tahsinul Qiraah (Memperbaiki Bacaan Al-Quran)',
                'description' => 'Membahas tujuan tahsinul qiraah, dan teknik meningkatkan bacaan',
                'course_id' => '13'
            ],
            [
                'meeting_name' => 'Pertemuan 7',
                'meeting_topic' => 'Ilmu Qiraat (Variasi Bacaan Al-Quran)',
                'description' => 'Membahas pengertian qiraat, contoh qiraat, dan pentingnya qiraat',
                'course_id' => '13'
            ],
            [
                'meeting_name' => 'Pertemuan 8',
                'meeting_topic' => 'Ulumul Quran (Ilmu-ilmu Al-Quran)',
                'description' => 'Membahas tafsir, ilmu asbabun nuzul, ilmu qiraat, dan ilmu tajwid',
                'course_id' => '13'
            ],
            [
                'meeting_name' => 'Pertemuan 9',
                'meeting_topic' => 'Rukun-Rukun Bacaan dalam Al-Quran',
                'description' => 'Membahas rukun bacaan, hukum wajib dan hukum sunnah, dan memahami pentingnya rukun bacaan',
                'course_id' => '13'
            ],
            [
                'meeting_name' => 'Pertemuan 10',
                'meeting_topic' => 'Peran Ulama dalam Menyampaikan Ilmu Al-Quran',
                'description' => 'Membahas peran ulama, dan peran qari dan hafidz',
                'course_id' => '13'
            ],
            [
                'meeting_name' => 'Pertemuan 1',
                'meeting_topic' => 'Pengertian & Pentingnya Al-Quran',
                'description' => 'Membahas pengertian tajwid, tujuan tajwid, dan pentingnya ilmu tajwid',
                'course_id' => '159'
            ],
            [
                'meeting_name' => 'Pertemuan 2',
                'meeting_topic' => 'Makharijul Huruf (Tempat Keluarnya Huruf)',
                'description' => 'Membahas pengertian makharijul huruf, dan contoh hurufnya',
                'course_id' => '159'
            ],
            [
                'meeting_name' => 'Pertemuan 3',
                'meeting_topic' => 'Hukum Bacaan dalam Tajwid',
                'description' => 'Membahas Idzhar, Ikhfa, Idgham, Iqlab, Al-Qalqalah',
                'course_id' => '159'
            ],
            [
                'meeting_name' => 'Pertemuan 4',
                'meeting_topic' => 'Al-Madd (Panjang dalam Bacaan)',
                'description' => 'Membahas pengertian Al-Madd, Jenis-jenis Al-Madd, dan pentingnya memahami Al-Madd',
                'course_id' => '159'
            ],
            [
                'meeting_name' => 'Pertemuan 5',
                'meeting_topic' => 'Hukum Bacaan Mad (Panjang) dan Qasr (Pendek)',
                'description' => 'Membahas pengertian Mad dan Qasr, dan pentingnya Mad dan Qasr',
                'course_id' => '159'
            ],
            [
                'meeting_name' => 'Pertemuan 6',
                'meeting_topic' => 'Tahsinul Qiraah (Memperbaiki Bacaan Al-Quran)',
                'description' => 'Membahas tujuan tahsinul qiraah, dan teknik meningkatkan bacaan',
                'course_id' => '159'
            ],
            [
                'meeting_name' => 'Pertemuan 7',
                'meeting_topic' => 'Ilmu Qiraat (Variasi Bacaan Al-Quran)',
                'description' => 'Membahas pengertian qiraat, contoh qiraat, dan pentingnya qiraat',
                'course_id' => '159'
            ],
            [
                'meeting_name' => 'Pertemuan 8',
                'meeting_topic' => 'Ulumul Quran (Ilmu-ilmu Al-Quran)',
                'description' => 'Membahas tafsir, ilmu asbabun nuzul, ilmu qiraat, dan ilmu tajwid',
                'course_id' => '159'
            ],
            [
                'meeting_name' => 'Pertemuan 9',
                'meeting_topic' => 'Rukun-Rukun Bacaan dalam Al-Quran',
                'description' => 'Membahas rukun bacaan, hukum wajib dan hukum sunnah, dan memahami pentingnya rukun bacaan',
                'course_id' => '159'
            ],
            [
                'meeting_name' => 'Pertemuan 10',
                'meeting_topic' => 'Peran Ulama dalam Menyampaikan Ilmu Al-Quran',
                'description' => 'Membahas peran ulama, dan peran qari dan hafidz',
                'course_id' => '159'
            ]
        ];
        foreach($meetings as $meeting) {
            Meeting::create($meeting);
        }
    }
}
