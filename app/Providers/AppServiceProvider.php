<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Player;
use App\Models\Account;
use Illuminate\Support\Facades\DB;

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
        View::composer('*', function ($view) {
            $topPlayers = Player::orderBy('level', 'desc')->limit(5)->get(['name', 'level']);
            $registeredAccounts = Account::count();
            try {
                DB::connection()->getPdo();
                $serverOnline = true;
            } catch (\Exception $e) {
                $serverOnline = false;
            }
            $view->with(compact('topPlayers', 'registeredAccounts', 'serverOnline'));
        });
    }
}
