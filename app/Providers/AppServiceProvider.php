<?php

namespace App\Providers;

use App\Providers\Views\BladeStatements;
use App\Services\Cities\Repositories\CityRepositoryInterface;
use App\Services\Cities\Repositories\EloquentCityRepository;
use App\Services\Countries\Repositories\CountryRepositoryInterface;
use App\Services\Countries\Repositories\EloquentCountryRepository;
use App\Services\Notifications\SMS\Providers\LogSMSProvider;
use App\Services\Notifications\SMS\Providers\SMSProvider;
use App\Services\Users\Repositories\EloquentUserRepository;
use App\Services\Users\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    use BladeStatements;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CountryRepositoryInterface::class, EloquentCountryRepository::class);
        $this->app->bind(CityRepositoryInterface::class, EloquentCityRepository::class);
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);
        $this->app->bind(SMSProvider::class, LogSMSProvider::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootBladeStatements();

    }
}
