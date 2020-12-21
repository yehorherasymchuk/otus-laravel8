<?php
/**
 * Description of RequestLocaleResolver.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\Localize\Resolvers;


use Illuminate\Http\Request;

class RequestLocaleResolver
{

    public function resolve(Request $request): ?string
    {
        if ($request->get('locale')) {
            return $request->get('locale');
        }
        if ($request->header('app-locale')) {
            return $request->header('app-locale');
        }
        return $request->route('locale');
    }

}
