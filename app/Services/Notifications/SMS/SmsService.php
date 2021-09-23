<?php
/**
 * Description of SmsService.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\Notifications\SMS;


use App\Jobs\QueueName;
use App\Services\Notifications\SMS\DTOs\SmsDTO;
use App\Services\Notifications\SMS\Jobs\SendSmsJob;

class SmsService
{

    public function sendSMS(SmsDTO $smsDTO): void
    {
        SendSmsJob::dispatch($smsDTO)->onQueue(QueueName::HIGH);
    }

}
