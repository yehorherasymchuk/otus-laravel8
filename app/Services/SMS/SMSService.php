<?php
/**
 * Description of SMSService.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Egor Gerasimchuk <egor@mister.am>
 */

namespace App\Services\SMS;


use App\Services\SMS\Clients\MainSMSClient;

class SMSService
{

    /**
     * @var MainSMSClient
     */
    private MainSMSClient $mainSMSClient;

    public function __construct(
        MainSMSClient $mainSMSClient
    )
    {

        $this->mainSMSClient = $mainSMSClient;
    }

    /**
     * @param string $to
     * @param string $message
     */
    public function send(string $to, string $message): void
    {
        $this->mainSMSClient->send($to, $message);
    }
}
