<?php
/**
 * Description of CountryRepository.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\Continents\Repositories;


use App\Models\Continent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class ContinentsRepository
{

    public function getByWithCountries(array $filters, int $limit, int $offset = 0): Collection
    {
        $collection = $this->getBy($filters, $limit, $offset);
        $collection->load('countries');
        return $collection;
    }

    public function getBy(array $filters, int $limit, int $offset = 0): Collection
    {
        $qb = Continent::query();
        $this->applyFilters($qb, $filters);

        $qb->take($limit);
        $qb->skip($offset);

        return $qb->get();
    }

    public function create(array $data): Continent
    {
        return Continent::create($data);
    }

    public function update(Continent $continent, array $data): Continent
    {
        $continent->update($data);
        return $continent;
    }

    private function applyFilters(Builder $qb, array $filters): void
    {
        if (! empty($filters['name'])) {
            $qb->where('name', 'LIKE', $filters['name']);
        }
    }

}
