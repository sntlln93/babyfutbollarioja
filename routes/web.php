<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\WebController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Web\ShowPostController;
use App\Http\Controllers\Dashboard\ClubController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\PlayerController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Web\ShowTournamentController;
use App\Http\Controllers\Dashboard\TournamentController;
use App\Http\Controllers\Dashboard\FetchCategoriesFromBornDateController;

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::get('reset-password', [ResetPasswordController::class, 'showResetForm'])->name('reset');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::name('web.')->group(function () {
    Route::get('/', [WebController::class, 'index'])->name('index');
    Route::get('/sponsors', [WebController::class, 'sponsors'])->name('sponsors');
    Route::get('/about-us', [WebController::class, 'about'])->name('about-us');

    Route::get('/tournaments', [ShowTournamentController::class, 'index'])->name('tournaments');
    Route::get('/tournaments/{tournament}', [ShowTournamentController::class, 'show'])->name('tournament');

    Route::get('posts', [ShowPostController::class, 'index'])->name('posts');
    Route::get('posts/{post}', [ShowPostController::class, 'show'])->name('post');
});

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('tournaments', TournamentController::class);
    Route::resource('categories', CategoryController::class)->except('edit', 'update', 'show');
    Route::resource('clubs', ClubController::class);
    Route::resource('players', PlayerController::class);
    Route::resource('posts', PostController::class);
    Route::post('players-category', [FetchCategoriesFromBornDateController::class, 'get']);
});
