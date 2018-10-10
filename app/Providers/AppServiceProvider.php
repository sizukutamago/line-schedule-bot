<?php

namespace App\Providers;

use Acme\Adapters\Factories\Interfaces\LineFactoryInterface;
use Acme\Adapters\Factories\LineFactory;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            LineFactoryInterface::class,
            LineFactory::class
        );
    }
}
