<?php

namespace App\Providers;

use App\Interfaces\LoggerInterface;
use App\Interfaces\TemperatureMeasurementRepositoryInterface;
use App\Repositories\TemperatureMeasurementRepository;
use Illuminate\Support\ServiceProvider;
use LoggerRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TemperatureMeasurementRepositoryInterface::class, TemperatureMeasurementRepository::class);
        $this->app->bind(LoggerInterface::class, LoggerRepository::class);
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
