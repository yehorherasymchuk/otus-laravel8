<?php
/**
 * Description of CreateOrderHandlerTest.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Egor Gerasimchuk <egor@mister.am>
 */

namespace Tests\Feature\Http\Services\Orders\Handlers;


use App\Services\Orders\Handlers\CreateOrderHandler;
use App\Services\SMS\Clients\MainSMSClient;
use Mockery\Mock;
use Tests\TestCase;

class CreateOrderHandlerTest extends TestCase
{

    private function getCreateOrderHandler(): CreateOrderHandler
    {
        return app(CreateOrderHandler::class);
    }

    /**
     * @group handlers
     */
    public function testHandleSendsSMS()
    {
        $this->mock(MainSMSClient::class, function($mock) {
            /** @var Mock $mock */
            $mock->shouldReceive('send')->twice();
        });

        $this->getCreateOrderHandler()->handle([
            'phone' => '34234234234234',
        ]);
    }

}
