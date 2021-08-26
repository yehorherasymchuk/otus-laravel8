<?php
/**
 * Description of CreateCountryHandler.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\Continents\Handlers;


use App\Models\Continent;
use App\Services\Continents\Exceptions\ValidationException;
use App\Services\Continents\Repositories\ContinentsRepository;

class CreateContinentHandler
{

    private ContinentsRepository $continentsRepository;

    public function __construct(
        ContinentsRepository $continentsRepository
    )
    {
        $this->continentsRepository = $continentsRepository;
    }

    public function handle(array $data): Continent
    {
        $this->validateData($data);
        return $this->continentsRepository->create($data);
    }

    private function validateData(array $data): void
    {
        if (empty($data['name'])) {
            throw new ValidationException("Name is required");
        }
    }

}
