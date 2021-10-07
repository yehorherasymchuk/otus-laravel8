<?php
/**
 * Description of ItemId.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\DDD\Orders\Entities\Item\VO;


class ItemId
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
