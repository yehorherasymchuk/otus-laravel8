<?php
/**
 * Description of StatusNew.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\DDD\Orders\Entities\Invoice\Statuses;


class Processing extends Status
{

    protected array $next = [
        Completed::class,
        Cancelled::class,
    ];

}
