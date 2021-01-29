<?php

namespace App\Architecture\Cars\Providers;

use App\Architecture\Cars\Interfaces\ICarsRepository;
use App\Architecture\Cars\Interfaces\ICarsService;
use App\Architecture\Cars\Repositories\CarsRepository;
use App\Architecture\Cars\Services\CarsService;
use Illuminate\Support\ServiceProvider;

class CarsAppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            ICarsRepository::class,
            CarsRepository::class
        );

        $this->app->singleton(
            ICarsService::class,
            CarsService::class
        );
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
