<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $menu = [];
        $modules = [
            'kadoo-customers',
            'kadoo-sales',
            'kadoo-calendar'
        ];

        foreach ($modules as $module) {
            if (config($module . '.enabled', false)) {
                foreach (config($module . '.menu') as $menuItem) {
                    $menu[] = $menuItem;
                }
            }
        }

        View::share('menu', $menu);

        DB::listen(function ($query) {
            Log::info($query->sql);
            Log::info(json_encode($query->bindings));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
