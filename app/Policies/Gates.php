<?php
/**
 * Description of Gate.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Egor Gerasimchuk <egor@mister.am>
 */

namespace App\Policies;


abstract class Gates
{

    const CMS_VIEW_DASHBOARD = 'CMS_VIEW_DASHBOARD';

    public static $gates = [
        self::CMS_VIEW_DASHBOARD,
    ];

}
