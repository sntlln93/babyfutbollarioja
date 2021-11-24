<?php

namespace App\Http\Controllers\Web;

use App\Models\Game;
use App\Models\Team;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FetchGamesFromTeamController extends Controller
{
    public function get(Team $team)
    {
        $games = Game::query()
            ->with('tournament')
            ->where(function ($query) use ($team) {
                $query->where('local->id', $team->id)
                ->orWhere('away->id', $team->id);
            });

        if (!request()->has('ended')) {
            $games->where(function ($query) {
                $query->whereNull('local_score')
                ->whereNull('away_score');
            });
        } else {
            $games->where(function ($query) {
                $query->whereNotNull('local_score')
                ->whereNotNull('away_score');
            });
        }

        return $games->get();
    }
}
