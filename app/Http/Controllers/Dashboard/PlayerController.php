<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Club;
use App\Models\Team;
use App\Models\Player;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services\CreateImageService;
use App\Services\DeleteImageFromDiskService;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::paginate(20);
        return view('dashboard.players.index')->with('players', $players);
    }

    public function create()
    {
        $clubs = Club::all();

        return view('dashboard.players.create')
            ->with('clubs', $clubs);
    }

    public function store(Request $request)
    {
        // dd($request);
        $validatedPlayer = $request->validate([
            'lastname' => 'required',
            'name' => 'required',
            'dni' => 'required|numeric',
            'born_in' => 'required|date',
            'photo' => 'sometimes|mimes:jpg,jpeg',
            'club_id' => 'required',
            'category_id' => 'required',
        ]);

        DB::transaction(function () use ($validatedPlayer) {
            $base_path = Str::afterLast(Str::lower(get_class(new Club)), '\\');

            $player = Player::create([
                'lastname' => $validatedPlayer['lastname'],
                'name' => $validatedPlayer['name'],
                'born_in' => Carbon::parse($validatedPlayer['born_in']),
                'dni' => $validatedPlayer['dni'],
                'photo' => $validatedPlayer['photo']->store($base_path, 'public'),
            ]);

            $team_id = Team::select('id')
                ->where('category_id', $validatedPlayer['category_id'])
                ->where('club_id', $validatedPlayer['club_id'])
                ->first();

            $player->teams()->sync($team_id);
        });

        return redirect()->route('players.index');
    }

    public function edit(Player $player)
    {
        return view('dashboard.players.edit')->with('player', $player);
    }

    public function update(Player $player, Request $request)
    {
        $validatedPlayer = $request->validate([
            'lastname' => 'required',
            'name' => 'required',
            'dni' => 'required|numeric',
        ]);

        $player->update($validatedPlayer);

        return redirect()->route('players.index');
    }

    public function destroy(Player $player)
    {
        DB::transaction(function () use ($player) {
            (new DeleteImageFromDiskService)->delete($player->photo);
            $player->image->delete();
            $player->teams()->detach();
            $player->delete();
        });

        return redirect()->route('players.index');
    }

    public function show(Player $player)
    {
        return view('dashboard.players.show')->with('player', $player);
    }
}
