<?php

namespace Database\Factories;

use App\Models\Sighting;
use Illuminate\Container\Attributes\DB as AttributesDB;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sighting>
 */
class SightingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => fake()->randomElement(['groot en groen mette wa armen', 'nen octopus heeft hallo tegen me gezegd', 'mijn buurman spreekt opeens frans en wilt niet meer werken', 'coole grote hond met tentakels gezien']),
            'date_time' => fake()->dateTimeBetween('-1 year', now()),
            'location' => fake()->city(),
            'created_at' => fake()->dateTimeBetween('-1 year', now()),
            'updated_at' => now(),
            'status_id' => rand(1, 3),
            'type_id' => rand(1, 3),
            'user_id' => fake()->randomElement(DB::table('users')->pluck('id')->toArray())
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Sighting $sighting) {
            switch ($sighting->type_id) {
                case 1:
                    DB::table('ufo_sightings')->insert([
                        'sighting_id' => $sighting->id,
                        'speed' => rand(0, 10),
                        'color' => fake()->randomElement(['rood', 'groen', 'blauw', 'grijs', null]),
                        'shape_id' => fake()->randomElement(DB::table('ufo_shapes')->pluck('id')->toArray())
                    ]);
                    break;
                case 2:
                    DB::table('abduction_sightings')->insert([
                        'sighting_id' => $sighting->id,
                        'subject' => fake()->randomElement(['den hond', 'den buurman','ons oma', 'een werkende waal']),
                        'returned' => rand(0,1),
                        'live_subject' => rand(0,1),
                        'duration' => fake()->randomElement(['een dag', 'een uur', 'een jaar', 'een maand']),
                        'abductionstate_id' => rand(1,3),
                        'examination' => fake()->randomElement([null, 'anaal', 'genitaal', 'oraal', 'beetje geluld']),
                    ]);
                case 3 :
                    DB::table('alien_sightings')->insert([
                        'sighting_id' => $sighting->id,
                        'aggression_level' => rand(0,10),
                        'intelligence_level' => rand(0,10),
                        'spoken_language' => fake()->randomElement(['frans', 'nederland', 'glipglorpiaans', 'engels', 'verstond het niet']),
                        'food_source' => fake()->randomElement(['hout', 'vlees', 'mens', 'fruit']),
                        'intention_id' => fake()->randomElement(DB::table('intentions')->pluck('id')->toArray()),
                        'speed' => rand(0,10),
                        'shape_id' => fake()->randomElement(DB::table('alien_shapes')->pluck('id')->toArray())
                    ]);
                default:
                    break;
            };
        });
    }
}
