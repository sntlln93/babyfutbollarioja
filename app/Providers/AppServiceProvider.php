<?php

namespace App\Providers;

use App\Models\Tournament;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::defaultView('pagination::bootstrap-4');

        View::composer('web.layouts.menu', function ($view) {
            $tournaments = Tournament::where('is_public', true)->get();
            $view->with('tournaments', $tournaments);
        });
    }
}
