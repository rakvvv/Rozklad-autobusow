<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Schedule;
use Illuminate\Support\Facades\Schema;

class SchedulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Schedule::truncate();
        Schema::enableForeignKeyConstraints();

        Schedule::insert([
            [
                'route_id' => 1,
                'bus_number' => 'A123',
                'departure_time' => '2024-06-01 08:00:00',
                'arrival_time' => '2024-06-01 12:00:00',
                'ticket_price' => 50.00
            ],
            [
                'route_id' => 2,
                'bus_number' => 'B456',
                'departure_time' => '2024-06-02 09:00:00',
                'arrival_time' => '2024-06-02 11:30:00',
                'ticket_price' => 30.00
            ],
            [
                'route_id' => 3,
                'bus_number' => 'C789',
                'departure_time' => '2024-06-03 10:00:00',
                'arrival_time' => '2024-06-03 14:00:00',
                'ticket_price' => 45.00
            ],
            [
                'route_id' => 4,
                'bus_number' => 'D012',
                'departure_time' => '2024-06-04 11:00:00',
                'arrival_time' => '2024-06-04 16:00:00',
                'ticket_price' => 60.00
            ],
            [
                'route_id' => 5,
                'bus_number' => 'E345',
                'departure_time' => '2024-06-05 12:00:00',
                'arrival_time' => '2024-06-05 15:30:00',
                'ticket_price' => 40.00
            ],
        ]);
    }
}
