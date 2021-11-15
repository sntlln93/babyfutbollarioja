<?php

namespace App\Http\Controllers\Web;

use App\Models\Game;
use App\Models\Post;
use App\Models\Event;
use App\Models\Tournament;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Services\ScoreboardRow;

class WebController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->take(5)->get();
        $tournament = Tournament::with('games')->where('is_main', true)->first();

        if (!$tournament) {
            return view('web.welcome.unselected')
            ->with('posts', $posts);
        }
        
        $nextGames = Game::query()
            ->where('tournament_id', $tournament->id)
            ->whereNull('local_score')
            ->whereNull('away_score')
            ->take(10)
            ->get();

        $topScorers = Event::query()
            ->selectRaw('count(type) as goals, player as player, clubs.logo as logo')
            ->join('teams', DB::raw("JSON_EXTRACT(events.player, '$.teamId')"), '=', 'teams.id')
            ->join('clubs', 'clubs.id', '=', 'teams.club_id')
            ->whereIn('game_id', $tournament->games->pluck('id'))
            ->where('type', 'goal')
            ->groupBy('player', 'type', 'logo')
            ->orderByDesc('goals')
            ->take(10)
            ->get();
        
        $recentGames = Game::query()
            ->where('tournament_id', $tournament->id)
            ->orderByDesc('updated_at')
            ->take(3)
            ->get();

        $games = $tournament->games->whereNotNull('local_score')->whereNotNull('away_score');

        foreach ($games as $game) {
            $scoreboard[$game->local->id] =(new ScoreboardRow)->get($game->local, $game->local_score, $game->away_score, $scoreboard[$game->local->id] ?? []);
            $scoreboard[$game->away->id] =(new ScoreboardRow)->get($game->away, $game->away_score, $game->local_score, $scoreboard[$game->away->id] ?? []);
        }

        if ($tournament->type === 'todos contra todos') {
            $view = 'web.welcome.league_selected';
        }
        if ($tournament->type === 'fase de grupos') {
            $view = 'web.welcome.groups_selected';
        }
        if ($tournament->type === 'llaves') {
            $view = 'web.welcome.playoffs_selected';
        }

        return view($view)
            ->with('tournament', $tournament)
            ->with('scoreboard', collect($scoreboard)->sortByDesc('points'))
            ->with('topScorers', $topScorers)
            ->with('recentGames', $recentGames)
            ->with('nextGames', $nextGames)
            ->with('posts', $posts);
    }

    public function about()
    {
        return view('web.about-us');
    }

    public function sponsors()
    {
        return view('web.sponsors');
    }
}
