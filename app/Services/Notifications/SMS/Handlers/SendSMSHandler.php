<?php
/**
 * Description of SendSMSHandler.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\Notifications\SMS\Handlers;


use App\Services\Notifications\SMS\DTOs\SmsDTO;
use App\Services\Notifications\SMS\Providers\SMSProvider;

class SendSMSHandler
{

    private SMSProvider $SMSProvider;

    public function __construct(
        SMSProvider $SMSProvider
    )
    {
        $this->SMSProvider = $SMSProvider;
    }

    public function handle(SmsDTO $smsDTO): void
    {
        $this->SMSProvider->send($smsDTO);
    }

}
