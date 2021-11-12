<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Game;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EndGameController extends Controller
{
    public function form(Game $game)
    {
        return view('dashboard.games.end-game')->with('game', $game);
    }

    public function update(Request $request, Game $game)
    {
        $events = $request->all()['events'];
        $evts = [];
        $localScore = 0;
        $awayScore = 0;

        foreach ($events as $event) {
            $e = json_decode($event);
            
            if ($e->type == 'goal') {
                $localScore += $e->team == $game->local->id ? 1 : 0;
                $awayScore += $e->team == $game->away->id ? 1 : 0;
            }

            array_push($evts, [
                'type' => $e->type,
                'player' => json_encode($e->player),
                'minute' => $e->minute,
                'game_id' => $game->id
            ]);
        }

        DB::transaction(function () use ($evts, $game, $localScore, $awayScore) {
            Event::insert($evts);
            $game->update([
                'local_score' => $localScore,
                'away_score' => $awayScore,
                'status' => 'ended'
            ]);
        });
        
        return redirect()->route('tournaments.show', ['tournament' => $game->tournament_id]);
    }
}
