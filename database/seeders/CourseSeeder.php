<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('courses')->insert([
            [
                'course_title' => 'Kelompok 1',
                'course_slug' => Str::slug('Kelompok 1'),
                'mentor_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_title' => 'Kelompok 2',
                'course_slug' => Str::slug('Kelompok 2'),
                'mentor_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_title' => 'Kelompok 3',
                'course_slug' => Str::slug('Kelompok 3'),
                'mentor_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
