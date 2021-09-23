<?php

namespace App\Console\Commands\Users;

use App\Services\Users\UsersService;
use Illuminate\Console\Command;

class ChangeUsersPasswords extends Command
{

    protected $signature = 'users:passwords
                            {user* : The IDs of users }
                            {--p|--password=* : string passwords that WILL BE hashed in the same order of user IDS }';

    protected $description = 'Change Users Passwords For BATCH that will be automatically hashed';


    private function getUsersService(): UsersService
    {
        return app(UsersService::class);
    }

    public function handle(): void
    {
        $ids = $this->argument('user');
        $passwords = $this->option('password');

        if (count($ids) !== count($passwords)) {
            $this->error('The count of users doesn\'t match the count of passwords');
            return;
        }

        foreach ($ids as $index => $id) {
            $password = $passwords[$index];
            $this->handleUser($id, $password);
        }
    }

    private function handleUser(int $id, string $password): void
    {
        $user = $this->getUsersService()->findUser($id);
        if (!$user) {
            $this->info("User $id not found");
            return;
        }

        $this->getUsersService()->changeUserPassword(
            $user,
            $password,
        );
    }
}
