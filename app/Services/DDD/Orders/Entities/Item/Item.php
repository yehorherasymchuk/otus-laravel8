<?php
/**
 * Description of Item.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\DDD\Orders\Entities\Item;


use App\Services\DDD\Orders\Entities\Item\VO\ItemId;
use App\Services\DDD\Orders\Entities\Item\VO\Money;
use App\Services\DDD\Orders\Entities\Item\VO\Name;

class Item
{

    public function __construct(
        private ItemId $id,
        private Name $name,
        private Money $price,
    )
    {

    }

    public function getId(): ItemId
    {
        return $this->id;
    }

    public function getName(): Name
    {
        return $this->name;
    }

    public function getPrice(): Money
    {
        return $this->price;
    }


}
