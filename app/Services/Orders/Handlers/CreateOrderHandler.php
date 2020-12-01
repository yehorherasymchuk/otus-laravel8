<?php
/**
 * Description of CreateOrderHandler.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Egor Gerasimchuk <egor@mister.am>
 */

namespace App\Services\Orders\Handlers;


use App\Services\SMS\SMSService;

class CreateOrderHandler
{

    /**
     * @var SMSService
     */
    private SMSService $SMSService;

    public function __construct(
        SMSService $SMSService
    )
    {

        $this->SMSService = $SMSService;
    }

    public function handle(array $data)
    {
        // store in bd

        $this->SMSService->send($data['phone'], __('orders.created'));
    }

}
