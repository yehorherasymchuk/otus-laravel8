<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
            'email' => 'yehor2@otus.ru',
            'level' => User::LEVEL_ADMIN,
            'api_token' => 'fdsfdsfsafasfadsfwe423rfdfdzsfawR12WRAS',
        ]);
        User::factory(10)->create();
    }
}
