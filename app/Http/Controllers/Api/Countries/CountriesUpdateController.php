<?php
/**
 * Description of CountriesController.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Http\Controllers\Api\Countries;


use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CountriesUpdateController extends Controller
{

    public function __invoke(Request $request, Country $country): JsonResponse
    {
        $country->update($request->all());
        return response()->json(
            $country
        );
    }

}
