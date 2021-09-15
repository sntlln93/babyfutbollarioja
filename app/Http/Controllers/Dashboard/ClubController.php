<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Club;
use App\Models\Image;
use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services\CreateImageService;
use App\Services\CreatePhoneService;
use App\Services\CreateTeamsFromClubService;
use App\Services\DeleteImageFromDiskService;

class ClubController extends Controller
{
    public function index()
    {
        $clubs = Club::with('teams')->paginate(20);

        return view('dashboard.clubs.index')->with('clubs', $clubs);
    }

    public function create()
    {
        return view('dashboard.clubs.create');
    }

    public function store(Request $request)
    {
        $validatedClub = $request->validate([
            'name' => 'required|unique:clubs,name',
            'field_description' => 'required',
            'shield' => 'required|mimes:png,svg',
            'area_code' => 'required|integer|digits_between:3,4',
            'number' => 'required|integer|digits_between:5,7',
        ]);

        DB::transaction(function () use ($validatedClub) {
            $club = Club::create([
                'name' => $validatedClub['name'],
                'field_description' => $validatedClub['field_description'],
            ]);

            (new CreateImageService)->create($club, $validatedClub['shield']);
            (new CreateTeamsFromClubService)->create($club->id);
            (new CreatePhoneService)->create($club, $validatedClub['area_code'], $validatedClub['number']);
        });

        return redirect()->route('clubs.index');
    }

    public function show(Club $club)
    {
        return view('dashboard.clubs.show')->with('club', $club);
    }

    public function edit(Club $club)
    {
        return view('dashboard.clubs.edit')->with('club', $club);
    }

    public function update(Request $request, Club $club)
    {
        $validatedClub = $request->validate([
            'name' => 'required',
            'field_description' => 'required',
        ]);

        $club->update([
            'name' => $validatedClub['name'],
            'field_description' => $validatedClub['field_description'],
        ]);

        return redirect()->route('clubs.index');
    }

    public function destroy(Club $club)
    {
        DB::transaction(function () use ($club) {
            (new DeleteImageFromDiskService)->delete($club->image->path);
            $club->phone()->delete();
            $club->delete();
        });

        return redirect()->route('clubs.index');
    }
}
