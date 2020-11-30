<?php

namespace App\Policies;

use App\Models\Company;
use App\Models\User;
use App\Services\Auth\AuthService;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyPolicy extends BasePolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user): bool
    {
        return $this->authService->hasUserPermission(
            $user,
            Company::class,
            Permission::VIEW_ANY
        );
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Company $company
     * @return mixed
     */
    public function view(User $user, Company $company)
    {
        return $this->authService->hasUserAccessToCompanyPermission($user, $company, Permission::VIEW);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $this->authService->hasUserPermission(
            $user,
            Company::class,
            Permission::CREATE
        );
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Company $company
     * @return mixed
     */
    public function update(User $user, Company $company)
    {
        return $this->authService->hasUserPermission(
            $user,
            Company::class,
            Permission::UPDATE
        );
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Company $company
     * @return mixed
     */
    public function delete(User $user, Company $company)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Company $company
     * @return mixed
     */
    public function restore(User $user, Company $company)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Company $company
     * @return mixed
     */
    public function forceDelete(User $user, Company $company)
    {
        return $user->isAdmin();
    }
}
