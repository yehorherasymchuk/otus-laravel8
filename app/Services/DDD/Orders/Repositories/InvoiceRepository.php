<?php
/**
 * Description of InvoiceRepository.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\DDD\Orders\Repositories;


use App\Services\DDD\Orders\Entities\Invoice\Invoice;
use App\Services\DDD\Orders\Entities\Invoice\VO\InvoiceId;

interface InvoiceRepository
{

    public function findInvoiceById(InvoiceId $id): ?Invoice;

    public function storeInvoice(Invoice $invoice): void;

}
