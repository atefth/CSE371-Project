<?php

use Illuminate\Database\Seeder;

class IntervalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $intervals = [
        ['start' => '08:00', 'end' => '09:20', 'duration' => 1.5, 'day' => 'Sunday'],
        ['start' => '09:30', 'end' => '10:50', 'duration' => 1.5, 'day' => 'Sunday'],
        ['start' => '11:00', 'end' => '12:20', 'duration' => 1.5, 'day' => 'Sunday'],
        ['start' => '12:30', 'end' => '13:50', 'duration' => 1.5, 'day' => 'Sunday'],
        ['start' => '14:00', 'end' => '15:20', 'duration' => 1.5, 'day' => 'Sunday'],
        ['start' => '15:30', 'end' => '16:50', 'duration' => 1.5, 'day' => 'Sunday'],
        ['start' => '08:00', 'end' => '09:20', 'duration' => 1.5, 'day' => 'Monday'],
        ['start' => '09:30', 'end' => '10:50', 'duration' => 1.5, 'day' => 'Monday'],
        ['start' => '11:00', 'end' => '12:20', 'duration' => 1.5, 'day' => 'Monday'],
        ['start' => '12:30', 'end' => '13:50', 'duration' => 1.5, 'day' => 'Monday'],
        ['start' => '14:00', 'end' => '15:20', 'duration' => 1.5, 'day' => 'Monday'],
        ['start' => '15:30', 'end' => '16:50', 'duration' => 1.5, 'day' => 'Monday'],
        ['start' => '08:00', 'end' => '09:20', 'duration' => 1.5, 'day' => 'Tuesday'],
        ['start' => '09:30', 'end' => '10:50', 'duration' => 1.5, 'day' => 'Tuesday'],
        ['start' => '11:00', 'end' => '12:20', 'duration' => 1.5, 'day' => 'Tuesday'],
        ['start' => '12:30', 'end' => '13:50', 'duration' => 1.5, 'day' => 'Tuesday'],
        ['start' => '14:00', 'end' => '15:20', 'duration' => 1.5, 'day' => 'Tuesday'],
        ['start' => '15:30', 'end' => '16:50', 'duration' => 1.5, 'day' => 'Tuesday'],
        ['start' => '08:00', 'end' => '09:20', 'duration' => 1.5, 'day' => 'Wednesday'],
        ['start' => '09:30', 'end' => '10:50', 'duration' => 1.5, 'day' => 'Wednesday'],
        ['start' => '11:00', 'end' => '12:20', 'duration' => 1.5, 'day' => 'Wednesday'],
        ['start' => '12:30', 'end' => '13:50', 'duration' => 1.5, 'day' => 'Wednesday'],
        ['start' => '14:00', 'end' => '15:20', 'duration' => 1.5, 'day' => 'Wednesday'],
        ['start' => '15:30', 'end' => '16:50', 'duration' => 1.5, 'day' => 'Wednesday'],
        ['start' => '08:00', 'end' => '09:20', 'duration' => 1.5, 'day' => 'Thursday'],
        ['start' => '09:30', 'end' => '10:50', 'duration' => 1.5, 'day' => 'Thursday'],
        ['start' => '11:00', 'end' => '12:20', 'duration' => 1.5, 'day' => 'Thursday'],
        ['start' => '12:30', 'end' => '13:50', 'duration' => 1.5, 'day' => 'Thursday'],
        ['start' => '14:00', 'end' => '15:20', 'duration' => 1.5, 'day' => 'Thursday'],
        ['start' => '15:30', 'end' => '16:50', 'duration' => 1.5, 'day' => 'Thursday'],
        ];
        foreach ($intervals as $key => $interval) {
            Interval::create($interval);
        }
    }
}
