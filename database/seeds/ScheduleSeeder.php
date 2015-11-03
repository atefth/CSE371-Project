<?php

use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schedules = [
        ['c_id' => '1', 'i_id' => 1, 'r_id' => 1, 'u_id' => 1, 's_id' => 28],
        ['c_id' => '1', 'i_id' => 2, 'r_id' => 2, 'u_id' => 2, 's_id' => 28],
        ['c_id' => '1', 'i_id' => 3, 'r_id' => 3, 'u_id' => 3, 's_id' => 28],
        ['c_id' => '2', 'i_id' => 4, 'r_id' => 4, 'u_id' => 1, 's_id' => 28],
        ['c_id' => '2', 'i_id' => 5, 'r_id' => 5, 'u_id' => 2, 's_id' => 28],
        ['c_id' => '2', 'i_id' => 1, 'r_id' => 6, 'u_id' => 3, 's_id' => 29],
        ['c_id' => '3', 'i_id' => 2, 'r_id' => 7, 'u_id' => 1, 's_id' => 29],
        ['c_id' => '3', 'i_id' => 3, 'r_id' => 8, 'u_id' => 2, 's_id' => 29],
        ['c_id' => '3', 'i_id' => 4, 'r_id' => 9, 'u_id' => 3, 's_id' => 29],
        ['c_id' => '4', 'i_id' => 5, 'r_id' => 10, 'u_id' => 1, 's_id' => 30],
        ['c_id' => '4', 'i_id' => 1, 'r_id' => 11, 'u_id' => 2, 's_id' => 30],
        ['c_id' => '4', 'i_id' => 2, 'r_id' => 12, 'u_id' => 3, 's_id' => 30],
        ['c_id' => '5', 'i_id' => 3, 'r_id' => 13, 'u_id' => 1, 's_id' => 31],
        ['c_id' => '5', 'i_id' => 4, 'r_id' => 14, 'u_id' => 2, 's_id' => 31],
        ['c_id' => '5', 'i_id' => 5, 'r_id' => 15, 'u_id' => 3, 's_id' => 31],
        ];
        foreach ($schedules as $key => $schedule) {
            DB::table('schedules')->insert($schedule);
        }
    }
}
