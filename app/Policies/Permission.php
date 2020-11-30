<?php
/**
 * Description of Policy.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Egor Gerasimchuk <egor@mister.am>
 */

namespace App\Policies;


abstract class Permission
{

    const VIEW_ANY = 'viewAny';
    const VIEW = 'view';
    const CREATE = 'create';
    const UPDATE = 'update';
    const DELETE = 'delete';
    //...

}
