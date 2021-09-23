<?php
/**
 * Description of UserRepository.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\Users\Repositories;


use App\Models\User;

interface UserRepository
{

    public function find(int $id): ?User;

    public function updateUserPassword(User $user, string $password): void;

}
