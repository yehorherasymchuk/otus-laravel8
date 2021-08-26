<?php
/**
 * Description of ContinentsService.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\Continents;


use App\Models\Continent;
use App\Services\Continents\Handlers\CreateContinentHandler;
use App\Services\Continents\Handlers\UpdateContinentHandler;
use App\Services\Continents\Repositories\ContinentsRepository;
use Illuminate\Support\Collection;

class ContinentsService
{

    private CreateContinentHandler $createContinentHandler;
    private UpdateContinentHandler $updateContinentHandler;
    private ContinentsRepository $continentsRepository;

    public function __construct(
        CreateContinentHandler $createContinentHandler,
        UpdateContinentHandler $updateContinentHandler,
        ContinentsRepository $continentsRepository
    ) {
        $this->createContinentHandler = $createContinentHandler;
        $this->updateContinentHandler = $updateContinentHandler;
        $this->continentsRepository = $continentsRepository;
    }

    public function getContinents(int $limit, int $offset = 0): Collection
    {
        return $this->continentsRepository->getBy([], $limit, $offset);
    }

    public function createContinent(array $data): Continent
    {
        return $this->createContinentHandler->handle($data);
    }

    public function update(Continent $continent, array $data): Continent
    {
        return $this->updateContinentHandler->handle($continent, $data);
    }

}
