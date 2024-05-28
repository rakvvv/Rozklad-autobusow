<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stop;
use Illuminate\Support\Facades\Schema;

class StopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Stop::truncate();
        Schema::enableForeignKeyConstraints();

        Stop::insert([
            ['name' => 'Przystanek 1'],
            ['name' => 'Przystanek 2'],
            ['name' => 'Przystanek 3'],
            ['name' => 'Przystanek 4'],
            ['name' => 'Przystanek 5'],
        ]);
    }
}
