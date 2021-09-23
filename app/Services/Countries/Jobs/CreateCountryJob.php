<?php

namespace App\Services\Countries\Jobs;

use App\Services\Countries\Handlers\CreateCountryHandler;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateCountryJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private array $data;

    public function __construct(
        array $data
    )
    {
        $this->data = $data;
    }

    private function getCreateCountryHandler(): CreateCountryHandler
    {
        return app(CreateCountryHandler::class);
    }

    public function handle(): void
    {
        $this->getCreateCountryHandler()->handle($this->data);
    }
}
