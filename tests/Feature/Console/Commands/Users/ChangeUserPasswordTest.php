<?php
/**
 * Description of ChangeUserPasswordTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Tests\Feature\Console\Commands\Users;


use App\Models\User;
use App\Services\Users\Repositories\UserRepository;
use Tests\TestCase;

class ChangeUserPasswordTest extends TestCase
{


    private function getUserRepository(): UserRepository
    {
        return app(UserRepository::class);
    }

    /**
     * @group console
     */
    public function test_do_not_process_not_found_user(): void
    {
        $this->artisan('users:password', [
            'user' => 21312312
        ])->assertExitCode(0);
    }

    /**
     * @group console
     */
    public function test_asks_confirmation_password_if_empty_option(): void
    {
        $user = User::factory()->create();
        $this->artisan('users:password', [
            'user' => $user->id,
        ])->expectsConfirmation('Do you want to autogenerate password', 'yes')
            ->assertExitCode(1);
    }

    /**
     * @group console
     */
    public function test_asks_not_confirmation_password_if_option_specified(): void
    {
        $user = User::factory()->create();
        $this->artisan('users:password', [
            'user' => $user->id,
            '--password' => 'test',
        ])->assertExitCode(1);
    }


    /**
     * @group console
     */
    public function test_updates_password(): void
    {
        $user = User::factory()->create();
        $this->artisan('users:password', [
            'user' => $user->id,
            '--password' => 'test',
        ]);
    }

}
