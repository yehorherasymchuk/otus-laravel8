<?php
/**
 * Description of UsersService.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\Users;


use App\Models\User;
use App\Services\Users\Handlers\ChangeUserPasswordHandler;
use App\Services\Users\Repositories\UserRepository;

class UsersService
{

    private ChangeUserPasswordHandler $changeUserPasswordHandler;
    private UserRepository $userRepository;

    public function __construct(
        ChangeUserPasswordHandler $changeUserPasswordHandler,
        UserRepository $userRepository
    )
    {
        $this->changeUserPasswordHandler = $changeUserPasswordHandler;
        $this->userRepository = $userRepository;
    }

    public function findUser(int $id): ?User
    {
        return $this->userRepository->find($id);
    }

    public function changeUserPassword(User $user, string $password): void
    {
        $this->changeUserPasswordHandler->handle($user, $password);
    }

}
