<?php
/**
 * Description of UsersService.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\Users;


use App\Models\User;
use App\Services\Users\Checkers\AgeChecker;

class UsersService
{

    private AgeChecker $ageChecker;

    public function __construct(
        AgeChecker $ageChecker
    )
    {
        $this->ageChecker = $ageChecker;
    }

    public function isUserAdult(User $user): bool
    {
        return $this->ageChecker->isAdult($user);
    }

}
