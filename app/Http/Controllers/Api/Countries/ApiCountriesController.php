<?php
/**
 * Description of ApiCountriesController.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Egor Gerasimchuk <egor@mister.am>
 */

namespace App\Http\Controllers\Api\Countries;


use App\Http\Controllers\Controller;
use App\Services\Countries\CountriesService;
use Illuminate\Http\JsonResponse;

class ApiCountriesController extends Controller
{

    private CountriesService $countriesService;

    public function __construct(
        CountriesService $countriesService
    )
    {
        $this->countriesService = $countriesService;
    }

    public function index(): JsonResponse
    {
        $countries = $this->countriesService->getCountries();
        return response()->json($countries);
    }

}
