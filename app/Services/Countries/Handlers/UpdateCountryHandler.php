<?php
/**
 * Description of CreateCountryHandler.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Egor Gerasimchuk <egor@mister.am>
 */

namespace App\Services\Countries\Handlers;


use App\Models\Country;
use App\Services\Countries\Repositories\CountryRepositoryInterface;
use Carbon\Carbon;

class UpdateCountryHandler
{

    private CountryRepositoryInterface $countryRepository;

    public function __construct(
        CountryRepositoryInterface $countryRepository
    )
    {
        $this->countryRepository = $countryRepository;
    }


    public function handle(Country $country, array $data): void
    {
        sleep(10);
        $this->countryRepository->updateFromArray($country, $data);
    }

}
