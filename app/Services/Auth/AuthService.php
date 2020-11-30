<?php
/**
 * Description of AuthService.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Egor Gerasimchuk <egor@mister.am>
 */

namespace App\Services\Auth;


use App\Models\Company;
use App\Models\Role;
use App\Models\User;

class AuthService
{

    public function hasUserAccessToCompanyPermission(User $user, Company $company, string $permission): bool
    {
        if (!$this->hasUserPermission($user, Company::class, $permission)) {
            return false;
        }
        return $this->hasUserAccessToCompany($user, $company);
    }

    public function hasUserAccessToCompany(User $user, Company $company): bool
    {
        if ($user->isAdmin()) {
            return true;
        }
        if (!$user->isModerator()) {
            return false;
        }
        return $user->companies()
                ->where('id', $company->id)
                ->count() > 0;
    }

    public function hasUserPermission(User $user, string $model, string $permission): bool
    {
        if ($user->isAdmin()) {
            return true;
        }
        if (!$user->isModerator()) {
            return false;
        }
        $role = $user->role;
        if (!$role) {
            return false;
        }
        return $this->hasRolePermission($role, $model, $permission);
    }

    private function hasRolePermission(Role $role, string $model, string $permission): bool
    {
        if (!isset($role->permissions[$model])) {
            return false;
        }
        return in_array($permission, $role->permissions[$model]);
    }

}
