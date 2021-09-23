<?php
/**
 * Description of SendSmsJob.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\Notifications\SMS\Jobs;


use App\Services\Notifications\SMS\DTOs\SmsDTO;
use App\Services\Notifications\SMS\Handlers\SendSMSHandler;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;

class SendSmsJob implements ShouldQueue
{

    use Dispatchable, Queueable, InteractsWithQueue;

    private SmsDTO $smsDTO;

    public function __construct(
        SmsDTO $smsDTO
    )
    {
        $this->smsDTO = $smsDTO;
    }

    private function getSendSMSHandler(): SendSMSHandler
    {
        return app(SendSMSHandler::class);
    }

    public function handle(): void
    {
        $this->getSendSMSHandler()->handle($this->smsDTO);
    }

}
