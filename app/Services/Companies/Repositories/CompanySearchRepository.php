<?php
/**
 * Description of CountrySearchRepository.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\Companies\Repositories;


use Illuminate\Database\Eloquent\Collection;

interface CompanySearchRepository
{

    public function search(string $query, int $limit, int $offset): Collection;

}
