<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class BladeServiceProvider extends ServiceProvider
{

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {

        Blade::anonymousComponentNamespace('dashboard.components', 'dashboard-component');
        Blade::anonymousComponentNamespace('dashboard.partials', 'dashboard-partial');


        Blade::componentNamespace('App\\View\\Dashboard\\Components', 'dashboard-Component');
        Blade::componentNamespace('App\\View\\Dashboard\\Layouts', 'dashboard-layout');
    }
}
