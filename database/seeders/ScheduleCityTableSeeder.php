<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ScheduleCityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('schedule_cities')->truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('schedule_cities')->insert([
            ['schedule_id' => 1, 'city_id' => 1, 'is_departure' => true],
            ['schedule_id' => 1, 'city_id' => 2, 'is_departure' => false],
            ['schedule_id' => 2, 'city_id' => 3, 'is_departure' => true],
            ['schedule_id' => 2, 'city_id' => 4, 'is_departure' => false],
            ['schedule_id' => 3, 'city_id' => 5, 'is_departure' => true],
            ['schedule_id' => 3, 'city_id' => 6, 'is_departure' => false],
            ['schedule_id' => 4, 'city_id' => 7, 'is_departure' => true],
            ['schedule_id' => 4, 'city_id' => 8, 'is_departure' => false],
            ['schedule_id' => 5, 'city_id' => 2, 'is_departure' => true],
            ['schedule_id' => 5, 'city_id' => 4, 'is_departure' => false],
        ]);
    }
}
