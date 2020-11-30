<?php
/**
 * Description of DashboardGate.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Egor Gerasimchuk <egor@mister.am>
 */

namespace App\Policies;


use App\Models\User;
use App\Services\Auth\AuthService;

class DashboardGate
{

    /**
     * @var AuthService
     */
    private $authService;

    public function __construct(
        AuthService $authService
    )
    {
        $this->authService = $authService;
    }

    public function view(User $user)
    {
        $this->authService->hasUserPermission(
            $user,
            Gates::CMS_VIEW_DASHBOARD,
            Permission::VIEW,
        );
    }

}
