<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('weather_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('location_id')->constrained()->onDelete('cascade');
            $table->foreignId('weather_condition_id')->constrained()->onDelete('cascade');
            $table->decimal('temp', 5, 2);
            $table->decimal('feels_like', 5, 2);
            $table->decimal('temp_min', 5, 2);
            $table->decimal('temp_max', 5, 2);
            $table->integer('pressure');
            $table->integer('humidity');
            $table->integer('sea_level');
            $table->integer('grnd_level');
            $table->integer('visibility');
            $table->decimal('wind_speed', 4, 2);
            $table->integer('wind_deg');
            $table->decimal('wind_gust', 4, 2);
            $table->decimal('rain_1h', 5, 2);
            $table->integer('clouds_all');
            $table->integer('dt');
            $table->integer('sunrise');
            $table->integer('sunset');
            $table->integer('timezone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weather_data');
    }
};
