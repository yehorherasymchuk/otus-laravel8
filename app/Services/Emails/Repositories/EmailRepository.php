<?php
/**
 * Description of EmailRepository.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\Emails\Repositories;


use App\Models\Email;
use Illuminate\Support\Collection;

interface EmailRepository
{

    public function getAllPendingEmails(): Collection;

    public function markAsSent(Email $email): void;

}
