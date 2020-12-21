<?php

namespace App\Http\Middleware;

use App\Models\Country;
use App\Services\Countries\CountriesService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CountriesAddCacheHeaderIfModified
{

    private CountriesService $countriesService;

    public function __construct(
        CountriesService $countriesService
    )
    {
        $this->countriesService = $countriesService;
    }

    public function handle(Request $request, Closure $next)
    {
        /** @var Response $response */
        $response = $next($request);

        $headerModified = $this->getHeaderModifiedSinceTimestamp($request);
        if (!$headerModified) {
            return $response;
        }

        $country = $this->findRequestCountry($request);
        if ($country->updated_at->timestamp < $headerModified) {
            $response->header('Last-Modified', $country->updated_at->timestamp);
        }
        return $response;
    }

    private function findRequestCountry(Request $request): ?Country
    {
        $countryId = (int) $request->route('country');
        if (!$countryId) {
            return null;
        }
        return $this->countriesService->findCountry($countryId);
    }

    private function getHeaderModifiedSinceTimestamp(Request $request): ?int
    {
        return $request->header('If-Modified-Since');
    }
}
