<?php

namespace App\Providers;

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

        if (!empty(config('kadoo-customers.url'))) {
            $menu[] = [
                'icon' => config('kadoo-customers.icon'),
                'url' => config('kadoo-customers.url'),
                'label' => config('kadoo-customers.label')
            ];
        }

        View::share('menu', $menu);
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
