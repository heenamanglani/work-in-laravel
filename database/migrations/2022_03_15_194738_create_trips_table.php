<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->string('trips_id')->unique();
            $table->string('user_uuid');
            $table->string('scooter_uuid');
            $table->string('event_type');
            $table->dateTime('ride_start_time')->nullable();
            $table->dateTime('ride_finish_time')->nullable();
            $table->double('start_lat',15, 8)->default(0)->nullable();
            $table->double('start_long', 15, 8)->default(0)->nullable();
            $table->double('finish_lat',15, 8)->default(0)->nullable();
            $table->double('finish_long', 15, 8)->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trips');
    }
};
