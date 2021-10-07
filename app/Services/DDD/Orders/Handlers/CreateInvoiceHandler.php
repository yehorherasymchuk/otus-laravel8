<?php
/**
 * Description of CreateInvoiceHandler.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\DDD\Orders\Handlers;


use App\Services\DDD\Orders\Entities\Client\Client;
use App\Services\DDD\Orders\Entities\Invoice\Invoice;
use App\Services\DDD\Orders\Entities\Invoice\Statuses\Draft;
use App\Services\DDD\Orders\Entities\Invoice\VO\InvoiceId;
use App\Services\DDD\Orders\Repositories\InvoiceRepository;
use Illuminate\Support\Str;

class CreateInvoiceHandler
{
    public function __construct(
        private InvoiceRepository $invoiceRepository
    )
    {

    }

    public function handle(
        string $clientId,
    ): Invoice
    {
        $invoice = new Invoice(
            new InvoiceId(
                Str::uuid()->toString(),
            ),
            new Client($clientId),
            new Draft(),
        );

        $this->invoiceRepository->storeInvoice($invoice);

        \Mail::send();


        return $invoice;
    }
}
