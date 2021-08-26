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
use Illuminate\Support\Facades\Route;

class CountriesIndexController extends Controller
{

    public function __invoke(): JsonResponse
    {
        return response()->json(
          Country::all(),
        );
    }


}
