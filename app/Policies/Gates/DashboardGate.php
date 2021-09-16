<?php
/**
 * Description of DashboardGate.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Egor Gerasimchuk <egor@mister.am>
 */

namespace App\Policies\Gates;


use App\Models\User;
use App\Policies\Gates;
use App\Policies\Permission;
use App\Services\Auth\AuthService;

class DashboardGate
{

    private AuthService $authService;

    public function __construct(
        AuthService $authService
    )
    {
        $this->authService = $authService;
    }

    public function view(User $user): void
    {
        $this->authService->hasUserPermission(
            $user,
            Gates::CMS_VIEW_DASHBOARD,
            Permission::VIEW,
        );
    }

}
