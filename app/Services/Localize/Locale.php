<?php
/**
 * Description of Locale.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\Localize;


class Locale
{

    const RU = 'ru';
    const EN = 'en';

    public static array $availableLocales = [
        self::RU,
        self::EN,
    ];

}
