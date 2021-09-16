<?php

namespace App\Http\Middleware;

use App;
use Closure;
use Illuminate\Http\Request;

class Localize
{

    const PARAMETER_LOCALE = 'locale';

    private array $supportedLocales = [
        'en',
        'ru',
    ];

    public function handle(Request $request, Closure $next)
    {
        $locale = $this->getRequestLocale($request);
        if (!$locale) {
            abort(404);
        }
        $this->localize($locale);
        $request->route()->forgetParameter(self::PARAMETER_LOCALE);
        return $next($request);
    }

    private function getRequestLocale(Request $request): ?string
    {
        $locale = $request->route()->parameter(self::PARAMETER_LOCALE);
        if (! $locale) {
            $locale = $request->get(self::PARAMETER_LOCALE);
        }
        if (! $locale) {
            $locale = $request->cookie(self::PARAMETER_LOCALE);
        }
        if (! $this->isSupportedLocale($locale)) {
            return null;
        }
        return $locale;
    }

    private function isSupportedLocale(?string $locale): bool
    {
        if (! $locale) {
            return false;
        }
        return in_array($locale, $this->supportedLocales);
    }

    private function localize(string $locale): void
    {
        App::setLocale($locale);
    }
}
