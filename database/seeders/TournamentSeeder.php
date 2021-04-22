<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\Category;
use App\Models\Tournament;
use Illuminate\Database\Seeder;

class TournamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tournament = Tournament::create([
            'type_id' => Type::all()->random()->id,
            'name' => 'Torneo Federal'
        ]);

        $tournament->categories()->sync(Category::pluck('id'));
    }
}
