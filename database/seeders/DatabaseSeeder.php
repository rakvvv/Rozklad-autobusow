<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            RoutesTableSeeder::class,
            CitiesTableSeeder::class,
            SchedulesTableSeeder::class,
            StopTableSeeder::class,
            RouteStopTableSeeder::class,
            UserSeeder::class,
            ScheduleCityTableSeeder::class,
        ]);
    }
}
