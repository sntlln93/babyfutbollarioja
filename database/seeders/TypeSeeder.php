<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'type' => 'todos contra todos',
            'round_trip' => true
        ]);

        Type::create([
            'type' => 'todos contra todos',
            'round_trip' => false
        ]);

        Type::create([
            'type' => 'fase de grupos',
            'round_trip' => true
        ]);

        Type::create([
            'type' => 'fase de grupos',
            'round_trip' => false
        ]);

        Type::create([
            'type' => 'llaves',
            'round_trip' => true
        ]);

        Type::create([
            'type' => 'llaves',
            'round_trip' => false
        ]);
    }
}
