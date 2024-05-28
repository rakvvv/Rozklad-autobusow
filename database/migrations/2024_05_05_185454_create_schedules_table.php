<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('route_id')->default(0);;
            $table->string('bus_number');
            $table->dateTime('departure_time');
            $table->dateTime('arrival_time');
            $table->decimal('ticket_price', 10, 2);
            $table->timestamps();
            $table->foreign('route_id')->references('id')->on('routes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('schedules');
    }
};