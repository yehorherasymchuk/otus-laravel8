<?php
/**
 * Description of Invoice.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\DDD\Orders\Entities\Invoice;


use App\Services\DDD\Orders\Entities\Client\Client;
use App\Services\DDD\Orders\Entities\Invoice\Statuses\Processing;
use App\Services\DDD\Orders\Entities\Invoice\Statuses\Status;
use App\Services\DDD\Orders\Entities\Invoice\VO\InvoiceId;

class Invoice
{

    public function __construct(
        private InvoiceId $invoiceId,
        private Client $client,
        private Status $status,
        private array $lineItems = [],
    )
    {

    }

    public function startProcessing(): void
    {
        $status = new Processing();
        $this->getStatus()->assertCanBeChangedTo($status);
        $this->status = $status;
    }

    /**
     * @return InvoiceId
     */
    public function getInvoiceId(): InvoiceId
    {
        return $this->invoiceId;
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * @return Status
     */
    public function getStatus(): Status
    {
        return $this->status;
    }

    /**
     * @return array
     */
    public function getLineItems(): array
    {
        return $this->lineItems;
    }

}
