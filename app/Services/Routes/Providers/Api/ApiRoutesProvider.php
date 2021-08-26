<?php
/**
 * Description of ApiRoutesProvider.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\Routes\Providers\Api;


use App\Http\Controllers\Api\Countries\CountriesIndexController;
use App\Http\Controllers\Api\Countries\CountriesShowController;
use App\Http\Controllers\Api\Countries\CountriesStoreController;
use Illuminate\Support\Facades\Route;

class ApiRoutesProvider
{

    public function registerRoutes(): void
    {
        Route::group([
            'prefix' => 'api',
        ], function () {
            Route::get('countries', CountriesIndexController::class)
                ->name(ApiRoutes::COUNTRIES_INDEX);
            Route::get(
                'countries/{country}',
                CountriesShowController::class
            )
                ->where('country', '\d+')
                ->name(ApiRoutes::COUNTRIES_SHOW);

            Route::post('countries', CountriesStoreController::class)
                ->name(ApiRoutes::COUNTRIES_STORE);

            Route::put('countries/{country}', CountriesStoreController::class)
                ->name(ApiRoutes::COUNTRIES_UPDATE)
                ->where('country', '\d+');
        });
    }


    public static function countries(): string
    {
        return route(ApiRoutes::COUNTRIES_INDEX);
    }

    public static function countriesShow(int $id): string
    {
        return route(ApiRoutes::COUNTRIES_SHOW, [
            'country' => $id,
        ]);
    }

    public static function countriesStore(): string
    {
        return route(ApiRoutes::COUNTRIES_STORE);
    }

    public static function countriesUpdate(int $id): string
    {
        return route(ApiRoutes::COUNTRIES_UPDATE, [
            'country' => $id,
        ]);
    }

}
