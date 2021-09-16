<?php

namespace App\Http\Middleware\Cms;

use App;
use Closure;
use Illuminate\Http\Request;
use View;

class CmsViewShareCommonSettings
{

    public function handle(Request $request, Closure $next)
    {
        View::share([
            'currentUser' => $request->user(),
            'currentPage' => $this->resolveCurrentPage($request),
            'locale' => App::getLocale(),
        ]);

        return $next($request);
    }

    private function resolveCurrentPage(Request $request): string
    {
        $routeName = $request->route()->getName();
        switch ($routeName) {
            case \CMSRoutes::CMS_COUNTRIES_INDEX:
            case \CMSRoutes::CMS_COUNTRIES_CITIES_INDEX:
                return 'countries';

        }
        return '';
    }
}
