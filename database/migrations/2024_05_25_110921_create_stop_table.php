<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('stops', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('route_stops', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('route_id');
            $table->unsignedBigInteger('stop_id');
            $table->integer('order');
            $table->timestamps();

            $table->foreign('route_id')->references('id')->on('routes')->onDelete('cascade');
            $table->foreign('stop_id')->references('id')->on('stops')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('route_stops');
        Schema::dropIfExists('stops');
    }
};
