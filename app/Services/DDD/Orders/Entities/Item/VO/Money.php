<?php
/**
 * Description of Money.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\DDD\Orders\Entities\Item\VO;


class Money
{

    public function __construct(
        private string $currency,
        private float $amount,
    )
    {

    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }



}
