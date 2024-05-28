<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;
use Illuminate\Support\Facades\Schema;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        City::truncate();
        Schema::enableForeignKeyConstraints();

        City::insert([
            ['name' => 'Warszawa', 'img' => 'cities/warszawa.jpg'],
            ['name' => 'Kraków', 'img' => 'cities/krakow.jpg'],
            ['name' => 'Wrocław', 'img' => 'cities/wroclaw.jpg'],
            ['name' => 'Poznań', 'img' => 'cities/poznan.jpg'],
            ['name' => 'Gdańsk', 'img' => 'cities/gdansk.jpg'],
            ['name' => 'Łódź', 'img' => 'cities/lodz.jpg'],
            ['name' => 'Lublin', 'img' => 'cities/lublin.jpg'],
            ['name' => 'Katowice', 'img' => 'cities/katowice.jpg'],
        ]);
    }
}
