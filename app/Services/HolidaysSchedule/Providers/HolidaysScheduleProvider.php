<?php
/**
 * Description of HolidaysScheduleProvider.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\HolidaysSchedule\Providers;


interface HolidaysScheduleProvider
{

    public function provide(string $countryCode, string $year);

}
