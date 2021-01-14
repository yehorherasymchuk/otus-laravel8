<?php
/**
 * Description of CountriesService.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Egor Gerasimchuk <egor@mister.am>
 */

namespace App\Services\Countries;


use App\Jobs\Queue;
use App\Models\Country;
use App\Services\Countries\Handlers\CreateCountryHandler;
use App\Services\Countries\Jobs\StoreCountry;
use App\Services\Countries\Jobs\UpdateCountry;
use App\Services\Countries\Repositories\CountryRepositoryInterface;
use App\Services\Countries\Repositories\CountrySearchRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class CountriesService
{

    private CountryRepositoryInterface $countryRepository;
    private CreateCountryHandler $createCountryHandler;
    private CountrySearchRepository $countrySearchRepository;

    public function __construct(
        CreateCountryHandler $createCountryHandler,
        CountryRepositoryInterface $countryRepository,
        CountrySearchRepository $countrySearchRepository
    )
    {
        $this->createCountryHandler = $createCountryHandler;
        $this->countryRepository = $countryRepository;
        $this->countrySearchRepository = $countrySearchRepository;
    }

    /**
     * @param int $id
     * @return Country|null
     */
    public function findCountry(int $id)
    {
        return $this->countryRepository->find($id);
    }

    public function searchCountries(string $query = ''): \Illuminate\Support\Collection
    {
        return $this->countrySearchRepository->search($query);
    }

    public function getCountries(): Collection
    {
        return $this->countryRepository->getList();
    }

    public function storeCountry(array $data): void
    {
        StoreCountry::dispatch($data)
            ->onQueue(Queue::HIGH);
    }

    public function updateCountry(Country $country, array $data): void
    {
        UpdateCountry::dispatch($country, $data)
            ->onQueue(Queue::HIGH);
    }

}
