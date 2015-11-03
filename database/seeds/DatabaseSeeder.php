<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(CourseSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(IntervalSeeder::class);
        $this->call(SemesterSeeder::class);
        $this->call(ScheduleSeeder::class);

        Model::reguard();
    }
}
