<?php
/**
 * Description of SendPendingsEmailsHandler.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\Emails\Handler;


use App\Services\Emails\Repositories\EmailRepository;

class SendPendingEmailsHandler
{

    private EmailRepository $emailRepository;
    private SendEmailHandler $sendEmailHandler;

    public function __construct(
        SendEmailHandler $sendEmailHandler,
        EmailRepository $emailRepository
    )
    {
        $this->emailRepository = $emailRepository;
        $this->sendEmailHandler = $sendEmailHandler;
    }

    public function handle(): void
    {
        $emails = $this->emailRepository->getAllPendingEmails();
        foreach ($emails as $email) {
            $this->sendEmailHandler->handle($email);
        }
    }

}
