<?php

namespace App\Policies;

use App\Models\Country;
use App\Models\User;
use App\Services\Auth\AuthService;
use Illuminate\Auth\Access\HandlesAuthorization;

class CountryPolicy extends BasePolicy
{
    use HandlesAuthorization;

    /**
     * @var AuthService
     */
    private $authService;

    public function __construct(
        AuthService $authService
    ) {

        $this->authService = $authService;
    }

    public function viewAny(User $user): bool
    {
        return $this->authService->hasUserPermission(
            $user,
            Country::class,
            Permission::VIEW_ANY
        );
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Country $country
     * @return mixed
     */
    public function view(User $user, Country $country)
    {
        return $this->authService->hasUserPermission(
            $user,
            Country::class,
            Permission::VIEW
        );
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
            Country::class,
            Permission::CREATE
        );
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Country $country
     * @return mixed
     */
    public function update(User $user, Country $country)
    {
        return $this->authService->hasUserPermission(
            $user,
            Country::class,
            Permission::UPDATE
        );
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Country $country
     * @return mixed
     */
    public function delete(User $user, Country $country)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Country $country
     * @return mixed
     */
    public function restore(User $user, Country $country)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Country $country
     * @return mixed
     */
    public function forceDelete(User $user, Country $country)
    {
        return $user->isAdmin();
    }
}
