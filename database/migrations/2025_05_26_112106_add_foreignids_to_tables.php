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
        Schema::table('sightings', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
        });

        Schema::table('ufo_sightings', function (Blueprint $table) {
            $table->foreignId('sighting_id')->constrained('sightings')->cascadeOnDelete();
        });

        Schema::table('alien_sightings', function (Blueprint $table) {
            $table->foreignId('sighting_id')->constrained('sightings')->cascadeOnDelete();
            $table->foreignId('shape_id')->constrained('ufo_shapes')->cascadeOnDelete();
        });

        Schema::table('abduction_sightings', function (Blueprint $table) {
            $table->foreignId('abduction_state_id')->constrained('states')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sightings', function (Blueprint $table) {
            $table->dropConstrainedForeignId('user_id');
        });
        Schema::table('ufo_sightings', function (Blueprint $table) {
            $table->dropConstrainedForeignId('sighting_id');
        });

        Schema::table('alien_sightings', function (Blueprint $table) {
            $table->dropConstrainedForeignId('sighting_id');
            $table->dropConstrainedForeignId('shape_id');
        });

        Schema::table('abduction_sightings', function(Blueprint $table){
            $table->dropConstrainedForeignId('state_id');
        });
    }
};
