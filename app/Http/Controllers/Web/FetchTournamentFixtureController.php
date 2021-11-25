<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Tournament;

class FetchTournamentFixtureController extends Controller
{
    public function get(Tournament $tournament)
    {
        return $tournament->games;
    }
}
