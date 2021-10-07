<?php
/**
 * Description of LineItem.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\DDD\Orders\Entities\Item\VO;


use App\Services\DDD\Orders\Entities\Item;

class LineItem
{

    public function __construct(
        private Item $item,
        private float $quantity,
    )
    {

    }

    public function getItem(): Item
    {
        return $this->item;
    }

    public function getQuantity(): float
    {
        return $this->quantity;
    }

}
