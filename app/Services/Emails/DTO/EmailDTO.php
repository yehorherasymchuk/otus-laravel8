<?php
/**
 * Description of EmailDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\Emails\DTO;


class EmailDTO
{

    public function __construct(
        private string $to,
        private string $from,
        private string $subject,
    )
    {

    }

}
