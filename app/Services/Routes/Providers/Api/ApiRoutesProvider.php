<?php
/**
 * Description of ApiRoutesProvider.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Egor Gerasimchuk <egor@mister.am>
 */

namespace App\Services\Routes\Providers\Api;


use App\Http\Controllers\Api\Countries\ApiCountriesController;
use Illuminate\Support\Facades\Route;

class ApiRoutesProvider
{

    public function registerRoutes()
    {
        Route::group([
            'as' => 'api.',
        ], function () {
            Route::apiResources([
                'countries' => ApiCountriesController::class,
            ]);
        });
    }
}
