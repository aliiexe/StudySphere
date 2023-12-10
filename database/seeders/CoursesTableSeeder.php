<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed data for the courses table
        DB::table('courses')->insert([
            [
                'title' => 'Introduction a Agile',
                'image' => 'Agile.jpg',
                'sub_description' => 'Sub description for Course 1',
                'description' => 'Description for Course 1',
                'school' => 'OFPPT',
                'field_of_study' => 'Computer Science',
                'duree_du_cours' => '4 months',
                'pdf_file' => 'agile.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Course 2',
                'image' => 'course2.jpg',
                'sub_description' => 'Sub description for Course 2',
                'description' => 'Description for Course 2',
                'school' => 'University B',
                'field_of_study' => 'Mathematics',
                'duree_du_cours' => '3 months',
                'pdf_file' => 'course2.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more courses as needed
        ]);
    }
}
