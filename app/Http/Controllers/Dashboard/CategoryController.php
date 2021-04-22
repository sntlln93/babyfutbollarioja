<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(20);

        return view('dashboard.categories.index')->with('categories', $categories);
    }

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store(Request $request)
    {
        $category = $request->validate([
            'name' => 'required|unique:categories|digits:4|integer|min:1990|max:' . Carbon::now()->format('Y'),
        ])['name'];

        Category::create([
            'name' => $category
        ]);

        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
