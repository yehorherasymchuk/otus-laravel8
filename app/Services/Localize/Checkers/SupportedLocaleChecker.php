<?php
/**
 * Description of SupportedLocaleChecker.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\Localize\Checkers;


use App\Services\Localize\Locale;

class SupportedLocaleChecker
{

    public function check(string $locale): bool
    {
        return in_array($locale, Locale::$availableLocales);
    }

}
