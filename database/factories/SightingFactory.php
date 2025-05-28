<?php

namespace Database\Factories;

use App\Models\Intention;
use App\Models\Sighting;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AlienSighting>
 */
class SightingFactory extends Factory
{
    protected $model = Sighting::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => 'Default description',
            'date_time' => now(),
            'location' => 'Unknown',
            'status_id' => 1, // Must exist in statuses table
            'user_id' => 1, // Must exist in users table
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    public function configure() {}

    public function alienType()
    {
        return $this->state(function (array $attributes) {
            return [
                'description' => fake()->randomElement(['groot en groen mette wa armen', 'nen octopus heeft hallo tegen me gezegd', 'mijn buurman spreekt opeens frans en wilt niet meer werken', 'coole grote hond met tentakels gezien']),
                'date_time' => fake()->dateTimeBetween('-1 year', now()),
                'location' => fake()->locale(),
                'created_at' => fake()->dateTimeBetween('-1 year', now()),
                'updated_at' => now(),
                'status_id' => rand(1, 3),
                'user_id' => fake()->randomElement(DB::table('users')->pluck('id')->toArray())
            ];
        })->afterCreating(function (Sighting $sighting) {
            DB::table('alien_sighting')->insert([
                'sighting_id' => $sighting->id,
                'aggression_level' => rand(0, 10),
                'intelligence_level' => rand(0, 10),
                'food_source' => null,
                'spoken_language' => null,
                'intention_id' => fake()->randomElement(DB::table('intentions')->pluck('id')->toArray()),
                'speed' => rand(0, 10),
                'shape_id' => fake()->randomElement(DB::table('alien_shapes')->pluck('id')->toArray())
            ]);
        });
    }
}
