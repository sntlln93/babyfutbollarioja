<?php

namespace App\Http\Controllers\Web;

use App\Models\Team;
use App\Models\Tournament;
use App\Http\Controllers\Controller;

class FetchTeamsByTournamentController extends Controller
{
    public function get(Tournament $tournament)
    {
        $teams = Team::with('club', 'category')
            ->whereIn('club_id', collect($tournament->clubs)->pluck('id'))
            ->whereIn('category_id', collect($tournament->categories)->pluck('id'))
            ->get();

        return $teams;
    }
}
