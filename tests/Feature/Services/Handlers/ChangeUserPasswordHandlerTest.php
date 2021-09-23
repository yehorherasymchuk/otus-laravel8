<?php
/**
 * Description of ChangeUserPasswordHandlerTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Tests\Feature\Services\Handlers;


use App\Models\User;
use App\Services\Users\Handlers\ChangeUserPasswordHandler;
use App\Services\Users\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tests\TestCase;

class ChangeUserPasswordHandlerTest extends TestCase
{

    private function getChangeUserPasswordHandler(): ChangeUserPasswordHandler
    {
        return app(ChangeUserPasswordHandler::class);
    }

    private function getUserRepository(): UserRepository
    {
        return app(UserRepository::class);
    }

    /**
     * @group Users
     */
    public function test_updates_password(): void
    {
        $user = User::factory()->create();
        $oldPassword = $user->password;
        $this->getChangeUserPasswordHandler()->handle($user, Str::random());
        $updatedUser = $this->getUserRepository()->find($user->id);

        $this->assertNotEquals($oldPassword, $updatedUser->password);
    }

    /**
     * @group Users
     */
    public function test_password_is_hashed(): void
    {
        $user = User::factory()->create();
        $password = Str::random();
        $this->getChangeUserPasswordHandler()->handle($user, $password);
        $updatedUser = $this->getUserRepository()->find($user->id);

        $this->assertEquals(Hash::make($password), $updatedUser->password);
    }

}
