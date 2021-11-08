<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Club;
use App\Models\Game;
use App\Models\Category;
use App\Models\Tournament;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTournamentRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services\CreateImageService;

class TournamentController extends Controller
{
    public function index()
    {
        $tournaments = Tournament::paginate(10);

        return view('dashboard.tournaments.index')->with('tournaments', $tournaments);
    }

    public function create()
    {
        $categories = Category::where('is_active', true)->get();

        return view('dashboard.tournaments.create')
            ->with('categories', $categories);
    }

    public function store(StoreTournamentRequest $request)
    {
        $validatedData = $request->validated();

        DB::transaction(function () use ($validatedData) {
            if ($validatedData['is_main']) {
                Tournament::query()->update(['is_main' => false]);
            }

            $validatedData['photo'] = (new CreateImageService)->create((new Tournament), $validatedData['photo']);
            $validatedData['categories'] = Category::find($validatedData['categories'])->map(fn ($category) => ['id' => $category->id, 'name' => $category->name]);

            Tournament::create($validatedData);
        });

        return redirect()->route('tournaments.index');
    }

    public function show(Tournament $tournament)
    {
        $games = Game::where('tournament_id', $tournament->id)->with('category')->get();

        $dates = $games->map(fn ($game) => $game->group)->unique()->values();

        return view('dashboard.tournaments.show')
            ->with('tournament', $tournament)
            ->with('dates', $dates)
            ->with('games', $games);
    }

    public function edit(Tournament $tournament)
    {
        return view('dashboard.tournaments.edit')->with('tournament', $tournament);
    }

    public function update(Request $request, Tournament $tournament)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $tournament->update([
            'name' => $validatedData['name'],
        ]);

        return redirect()->route('tournaments.show', ['tournament' => $tournament->id]);
    }

    public function destroy(Tournament $tournament)
    {
        $tournament->delete();

        return redirect()->route('tournaments.index');
    }
}
