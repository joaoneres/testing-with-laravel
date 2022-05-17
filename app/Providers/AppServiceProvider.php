<?php

namespace App\Providers;

use App\Interfaces\AddressRepositoryInterface;
use App\Interfaces\CepServiceInterface;
use App\Interfaces\HttpClientInterface;
use App\Repositories\AddressRepository;
use App\Services\CepService;
use App\Services\HttpClientService;
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
        $this->app->bind(AddressRepositoryInterface::class, AddressRepository::class);
        $this->app->bind(CepServiceInterface::class, CepService::class);
        $this->app->bind(HttpClientInterface::class, HttpClientService::class);
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
