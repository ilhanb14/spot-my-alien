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
        Schema::create('abduction_sightings', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->string('duration')->nullable();
            $table->string('examination')->nullable();
            $table->boolean('returned');
            $table->boolean('live_subject');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abduction_sightings');
    }
};
