<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => "2007"]);
        Category::create(['name' => "2008"]);
        Category::create(['name' => "2009"]);
    }
}
