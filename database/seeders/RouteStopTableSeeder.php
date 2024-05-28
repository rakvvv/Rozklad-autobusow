<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RouteStopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('route_stops')->truncate();
        Schema::enableForeignKeyConstraints();
        

        DB::table('route_stops')->insert([
            ['route_id' => 1, 'stop_id' => 1, 'order' => 1],
            ['route_id' => 1, 'stop_id' => 2, 'order' => 2],
            ['route_id' => 1, 'stop_id' => 3, 'order' => 3],
            ['route_id' => 2, 'stop_id' => 2, 'order' => 1],
            ['route_id' => 2, 'stop_id' => 4, 'order' => 2],
            ['route_id' => 2, 'stop_id' => 5, 'order' => 3],
            ['route_id' => 3, 'stop_id' => 1, 'order' => 1],
            ['route_id' => 3, 'stop_id' => 3, 'order' => 2],
            ['route_id' => 3, 'stop_id' => 5, 'order' => 3],
            ['route_id' => 4, 'stop_id' => 1, 'order' => 1],
            ['route_id' => 4, 'stop_id' => 2, 'order' => 2],
            ['route_id' => 4, 'stop_id' => 4, 'order' => 3],
            ['route_id' => 5, 'stop_id' => 3, 'order' => 1],
            ['route_id' => 5, 'stop_id' => 4, 'order' => 2],
            ['route_id' => 5, 'stop_id' => 5, 'order' => 3],
        ]);
    }
}
