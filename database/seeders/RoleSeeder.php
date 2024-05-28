<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        Schema::withoutForeignKeyConstraints(function () {
            DB::table('roles')->truncate();
        });

        DB::table('roles')->insert([
            ['name' => 'admin'],
            ['name' => 'user'],
        ]);
    }
}
