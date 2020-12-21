<?php

namespace App\Console\Commands\Emails;

use App\Services\Emails\EmailsService;
use Illuminate\Console\Command;

class SendPendingEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send all emails that are marked as Pending to Send';

    private function getEmailsService(): EmailsService
    {
        return app(EmailsService::class);
    }

    public function handle()
    {
        $this->getEmailsService()->sendAllPendingEmails();
        echo 'All emails have been sent.', PHP_EOL;
    }
}
