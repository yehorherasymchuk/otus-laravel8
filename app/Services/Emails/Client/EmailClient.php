<?php
/**
 * Description of EmailClient.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\Emails\Client;


interface EmailClient
{

    public function send(string $to, string $subject, string $body): void;

}
