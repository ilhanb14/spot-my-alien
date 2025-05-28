<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShapeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alienShapes = [
            ['name' => 'humanoide', 'image_path' => 'path'],
            ['name' => 'anthropomorphisch', 'image_path' => 'path'],
            ['name' => 'plant', 'image_path' => 'path'],
            ['name' => 'gasvorm', 'image_path' => 'path'],
        ];
        DB::table('alien_shapes')->insert($alienShapes);

        $ufoShapes = [
            ['name' => 'kerkbel', 'image_path' => 'path'],
            ['name' => 'cigaar', 'image_path' => 'path'],
            ['name' => 'massimo-vormig', 'image_path' => 'path']
        ];
        DB::table('ufo_shapes')->insert($ufoShapes);
    }
}
