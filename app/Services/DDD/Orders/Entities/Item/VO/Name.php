<?php
/**
 * Description of Name.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\DDD\Orders\Entities\Item\VO;


use App\Services\DDD\Orders\Exceptions\EmptyItemNameException;

class Name
{
    public function __construct(
        private string $value
    )
    {
        if (! $value) {
            throw new EmptyItemNameException('Name should be specified');
        }
    }

    public function getValue(): string
    {
        return $this->value;
    }

}
