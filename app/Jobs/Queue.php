<?php
/**
 * Description of Job.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Jobs;


abstract class Queue
{

    const DEFAULT = 'default';
    const LOW = 'low';
    const HIGH = 'high';

}
