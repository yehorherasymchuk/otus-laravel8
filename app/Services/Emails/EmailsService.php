<?php
/**
 * Description of EmailsService.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\Emails;


use App\Services\Emails\Handler\SendPendingEmailsHandler;

class EmailsService
{

    private SendPendingEmailsHandler $sendPendingEmailsHandler;

    public function __construct(
        SendPendingEmailsHandler $sendPendingEmailsHandler
    )
    {
        $this->sendPendingEmailsHandler = $sendPendingEmailsHandler;
    }

    public function sendAllPendingEmails(): void
    {
        $this->sendPendingEmailsHandler->handle();
    }

}
