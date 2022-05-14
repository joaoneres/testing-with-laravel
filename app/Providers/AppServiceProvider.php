<?php

namespace App\Providers;

use App\Interfaces\HollidayRepositoryInterface;
use App\Repositories\HollidayRepository;
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
        $this->app->bind(HollidayRepositoryInterface::class, HollidayRepository::class);
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
