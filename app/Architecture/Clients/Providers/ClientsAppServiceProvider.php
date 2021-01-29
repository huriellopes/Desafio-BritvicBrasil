<?php

namespace App\Architecture\Clients\Providers;

use App\Architecture\Clients\Interfaces\IClientsRepository;
use App\Architecture\Clients\Interfaces\IClientsService;
use App\Architecture\Clients\Repositories\ClientsRepository;
use App\Architecture\Clients\Services\ClientsService;
use Illuminate\Support\ServiceProvider;

class ClientsAppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            IClientsRepository::class,
            ClientsRepository::class
        );

        $this->app->singleton(
            IClientsService::class,
            ClientsService::class
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
