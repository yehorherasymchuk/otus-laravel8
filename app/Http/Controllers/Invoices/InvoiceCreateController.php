<?php
/**
 * Description of InvoiceCreateConttroller.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Http\Controllers\Invoices;


use App\Http\Controllers\Controller;
use App\Services\DDD\Orders\Entities\Client\Client;
use App\Services\DDD\Orders\Entities\Invoice\Invoice;
use App\Services\DDD\Orders\Entities\Invoice\Statuses\Draft;
use App\Services\DDD\Orders\Entities\Invoice\VO\InvoiceId;
use App\Services\DDD\Orders\Exceptions\OrdersException;
use App\Services\DDD\Orders\Repositories\InvoiceRepository;
use App\Services\DDD\Orders\Services\InvoicesService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InvoiceCreateController extends Controller
{

    private function getInvoicesService(): InvoicesService
    {
        return app(InvoicesService::class);
    }

    public function __invoke(Request $request): JsonResponse
    {
        try {
            $this->getInvoicesService()->createInvoice($request->get('client'));
        } catch (OrdersException $e) {
            return $this->errorResponse($e->getMessage());
        }


        return response()->json([
            'id' => $invoice->getInvoiceId()->getValue(),
            'client' => $invoice->getClient(),
            'status' => $invoice->getStatus(),
        ]);
    }

}
