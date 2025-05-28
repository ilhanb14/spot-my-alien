<?php

namespace Database\Seeders;

use App\Models\AlienSighting;
use App\Models\Sighting;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        

        $this->call([
            UserSeeder::class,
            StatesSeeder::class,
            IntentionSeeder::class,
            StatusSeeder::class,
            ShapeSeeder::class,
            TypeSeeder::class
        ]);

        Sighting::factory()->count(10)->create();

        // Sighting::factory()->count(10)->alientype()->create();
        
    }
}
