<?php
/**
 * Description of ViewBladeServiceProvider.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Providers;


use Blade;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class ViewBladeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->bootDirectiveDate();
        $this->bootDirectiveMoney();
    }

    /**
     * @param null $format
     *
     * @date($date, 'd.m.Y')
     */
    private function bootDirectiveDate($format = null)
    {
        Blade::directive('date', function ($expression) use ($format) {
            if (! $expression instanceof Carbon) {
                throw new \LogicException('Date must be Carbon object!');
            }
            $format = $format ?: 'd.m.Y';
            return "<?php echo ($expression)->format('$format'); ?>";
        });
    }

    /**
     * @money($value)
     */
    private function bootDirectiveMoney()
    {
        Blade::directive('money', function ($expression) {
            $currency = config('app.currency', '$');
            return "<?php echo ('$currency ' . $expression); ?>";
        });
    }
}
