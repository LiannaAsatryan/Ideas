<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
//use Nette\Utils\Paginator;
use Illuminate\Pagination\Paginator;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $topUsers = User::OrderBy('created_at', 'DESC')->limit(5)->get();
        View::share('topUsers', $topUsers);
        Paginator::useBootstrapFive();
    }
}
