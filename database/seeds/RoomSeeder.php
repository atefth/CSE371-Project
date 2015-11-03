<?php

use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rooms = [
        ['name' => 'UB10103', 'building' => 1, 'floor' => 1, 'seats' => 40],
        ['name' => 'UB10102', 'building' => 1, 'floor' => 1, 'seats' => 40],
        ['name' => 'UB10101', 'building' => 1, 'floor' => 1, 'seats' => 40],
        ['name' => 'UB10201', 'building' => 1, 'floor' => 2, 'seats' => 40],
        ['name' => 'UB10202', 'building' => 1, 'floor' => 2, 'seats' => 40],
        ['name' => 'UB10203', 'building' => 1, 'floor' => 2, 'seats' => 40],
        ['name' => 'UB20301', 'building' => 2, 'floor' => 3, 'seats' => 40],
        ['name' => 'UB20302', 'building' => 2, 'floor' => 3, 'seats' => 40],
        ['name' => 'UB20303', 'building' => 2, 'floor' => 3, 'seats' => 40],
        ['name' => 'UB40701', 'building' => 4, 'floor' => 7, 'seats' => 40],
        ['name' => 'UB40702', 'building' => 4, 'floor' => 7, 'seats' => 40],
        ['name' => 'UB40703', 'building' => 4, 'floor' => 7, 'seats' => 40],
        ['name' => 'UB30501', 'building' => 3, 'floor' => 5, 'seats' => 40],
        ['name' => 'UB30502', 'building' => 3, 'floor' => 5, 'seats' => 40],
        ['name' => 'UB30503', 'building' => 3, 'floor' => 5, 'seats' => 40],
        ['name' => 'UB21310', 'building' => 2, 'floor' => 13, 'seats' => 40],
        ['name' => 'UB21311', 'building' => 2, 'floor' => 13, 'seats' => 40],
        ['name' => 'UB21312', 'building' => 2, 'floor' => 13, 'seats' => 40],
        ];
        foreach ($rooms as $key => $room) {
            Room::create($room);
        }
    }
}
