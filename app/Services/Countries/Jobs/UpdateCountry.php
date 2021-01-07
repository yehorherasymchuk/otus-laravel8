<?php

namespace App\Services\Countries\Jobs;

use App\Models\Country;
use App\Services\Countries\Handlers\CreateCountryHandler;
use App\Services\Countries\Handlers\UpdateCountryHandler;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateCountry implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private array $data;
    private Country $country;

    public function __construct(
        Country $country,
        array $data
    )
    {
        $this->data = $data;
        $this->country = $country;
    }

    private function getUpdateCountryHandler(): UpdateCountryHandler
    {
        return app(UpdateCountryHandler::class);
    }

    public function handle(): void
    {
        $this->getUpdateCountryHandler()->handle($this->country, $this->data);
    }

    public function failed(\Exception $exception)
    {

    }
}
