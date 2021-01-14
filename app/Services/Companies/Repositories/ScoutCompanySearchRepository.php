<?php
/**
 * Description of ScoutCountrySearchRepository.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\Companies\Repositories;


use App\Models\Company;
use Illuminate\Database\Eloquent\Collection;

class ScoutCompanySearchRepository implements CompanySearchRepository
{
    public function search(string $query, int $limit, int $offset): Collection
    {
        return Company::search($query . '*')
            ->take($limit)
            ->get();
    }


}
