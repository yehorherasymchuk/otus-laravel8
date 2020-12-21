<?php
/**
 * Description of AdultChecker.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\Users\Checkers;


use App\Models\User;

class AgeChecker
{
    const AGE_ADULT = 18;

    public function isAdult(User $user): bool
    {
        return $user->age >= self::AGE_ADULT;
    }

}
