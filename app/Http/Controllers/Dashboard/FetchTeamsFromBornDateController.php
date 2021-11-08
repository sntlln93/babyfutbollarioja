<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class FetchTeamsFromBornDateController extends Controller
{
    public function get(Request $request)
    {
        //regex to validate the date using this format AAAA-MM-DD
        if (!preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/', $request->born_date)) {
            return response(404)->json([
                'status' => 'error',
                'message' => 'Invalid date format. Please use this format: AAAA-MM-DD'
            ]);
        }

        $birth_year = Carbon::parse($request->born_date)->format('Y');
        
        $teams = Category::query()
            ->select('categories.name as category', 'teams.id as id', 'clubs.name as name', 'categories.years as years')
            ->join('teams', 'teams.category_id', '=', 'categories.id')
            ->join('clubs', 'clubs.id', '=', 'teams.club_id')
            ->where('is_active', true)
            ->get()
            ->filter(fn ($team) => in_array($birth_year, $team->years) || $team->years == null)
            ->map(fn ($team) => [
                'id' => $team->id,
                'category' => $team->category,
                'name' => $team->name
            ]);

        return $teams;
        ;
    }
}
