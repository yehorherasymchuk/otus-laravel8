<?php
/**
 * Description of StatusNew.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\DDD\Orders\Entities\Invoice\Statuses;


class Draft extends Status
{

    protected array $next = [
        Processing::class,
        Cancelled::class,
    ];

}
