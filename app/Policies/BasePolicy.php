<?php
/**
 * Description of BasePolicy.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Egor Gerasimchuk <egor@mister.am>
 */

namespace App\Policies;


use App\Models\User;
use App\Services\Auth\AuthService;

abstract class BasePolicy
{
    protected AuthService $authService;

    public function __construct(
        AuthService $authService
    ) {
        $this->authService = $authService;
    }

    public function before(User $user)
    {
        if ($user->isAdmin()) {
            return true;
        }
        if (!$user->isModerator()) {
            return false;
        }
        return false;
    }



}
