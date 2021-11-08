<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Game;
use App\Models\Team;
use App\Models\Tournament;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddFixtureToTournamentController extends Controller
{
    private $error_message = [
        'games_empty' => 'El fixture no puede estar vacío.',
        'categories_count_doesnt_match' => 'El número de categorías no coincide con las que tiene este torneo.',
        'dates_count_doesnt_match' => 'El número de fechas cargadas no coincide con las que tiene este torneo.',
        'games_count_doesnt_match' => 'El número de partidos cargados no coincide con los que tiene este torneo.'
    ];

    public function create(Tournament $tournament)
    {
        return view('dashboard.tournaments.add-fixture')->with('tournament', $tournament);
    }

    public function store(Request $request, Tournament $tournament)
    {
        $errors = $this->validateFixture($request, $tournament);
        if (is_array($errors)) {
            return redirect()->back()->withErrors($errors);
        }

        $gamesData = [];
        $games = $request->input('games'); //date, gameOrder, condition
        $categories = $tournament->categories;
        $teams = Team::query()
            ->select('teams.id', 'teams.club_id', 'clubs.name', 'clubs.logo', 'teams.category_id')
            ->join('clubs', 'clubs.id', '=', 'teams.club_id')
            ->whereIn('teams.category_id', collect($categories)->pluck('id'))
            ->get();

        foreach ($games as $category => $dates) {
            foreach ($dates as $date => $games) {
                foreach ($games as $game) {
                    $local = $teams->first(fn ($team) => $team->club_id == $game['local'] && $team->category_id == $category);
                    $away = $teams->first(fn ($team) => $team->club_id == $game['away'] && $team->category_id == $category);

                    array_push($gamesData, [
                        'name' => "$local->name vs $away->name",
                        'group' => "Fecha $date",
                        'tournament_id' => $tournament->id,
                        'local' => $local,
                        'away' => $away,
                        'category_id' => $category,
                    ]);
                }
            }
        }
        Game::insert($gamesData);

        return redirect()->route('tournaments.show', $tournament);
    }

    private function validateFixture($request, $tournament)
    {
        if (!$request->has('games')) {
            return ['message' => $this->error_message['games_empty']];
        }

        $games = $request->input('games');

        $categoriesLength = count($games);
        $clubsLength = count($tournament->clubs);
        $doubleGame = $tournament->double_game + 1;

        $should_be_this_many_categories = count($tournament->categories);
        $should_be_this_many_games_per_date = $clubsLength % 2 === 0 ? $clubsLength / 2 : ($clubsLength - 1) / 2;
        $should_be_this_many_dates = ($clubsLength % 2 === 0)
            ? ($clubsLength - 1) * $doubleGame
            : $clubsLength * $doubleGame;

        if ($should_be_this_many_categories !== $categoriesLength) {
            return ['message' => $this->error_message['categories_count_doesnt_match']];
        }

        //count dates
        $dates_recieved_count = 0;
        $dates_recieved = [];
        foreach ($games as $dates) {
            $dates_recieved_count += count($dates);
            array_push($dates_recieved, $dates);
        }

        if ($should_be_this_many_dates !== $dates_recieved_count) {
            return ['message' => $this->error_message['dates_count_doesnt_match']];
        }
        foreach ($dates_recieved[0] as $games_received) {
            if ($should_be_this_many_games_per_date !== count($games_received)) {
                return ['message' => $this->error_message['games_count_doesnt_match']];
            }
        }

        return true;
    }
}
