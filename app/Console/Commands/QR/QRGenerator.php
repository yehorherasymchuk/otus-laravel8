<?php

namespace App\Console\Commands\QR;


use App\Services\QR\QRLinkGenerator;
use Illuminate\Console\Command;

class QRGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:qr
                           {--l|--link= : Target link to generate QR (e.g. https://otus.ru)}
                           {--o|--output=qr.png : Output filename with what QR will be generated (e.g. qr-country-1.png)}
                           {--s|--size=300 : QR required size, defined in pixels}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates new QR code';

    private function getQRLinkGenerator(): QRLinkGenerator
    {
        return app(QRLinkGenerator::class);
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (!$this->isValidInput()) {
            return 1;
        }
        $qrLink = $this->option('link');
        $qrOutputFilename = $this->option('output');
        $qrSize = $this->option('size');
        $this->getQRLinkGenerator()->generate($qrLink, $qrOutputFilename, $qrSize);

    }

    /**
     * @return bool
     */
    private function isValidInput(): bool
    {
        $isValid = true;
        if (!$this->option('link')) {
            $this->error('Link option is required');
            $isValid = false;
        }
        if (!$this->option('output')) {
            $this->error('Output option is required');
            $isValid = false;
        }
        if (!$this->option('size')) {
            $this->error('Size option is required');
            $isValid = false;
        }
        return $isValid;
    }
}
