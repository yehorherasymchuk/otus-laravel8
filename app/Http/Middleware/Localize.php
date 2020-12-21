<?php

namespace App\Http\Middleware;

use App;
use App\Services\Localize\LocaliseService;
use Closure;
use Illuminate\Http\Request;

class Localize
{

    private LocaliseService $localiseService;

    public function __construct(
        LocaliseService $localiseService
    )
    {
        $this->localiseService = $localiseService;
    }

    public function handle(Request $request, Closure $next)
    {
        $locale = $this->getRequestLocale($request);
        if (!$this->isLocaleSupported($locale)) {
            abort(404);
        }
        $this->setAppLocale($locale);
        $this->removeLocaleParamFromRequest($request);

        return $next($request);
    }

    private function getRequestLocale(Request $request): ?string
    {
        return $this->localiseService->resolveRequestLocale($request);
    }

    private function isLocaleSupported(?string $locale): bool
    {
        if (!$locale) {
            return false;
        }
        return $this->localiseService->isLocaleSupported($locale);
    }

    private function setAppLocale(string $locale): void
    {
        App::setLocale($locale);
    }

    private function removeLocaleParamFromRequest(Request $request): void
    {
        $request->route()->forgetParameter('locale');
    }
}
