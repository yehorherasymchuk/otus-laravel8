<?php

namespace App\Console\Commands\Users;

use App\Models\User;
use App\Services\Users\UsersService;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;

class UsersInfo extends Command
{
    protected $signature = 'users:info {user}';

    protected $description = 'User Info';

    private function getUsersService(): UsersService
    {
        return app(UsersService::class);
    }
    public function handle(): void
    {
        $id = $this->argument('user');
        $user = $this->getUsersService()->findUser($id);
        if (! $user) {
            $this->info("User $id not found");
            return;
        }
        $this->info("ID: " . $user->id);
        $this->info("Name: " . $user->name);
        $this->info("Email: " . $user->email);

    }

}
