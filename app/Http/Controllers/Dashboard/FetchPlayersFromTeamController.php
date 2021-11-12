<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Team;
use App\Http\Controllers\Controller;

class FetchPlayersFromTeamController extends Controller
{
    public function get(Team $team)
    {
        return $team->players;
    }
}
