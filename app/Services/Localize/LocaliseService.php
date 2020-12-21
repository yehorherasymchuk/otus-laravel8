<?php
/**
 * Description of LocaliseService.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\Localize;


use App\Services\Localize\Checkers\SupportedLocaleChecker;
use App\Services\Localize\Resolvers\RequestLocaleResolver;
use Illuminate\Http\Request;

class LocaliseService
{

    private SupportedLocaleChecker $supportedLocaleChecker;
    private RequestLocaleResolver $requestLocaleResolver;

    public function __construct(
        RequestLocaleResolver $requestLocaleResolver,
        SupportedLocaleChecker $supportedLocaleChecker
    )
    {
        $this->supportedLocaleChecker = $supportedLocaleChecker;
        $this->requestLocaleResolver = $requestLocaleResolver;
    }

    public function isLocaleSupported(string $locale): bool
    {
        return $this->supportedLocaleChecker->check($locale);
    }

    public function resolveRequestLocale(Request $request): ?string
    {
        return $this->requestLocaleResolver->resolve($request);
    }

}
