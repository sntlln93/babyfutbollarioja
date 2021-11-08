<?php

namespace App\Services;

use App\Models\Team;
use App\Models\Category;

class CreateTeamsFromClubService
{
    public function create($categoriesIds, $club_id)
    {
        $categoriesIds = $categoriesIds ?? Category::active()->pluck('id');

        foreach ($categoriesIds as $category) {
            Team::create([
                'club_id' => $club_id,
                'category_id' => $category
            ]);
        }
    }
}
