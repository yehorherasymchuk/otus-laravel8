<?php
/**
 * Description of FilteredCompaniesResolver.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\Companies\Resolvers;


use App\Models\Company;
use App\Services\Companies\DTO\CompaniesFiltersDTO;
use App\Services\Companies\Repositories\EloquentCompanyRepository;
use Illuminate\Support\Collection;

class FilteredCompaniesResolver
{

    const LIMIT = 20;

    private EloquentCompanyRepository $eloquentCompanyRepository;

    public function __construct(
        EloquentCompanyRepository $eloquentCompanyRepository
    )
    {
        $this->eloquentCompanyRepository = $eloquentCompanyRepository;
    }

    public function resolve(CompaniesFiltersDTO $filtersDTO): Collection
    {
        $companies = $this->eloquentCompanyRepository->getByFilters($filtersDTO, self::LIMIT);
        if ($filtersDTO->isOnlyWithProducts()) {
            $companies->load(['products']);
            $companies->filter(fn(Company $company) => $company->hasProduct());
        }
        return $companies;
    }

}
