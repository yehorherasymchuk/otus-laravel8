<?php

namespace App\Providers;

use App\Providers\Views\BladeStatements;
use App\Services\Cities\Repositories\CityRepositoryInterface;
use App\Services\Cities\Repositories\EloquentCityRepository;
use App\Services\Companies\Repositories\CompanySearchRepository;
use App\Services\Companies\Repositories\ScoutCompanySearchRepository;
use App\Services\Countries\Repositories\CountryRepositoryInterface;
use App\Services\Countries\Repositories\CountrySearchRepository;
use App\Services\Countries\Repositories\EloquentCountryRepository;
use App\Services\Countries\Repositories\ScoutCountrySearchRepository;
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
        $this->app->bind(CountrySearchRepository::class, ScoutCountrySearchRepository::class);
        $this->app->bind(CompanySearchRepository::class, ScoutCompanySearchRepository::class);
        $this->app->bind(CityRepositoryInterface::class, EloquentCityRepository::class);

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
