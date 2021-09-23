<?php

namespace App\Console\Commands\Users;

use App\Services\Users\UsersService;
use Illuminate\Console\Command;
use Str;

class ChangeUserPassword extends Command
{

    protected $signature = 'users:password
                            {user : The ID of user }
                            {--p|--password= : string password that WILL BE hashed }';

    protected $description = 'Change Users Password that will be automatically hashed';

    private function getUsersService(): UsersService
    {
        return app(UsersService::class);
    }

    public function handle(): int
    {
        $id = $this->argument('user');
        $user = $this->getUsersService()->findUser($id);
        if (! $user) {
            $this->info("User $id not found");
            return 0;
        }
        $password = $this->getPassword();

        $this->getUsersService()->changeUserPassword(
            $user,
            $password,
        );
        $this->call('users:info', [
           'user' => $user->id,
        ]);
        return 1;
    }

    private function getPassword(): string
    {
        $password = $this->option('password');
        if ($password) {
            return $password;
        }
        if ($this->confirm('Do you want to autogenerate password')) {
            return Str::random();
        }
        return $this->secret('Enter password');
    }
}
