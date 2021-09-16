<?php
/**
 * Description of AuthenticatedEventHandler.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\Auth\Handlers;


use Illuminate\Auth\Events\Authenticated;

class AuthenticatedEventHandler
{

    public function handle(Authenticated $event): void
    {
        \Log::info(__CLASS__, [
            json_encode($event->user->id),
        ]);
    }

}
