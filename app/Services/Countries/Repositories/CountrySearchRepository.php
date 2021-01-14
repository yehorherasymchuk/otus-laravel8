<?php
/**
 * Description of CountrySearchRepository.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\Countries\Repositories;


use Illuminate\Support\Collection;

interface CountrySearchRepository
{

    public function search(string $query): Collection;

}
