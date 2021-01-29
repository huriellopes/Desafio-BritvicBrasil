<?php

namespace App\Architecture\Bookings\Providers;

use App\Architecture\Bookings\Interfaces\IBookingsRepository;
use App\Architecture\Bookings\Interfaces\IBookingsService;
use App\Architecture\Bookings\Models\Booking;
use App\Architecture\Bookings\Repositories\BookingsRepository;
use App\Architecture\Bookings\Services\BookingsService;
use App\Observers\CarReservedObserver;
use Illuminate\Support\ServiceProvider;

class BookingsAppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            IBookingsRepository::class,
            BookingsRepository::class
        );

        $this->app->singleton(
            IBookingsService::class,
            BookingsService::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Booking::observe(CarReservedObserver::class);
    }
}
