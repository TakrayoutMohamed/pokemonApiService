<?php

namespace App\Providers;

use App\DealingApi\FetchDataApiInterface;
use App\DealingApi\PokemonApi;
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
        $this->app->bind(FetchDataApiInterface::class, function ($app) {
            return new PokemonApi();
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
