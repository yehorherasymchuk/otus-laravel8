<?php
/**
 * Description of CMSRoutesProvider.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Egor Gerasimchuk <egor@mister.am>
 */

namespace App\Services\Routes\Providers\CMS;


use App\Http\Controllers\Api\Continents\ApiContinentController;
use App\Http\Controllers\Api\Countries\CountriesIndexController;
use App\Http\Controllers\Cms\Cities\CitiesController;
use App\Http\Controllers\Cms\Companies\CmsCompaniesController;
use App\Http\Controllers\Cms\Continents\CmsContinentsController;
use App\Http\Controllers\Cms\Countries\CmsCountriesController;
use Illuminate\Support\Facades\Route;

final class CMSRoutesProvider
{


    public function registerRoutes()
    {
        Route::group([
            'prefix' => '/{locale}/cms',
            'as' => 'cms.',
            'middleware' => [
                'cms',
            ],
        ], function () {
            Route::resources([
                'continents' => CmsContinentsController::class,
                'countries' => CmsCountriesController::class,
                'cities' => CitiesController::class,
                'companies' => CmsCompaniesController::class,
            ], [
                'except' => [
                    'destroy',
                ]
            ]);
        });
    }

}
