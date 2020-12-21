<?php
/**
 * Description of CMSRoutesProvider.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Egor Gerasimchuk <egor@mister.am>
 */

namespace App\Services\Routes\Providers\CMS;


use App\Http\Controllers\Cms\Cities\CitiesController;
use App\Http\Controllers\Cms\Companies\CmsCompaniesController;
use App\Http\Controllers\Cms\Countries\CmsCountriesController;
use App\Http\Middleware\Cms\ShareViewCommonData;
use App\Http\Middleware\CustomAuth;
use App\Http\Middleware\Localize;
use App\Http\Middleware\RestrictNonAdultUsers;
use Illuminate\Support\Facades\Route;

final class CMSRoutesProvider
{

    public function __construct()
    {

    }

    public function registerRoutes()
    {
        Route::group([
            'prefix' => '/{locale}/cms',
            'as' => 'cms.',
            'middleware' => [
                Localize::class,
                ShareViewCommonData::class,
            ],
        ], function () {
            Route::resources([
                'countries' => CmsCountriesController::class,
                'cities' => CitiesController::class,
                'companies' => CmsCompaniesController::class,
            ]);

        });
    }

}
