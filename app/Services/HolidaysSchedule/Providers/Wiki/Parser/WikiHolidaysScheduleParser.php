<?php
/**
 * Description of WikiHolidaysScheduleProvider.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\HolidaysSchedule\Providers\Wiki;


use App\Services\HolidaysSchedule\Providers\HolidaysScheduleProvider;

interface WikiHolidaysScheduleParser
{

    public function parse(string $content): array;

}
