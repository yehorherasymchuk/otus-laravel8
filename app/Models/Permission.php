<?php
/**
 * Description of Permission.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Egor Gerasimchuk <egor@mister.am>
 */

namespace App\Models;


final class Permission
{

    const UPDATE_ROLE = 'UPDATE_ROLE';


    public static function all()
    {
        return [
            self::UPDATE_ROLE,
        ];
    }

}
