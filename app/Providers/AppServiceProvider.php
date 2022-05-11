<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Pokemon\PokemonService;
use App\Services\Pokemon\IPokemonService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IPokemonService::class, function ($app) {
            return new PokemonService();
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
