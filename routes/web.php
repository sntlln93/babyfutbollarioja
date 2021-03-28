<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\WebController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [WebController::class, 'index'])->name('index');
Route::get('/sponsors', [WebController::class, 'sponsors'])->name('sponsors');
Route::get('/about-us', [WebController::class, 'about'])->name('about-us');

Route::get('/tournaments/{id}/', function ($id) { return back(); })->name('tournaments.show');
Route::get('/tournaments', function() { return back(); })->name('tournaments.index');

Route::get('/posts/{id}/', function ($id) { return back(); })->name('posts.show');

