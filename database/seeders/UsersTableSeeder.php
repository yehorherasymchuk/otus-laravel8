<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create([
            'email' => 'yehor3@otus.ru',
            'level' => User::LEVEL_ADMIN,
            'api_token' => Str::random(),
            'password' => \Hash::make('yehor3@otus.ru'),
        ]);
        User::factory(10)->create();
    }
}
