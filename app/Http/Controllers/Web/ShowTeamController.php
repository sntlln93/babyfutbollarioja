<?php

namespace App\Http\Controllers\Web;

use App\Models\Team;
use App\Http\Controllers\Controller;

class ShowTeamController extends Controller
{
    public function show(Team $team)
    {
        $stats = [
            'gp' => 124,
            'gw' => 124,
            'gl' => 124,
            'gd' => 124,
            'gf' => 124,
            'ga' => 124,
        ];

        return view('web.teams.show')->with('team', $team)->with('stats', $stats);
    }
}
