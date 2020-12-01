<?php
/**
 * Description of UserGenerator.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Egor Gerasimchuk <egor@mister.am>
 */

namespace Tests\Generators;


use App\Models\User;

class UsersGenerator
{
    public static function generateAdmin(array $data = []): User
    {
        return self::generate(array_merge([
            'level' => User::LEVEL_ADMIN,
        ], $data));
    }

    public static function generateModerator(array $data = []): User
    {
        return self::generate(array_merge([
            'level' => User::LEVEL_MODERATOR,
        ], $data));
    }

    public static function generatePlain(array $data = []): User
    {
        return self::generate(array_merge([
            'level' => User::LEVEL_USER,
        ], $data));
    }

    private static function generate(array $data)
    {
        return User::factory()->create($data);
    }

}
