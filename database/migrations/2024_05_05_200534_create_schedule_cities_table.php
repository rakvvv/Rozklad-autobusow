<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('schedule_cities', function (Blueprint $table) {
            $table->unsignedBigInteger('schedule_id');
            $table->unsignedBigInteger('city_id');
            $table->boolean('is_departure');

            $table->primary(['schedule_id', 'city_id']);
            $table->foreign('schedule_id')->references('id')->on('schedules')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('schedule_cities');
    }
};
