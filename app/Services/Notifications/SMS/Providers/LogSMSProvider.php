<?php
/**
 * Description of StubSMSProvider.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\Notifications\SMS\Providers;


use App\Services\Notifications\SMS\DTOs\SmsDTO;
use Log;

class LogSMSProvider implements SMSProvider
{
    public function send(SmsDTO $smsDTO): void
    {
        Log::notice('LogSMSProvider', [
            $smsDTO->getFrom(),
            $smsDTO->getTo(),
            $smsDTO->getBody(),
        ]);

    }


}
