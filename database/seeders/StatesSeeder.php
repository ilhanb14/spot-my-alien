<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            ['name' => 'kapot'],
            ['name' => 'beschadigd'],
            ['name' => 'veilig']
        ];

        DB::table('abduction_states')->insert($states);
    }
}
