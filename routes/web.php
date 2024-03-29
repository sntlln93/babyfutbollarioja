<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;

use App\Http\Controllers\Dashboard\ClubController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\PlayerController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\TournamentController;
use App\Http\Controllers\Dashboard\AddClubsToTournamentController;
use App\Http\Controllers\Dashboard\AddFixtureToTournamentController;
use App\Http\Controllers\Dashboard\FetchTeamsFromBornDateController;
use App\Http\Controllers\Dashboard\FetchFilteredGamesFromTournamentController;
use App\Http\Controllers\Dashboard\FetchPlayersFromTeamController;
use App\Http\Controllers\Dashboard\EndGameController;
use App\Http\Controllers\Dashboard\ShowGameController as ShowGameDashboardController;

use App\Http\Controllers\Web\ShowPostController;
use App\Http\Controllers\Web\WebController;
use App\Http\Controllers\Web\ShowRegulations;
use App\Http\Controllers\Web\ShowTournamentController;
use App\Http\Controllers\Web\ShowTeamController;
use App\Http\Controllers\Web\FetchGamesFromTeamController;
use App\Http\Controllers\Web\FetchTeamsByTournamentController;
use App\Http\Controllers\Web\ShowGameController as ShowGameWebController;
use App\Http\Controllers\Web\FetchTournamentScorersController;
use App\Http\Controllers\Web\FetchTournamentFixtureController;

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::get('reset-password', [ResetPasswordController::class, 'showResetForm'])->name('reset');
    Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::name('web.')->group(function () {
    Route::get('/', [WebController::class, 'index'])->name('index');
    Route::get('/sponsors', [WebController::class, 'sponsors'])->name('sponsors');
    Route::get('/about-us', [WebController::class, 'about'])->name('about-us');

    Route::get('/tournaments/{tournament}', [ShowTournamentController::class, 'show'])->name('tournament.show');
    Route::get('/tournaments/{tournament}/teams', [FetchTeamsByTournamentController::class, 'get'])->name('tournament.teams');
    Route::get('/tournaments/{tournament}/scorers', [FetchTournamentScorersController::class, 'get'])->name('tournament.scorers');
    Route::get('/tournaments/{tournament}/fixture', [FetchTournamentFixtureController::class, 'get'])->name('tournament.fixture');

    Route::get('/teams/{team}', [ShowTeamController::class, 'show'])->name('team.show');
    Route::get('/teams/{team}/fixture', [FetchGamesFromTeamController::class, 'get'])->name('team.fixture');

    Route::get('games/{game}', [ShowGameWebController::class, 'show'])->name('game.show');

    Route::get('posts', [ShowPostController::class, 'index'])->name('post.index');
    Route::get('posts/{post}', [ShowPostController::class, 'show'])->name('post.show');

    Route::get('/regulation/general', [ShowRegulations::class, 'general'])->name('general.regulation');
    Route::get('/regulation/disciplinary', [ShowRegulations::class, 'disciplinary'])->name('disciplinary.regulation');
    Route::get('/regulation/game', [ShowRegulations::class, 'game'])->name('game.regulation');
});

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('tournaments', TournamentController::class);
    Route::resource('categories', CategoryController::class)->except('edit', 'update', 'show');
    Route::resource('clubs', ClubController::class);
    Route::resource('posts', PostController::class);
    Route::resource('players', PlayerController::class);

    Route::get('clubs-by-born-date', [FetchTeamsFromBornDateController::class, 'get']);

    Route::get('tournaments/{tournament}/add-clubs/', [AddClubsToTournamentController::class, 'create'])->name('tournaments.add-teams-form');
    Route::post('tournaments/{tournament}/add-clubs/', [AddClubsToTournamentController::class, 'store'])->name('tournaments.add-teams');

    Route::get('tournaments/{tournament}/add-fixture/', [AddFixtureToTournamentController::class, 'create'])->name('tournaments.add-fixture-form');
    Route::post('tournaments/{tournament}/add-fixture/', [AddFixtureToTournamentController::class, 'store'])->name('tournaments.add-fixture');
    
    Route::get('tournaments/{tournament}/filter', [FetchFilteredGamesFromTournamentController::class, 'get'])->name('tournaments.filter');

    Route::get('games/{game}', [ShowGameDashboardController::class, 'show'])->name('games.show');
    Route::get('games/{game}/end', [EndGameController::class, 'form'])->name('games.end-form');
    Route::put('games/{game}/end', [EndGameController::class, 'update'])->name('games.end');

    Route::get('teams/{team}/players', [FetchPlayersFromTeamController::class, 'get'])->name('teams.players');
});
