<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use \App\Http\Controllers\Web\Dashboard\Clients\ClientsController;
use \App\Http\Controllers\Web\Dashboard\Cars\CarsController;
use \App\Http\Controllers\Web\Dashboard\Bookings\BookingsController;
use \App\Http\Controllers\Api\Dashboard\Clients\ClientsController as ClientApi;
use \App\Http\Controllers\Api\Dashboard\Cars\CarsController as CarsApi;
use \App\Http\Controllers\Api\Dashboard\Bookings\BookingsController as BookingsApi;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'namePage' => config('app.name', 'Laravel'),
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->prefix('dashboard')->group(function () {
    Route::get('/', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::prefix('/clients')->group(function () {
        Route::get('/', [ClientsController::class, 'index'])->name('dash/clients/index');
        Route::get('/create', [ClientsController::class, 'create'])->name('dash/clients/create');
        Route::get('/show', [ClientsController::class, 'show'])->name('dash/clients/show');
    });

    Route::prefix('/cars')->group(function () {
        Route::get('/', [CarsController::class, 'index'])->name('dash/clients/index');
        Route::get('/create', [CarsController::class, 'create'])->name('dash/clients/create');
        Route::get('/show', [CarsController::class, 'show'])->name('dash/clients/show');
    });

    Route::prefix('/bookings')->group(function () {
        Route::get('/', [BookingsController::class, 'index'])->name('dash/bookings/index');
        Route::get('/create', [BookingsController::class, 'create'])->name('dash/bookings/create');
        Route::get('/show', [BookingsController::class, 'show'])->name('dash/bookings/show');
    });

    Route::prefix('api')->group(function () {
        Route::prefix('/clients')->group(function () {
            Route::post('/', [ClientApi::class, 'index'])->name('dash.clients.index');
            Route::post('/store', [ClientApi::class, 'store'])->name('dash.clients.store');
            Route::post('/update', [ClientApi::class, 'update'])->name('dash.clients.update');
            Route::post('/delete', [ClientApi::class, 'delete'])->name('dash.clients.delete');
        });

        Route::prefix('/cars')->group(function () {
            Route::post('/', [CarsApi::class, 'index'])->name('dash.cars.index');
            Route::post('/store', [CarsApi::class, 'store'])->name('dash.cars.store');
            Route::post('/update', [CarsApi::class, 'update'])->name('dash.cars.update');
            Route::post('/delete', [CarsApi::class, 'delete'])->name('dash.cars.delete');
        });

        Route::prefix('/bookings')->group(function () {
            Route::post('/', [BookingsApi::class, 'index'])->name('dash.bookings.index');
            Route::post('/store', [BookingsApi::class, 'store'])->name('dash.bookings.store');
            Route::post('/delete', [BookingsApi::class, 'delete'])->name('dash.bookings.delete');
        });
    });
});
