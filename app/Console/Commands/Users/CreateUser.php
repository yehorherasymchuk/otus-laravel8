<?php

namespace App\Console\Commands\Users;

use App\Models\User;
use Hash;
use Illuminate\Console\Command;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command creates administrator';

    public function handle()
    {
        $email = $this->ask('Enter email: ');
        $name = $this->ask('Enter name of the user: ');
        $password = $this->secret('Enter password: ');

        $supportedLevels = [
            User::LEVEL_USER,
            User::LEVEL_MODERATOR,
            User::LEVEL_ADMIN,
        ];
        $level = $this->choice('Level, ', $supportedLevels, User::LEVEL_USER);
        if ($this->confirm('Are you sure?')) {
            $user = User::create([
                'email' => $email,
                'password' => Hash::make($password),
                'name' => $name,
                'level' => $level,
            ]);
            if ($this->ask('Is need to send email?')) {
                $this->call('email:send ', [
                    'user' => $user->id,
                    '--registration',
                ]);
            }
        }


    }

    private function getLevel(): int
    {
        $level = (int) $this->option('level');

        $supportedLevels = [
            User::LEVEL_USER,
            User::LEVEL_MODERATOR,
            User::LEVEL_ADMIN,
        ];
        if (!in_array($level, $supportedLevels)) {
            return User::LEVEL_USER;
        }
        return $level;
    }


}
