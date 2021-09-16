<?php

namespace App\Policies;

use App\Models\Continent;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContinentPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->isAdmin()) {
            return true;
        }
        if ($user->isUser()) {
            return false;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Continent  $continent
     * @return mixed
     */
    public function view(User $user, Continent $continent)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Continent  $continent
     * @return mixed
     */
    public function update(User $user, Continent $continent)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Continent  $continent
     * @return mixed
     */
    public function delete(User $user, Continent $continent)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Continent  $continent
     * @return mixed
     */
    public function restore(User $user, Continent $continent)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Continent  $continent
     * @return mixed
     */
    public function forceDelete(User $user, Continent $continent)
    {
        //
    }
}
