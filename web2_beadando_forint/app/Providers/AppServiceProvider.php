<?php

namespace App\Providers;
use App\Models\menu;

use Illuminate\Support\ServiceProvider;

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
        $menuitems = Menu::where('active',1)->orderBy('menu_order')->get();
        view()->share('menuitems', $menuitems);
    }
}
