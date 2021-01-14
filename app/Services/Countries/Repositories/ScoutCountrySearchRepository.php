<?php
/**
 * Description of ScoutCountrySearchRepository.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\Countries\Repositories;


use App\Models\Country;
use Illuminate\Support\Collection;

class ScoutCountrySearchRepository implements CountrySearchRepository
{
    public function search(string $query): Collection
    {
        return Country::search($query . '*')->get();
    }


}
