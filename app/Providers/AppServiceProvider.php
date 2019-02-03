<?php

namespace App\Providers;
include __DIR__ . '/../helpers-repositories.php';

use App\Cosmonaut\CosmonautRepository;
use App\Cosmonaut\CosmonautRepositoryInterface;
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
        $this->app->singleton(CosmonautRepositoryInterface::class, CosmonautRepository::class);
    }
}
