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
        Schema::create('alien_sightings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sighting_id');
            $table->bigInteger('aggression_level')->nullable();
            $table->bigInteger('intelligence_level')->nullable();
            $table->string('spoken_language')->nullable();
            $table->string('food_source')->nullable();
            $table->bigInteger('intention_id')->nullable();
            $table->bigInteger('speed')->nullable();
            $table->bigInteger('shape_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alien_sightings');
    }
};
