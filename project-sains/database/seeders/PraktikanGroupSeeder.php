<?php

namespace Database\Seeders;

use App\Models\PraktikanGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PraktikanGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $praktikangroups = [
            ['user_id' => '8', 'course_id' => '135'],
            ['user_id' => '83', 'course_id' => '135'],
            ['user_id' => '9', 'course_id' => '135'],
            ['user_id' => '12', 'course_id' => '135'],
            ['user_id' => '22', 'course_id' => '135'],
            ['user_id' => '26', 'course_id' => '135'],
            ['user_id' => '27', 'course_id' => '135'],
            ['user_id' => '29', 'course_id' => '135'],
            ['user_id' => '33', 'course_id' => '39'],
            ['user_id' => '32', 'course_id' => '39'],
            ['user_id' => '43', 'course_id' => '39'],
            ['user_id' => '44', 'course_id' => '39'],
            ['user_id' => '46', 'course_id' => '39'],
            ['user_id' => '48', 'course_id' => '39'],
            ['user_id' => '49', 'course_id' => '39'],
            ['user_id' => '50', 'course_id' => '39'],
            ['user_id' => '53', 'course_id' => '13'],
            ['user_id' => '54', 'course_id' => '13'],
            ['user_id' => '57', 'course_id' => '13'],
            ['user_id' => '58', 'course_id' => '13'],
            ['user_id' => '59', 'course_id' => '13'],
            ['user_id' => '61', 'course_id' => '13'],
            ['user_id' => '64', 'course_id' => '13'],
            ['user_id' => '68', 'course_id' => '13'],
            ['user_id' => '69', 'course_id' => '159'],
            ['user_id' => '70', 'course_id' => '159'],
            ['user_id' => '71', 'course_id' => '159'],
            ['user_id' => '72', 'course_id' => '159'],
            ['user_id' => '73', 'course_id' => '159'],
            ['user_id' => '74', 'course_id' => '159'],
            ['user_id' => '78', 'course_id' => '159'],
            ['user_id' => '79', 'course_id' => '159'],
        ];
        foreach($praktikangroups as $praktikangroup) {
            PraktikanGroup::create($praktikangroup);
        }
    }
}
