<?php

namespace App\Console\Commands\Users;

use Illuminate\Console\Command;

class CreateUser extends Command
{
    protected $signature = 'users:create';

    protected $description = 'Command description';

    public function handle(): void
    {

        $this->choice('Continent', ['Europe', 'Asia']);
        $name = $this->ask('Name');
        $password = $this->ask('Password');
        $email = $this->ask('Email');


    }
}
