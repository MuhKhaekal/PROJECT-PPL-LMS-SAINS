<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\study_program;

class StudyProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $studyPrograms = [
            ['study_program_name' => 'sistem informasi'],
            ['study_program_name' => 'teknik informatika'],
            ['study_program_name' => 'ilmu komputer'],
        ];
        foreach($studyPrograms as $studyProgram) {
            study_program::create($studyProgram);
        }
    }
}
