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

class CountriesStoreController extends Controller
{

    public function __invoke(Request $request): JsonResponse
    {
        $country = Country::create($request->all());
        return response()->json($country);
    }


}
