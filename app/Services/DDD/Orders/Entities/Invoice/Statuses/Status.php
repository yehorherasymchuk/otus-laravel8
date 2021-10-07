<?php
/**
 * Description of Status.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\DDD\Orders\Entities\Invoice\Statuses;


use App\Services\DDD\Orders\Exceptions\CanNotChangeInvoiceStatusException;

abstract class Status
{

    protected array $next;

    public function assertCanBeChangedTo(self $status): void
    {
        if (! $this->canBeChangedTo($status)) {
            throw new CanNotChangeInvoiceStatusException('Assert Status Can not be changed');
        }
    }

    public function canBeChangedTo(self $status): bool
    {
        $className = get_class($status);

        return in_array($className, $this->next, true);
    }

}
