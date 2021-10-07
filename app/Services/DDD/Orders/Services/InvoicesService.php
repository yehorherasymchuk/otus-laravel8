<?php
/**
 * Description of InvoicesService.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\DDD\Orders\Services;


use App\Services\DDD\Orders\Entities\Client\Client;
use App\Services\DDD\Orders\Entities\Invoice\Invoice;
use App\Services\DDD\Orders\Entities\Invoice\Statuses\Draft;
use App\Services\DDD\Orders\Entities\Invoice\VO\InvoiceId;
use App\Services\DDD\Orders\Entities\Item\Item;
use App\Services\DDD\Orders\Handlers\CreateInvoiceHandler;
use App\Services\DDD\Orders\Repositories\InvoiceRepository;

class InvoicesService
{

    public function __construct(
        private CreateInvoiceHandler $createInvoiceHandler,
        private InvoiceRepository $invoiceRepository
    )
    {

    }

    public function createInvoice(
        string $clientId,
    ): Invoice
    {
        return $this->createInvoiceHandler->handle($clientId);
    }

    public function addItemToInvoice(Invoice $invoice, Item $item): void
    {
        $invoice->addLineItem($item);
        $this->invoiceRepository->storeInvoiceLineItems($invoice);
    }

}
