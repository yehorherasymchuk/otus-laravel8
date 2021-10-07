<?php
/**
 * Description of InvoiceId.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\DDD\Orders\Entities\Invoice\VO;


class InvoiceId
{

    public function __construct(
        private string $value
    )
    {

    }

    public function getValue(): string
    {
        return $this->value;
    }
}
