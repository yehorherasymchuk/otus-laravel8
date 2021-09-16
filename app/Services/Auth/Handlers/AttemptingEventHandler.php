<?php
/**
 * Description of AttemptingEventHandler.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\Auth\Handlers;


use Illuminate\Auth\Events\Attempting;

class AttemptingEventHandler
{

    public function handle(Attempting $event): void
    {
        \Log::info(__CLASS__, [
            json_encode($event->credentials),
        ]);
    }

}
