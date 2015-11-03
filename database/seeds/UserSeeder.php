<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
        ['f_name' => 'John', 'l_name' => 'Doe', 'email' => 'john@doe.com', 'password' => bcrypt('password'), 'semester_id' => 13, 'department' => 'EEE', 'phone' => '+8801760099824'],
        ['f_name' => 'Jane', 'l_name' => 'Diana', 'email' => 'jane@diana.com', 'password' => bcrypt('password'), 'semester_id' => 7, 'department' => 'BBS', 'phone' => '+8801760099824'],
        ['f_name' => 'Martha', 'l_name' => 'Jane', 'email' => 'martha@jane.com', 'password' => bcrypt('password'), 'semester_id' => 10, 'department' => 'ESS', 'phone' => '+8801760099824'],
        ['f_name' => 'Jeffery', 'l_name' => 'Way', 'email' => 'jeff@way.com', 'password' => bcrypt('password'), 'semester_id' => 9, 'department' => 'SECS', 'phone' => '+8801760099824', 'role' => 'faculty'],
        ['f_name' => 'Abdur', 'l_name' => 'Rahman', 'email' => 'adnan@bracu.ac.bd', 'password' => bcrypt('password'), 'semester_id' => 5, 'department' => 'SECS', 'phone' => '+8801760099824', 'role' => 'faculty'],
        ['f_name' => 'Atef', 'l_name' => 'Haque', 'email' => 'atefth@gmail.com', 'password' => bcrypt('password'), 'semester_id' => 15, 'department' => 'EEE', 'phone' => '+8801760099824', 'role' => 'admin'],
        ];
        $students = [
        ['student_id' => '10101010', 'id' => 1, 'major' => 'EEE'],
        ['student_id' => '00701020', 'id' => 2, 'major' => 'BBS'],
        ['student_id' => '10212020', 'id' => 3, 'major' => 'ES'],
        ];
        $faculties = [
        ['id' => 4, 'faculty_id' => '05603012'],
        ['id' => 5, 'faculty_id' => '04050205'],
        ];
        $admins = [
        ['id' => 6, 'admin_id' => '04030204'],
        ];
        foreach ($users as $key => $user) {
            User::create($user);
        }
        foreach ($students as $key => $student) {
            Student::create($student);
        }
        foreach ($faculties as $key => $faculty) {
            Faculty::create($faculty);
        }
        foreach ($admins as $key => $admin) {
            Admin::create($admin);
        }
    }
}
