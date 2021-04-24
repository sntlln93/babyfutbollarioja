<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class FetchCategoriesFromBornDateController extends Controller
{
    public function get(Request $request)
    {
        $validated_born_year = Carbon::parse($request->validate([
            'born_in' => 'required|date'
        ])['born_in'])->format('Y');

        $available_categories =  Category::select('id', 'name')
            ->where('name', '=', $validated_born_year+1)
            ->Orwhere('name', '=', $validated_born_year)
            ->Orwhere('name', '=', $validated_born_year-1)
            ->get();

        return $available_categories;
    }
}
