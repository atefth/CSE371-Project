<?php

use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
        ['name' => 'Introduction to Computer Programming', 'code' => 'CSE101', 'credits' => 3],
        ['name' => 'Introduction to Mathematics', 'code' => 'MAT101', 'credits' => 3],
        ['name' => 'World History', 'code' => 'HST102', 'credits' => 3],
        ['name' => 'Microprocessors', 'code' => 'CSE341', 'credits' => 3],
        ['name' => 'Database Design', 'code' => 'CSE370', 'credits' => 3],
        ['name' => 'Introduction to Programming in Unix', 'code' => 'CSE410', 'credits' => 3],
        ];
        foreach ($courses as $key => $course) {
            Course::create($course);
        }
    }
}
