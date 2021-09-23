<?php
/**
 * Description of EloquentUserRepository.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\Users\Repositories;


use App\Models\User;

class EloquentUserRepository implements UserRepository
{
    public function find(int $id): ?User
    {
        return User::find($id);
    }

    public function updateUserPassword(User $user, string $password): void
    {
        $user->update([
            'password' => $password,
        ]);
    }


}
