<?php
/**
 * Description of SMSProvider.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\Notifications\SMS\Providers;


use App\Services\Notifications\SMS\DTOs\SmsDTO;

interface SMSProvider
{

    public function send(SmsDTO $smsDTO): void;

}
