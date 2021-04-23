<?php

namespace App\Services;

use App\Models\Team;
use App\Models\Category;

class CreateTeamsFromClubService
{
    public function create($club_id)
    {
        $categories = Category::where('is_active', true)->pluck('id');

        foreach ($categories as $category) {
            Team::create([
                'club_id' => $club_id,
                'category_id' => $category
            ]);
        }
    }
}
