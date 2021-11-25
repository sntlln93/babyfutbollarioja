<?php

namespace App\Http\Controllers\Web;

use App\Models\Event;
use App\Models\Tournament;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FetchTournamentScorersController extends Controller
{
    public function get(Tournament $tournament)
    {
        $topScorers = Event::query()
            ->selectRaw('count(type) as goals, player as player, clubs.name as team, clubs.logo as logo')
            ->join('teams', DB::raw("JSON_EXTRACT(events.player, '$.teamId')"), '=', 'teams.id')
            ->join('clubs', 'clubs.id', '=', 'teams.club_id')
            ->whereIn('game_id', $tournament->games->pluck('id'))
            ->where('type', 'goal')
            ->groupBy('player', 'type', 'logo', 'team')
            ->orderByDesc('goals')
            ->get();

        return response()->json($topScorers);
    }
}
