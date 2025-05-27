<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IntentionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $intentions = [
            ['name' => 'verkenning'],
            ['name' => 'uitroeiing'],
            ['name' => 'toerisme'],
            ['name' => 'contact'],
            ['name' => 'full-stack dev worden']
        ];
        DB::table('Intentions')->insert($intentions);
    }
}
