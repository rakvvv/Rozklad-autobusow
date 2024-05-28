<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Route;
use Illuminate\Support\Facades\Schema;

class RoutesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Route::truncate();
        Schema::enableForeignKeyConstraints();

        Route::insert([
            ['distance' => 300],
            ['distance' => 150],
            ['distance' => 220],
            ['distance' => 350],
            ['distance' => 280],
        ]);
    }
}
