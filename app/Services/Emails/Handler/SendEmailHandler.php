<?php
/**
 * Description of SendEmailHandler.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\Emails\Handler;


use App\Models\Email;
use App\Services\Emails\Client\EmailClient;
use App\Services\Emails\Repositories\EmailRepository;

class SendEmailHandler
{
    private EmailRepository $emailRepository;
    private EmailClient $emailClient;

    public function __construct(
        EmailClient $emailClient,
        EmailRepository $emailRepository
    )
    {
        $this->emailRepository = $emailRepository;
        $this->emailClient = $emailClient;
    }

    public function handle(Email $email): void
    {
        $this->emailClient->send($email->to, $email->subject, $email->body);
        $this->emailRepository->markAsSent($email);

    }
}
