<?php
/**
 * Description of CountriesService.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Egor Gerasimchuk <egor@mister.am>
 */

namespace App\Services\Companies;


use App\Models\Company;
use App\Services\Companies\DTO\CreateCompanyDTO;
use App\Services\Companies\Handlers\CreateCompanyHandler;
use App\Services\Companies\Jobs\CreateCompanyJob;
use App\Services\Companies\Repositories\CompanySearchRepository;
use App\Services\Companies\Translators\CitiesListDataTranslator;
use App\Services\Companies\Translators\CompanyStatusesTranslator;
use Illuminate\Support\Collection;

class CompaniesService
{

    private CreateCompanyHandler $createCompanyHandler;
    private CompanyStatusesTranslator $companyStatusesTranslator;
    private CitiesListDataTranslator $citiesListDataTranslator;
    private CompanySearchRepository $companySearchRepository;

    public function __construct(
        CreateCompanyHandler $createCompanyHandler,
        CitiesListDataTranslator $citiesListDataTranslator,
        CompanyStatusesTranslator $companyStatusesTranslator,
        CompanySearchRepository $companySearchRepository
    )
    {
        $this->createCompanyHandler = $createCompanyHandler;
        $this->companyStatusesTranslator = $companyStatusesTranslator;
        $this->citiesListDataTranslator = $citiesListDataTranslator;
        $this->companySearchRepository = $companySearchRepository;
    }

    public function searchCompanies(string $query, int $limit, int $offset): Collection
    {
        $companies = $this->companySearchRepository->search($query, $limit, $offset);
        $companies->load(['city.country.cities']);
        return $companies;
    }

    public function createCompany(CreateCompanyDTO $createCompanyDTO)
    {
        CreateCompanyJob::dispatch($createCompanyDTO->toArray());
    }

    public function translateStatuses(string $lang): array
    {
        return $this->companyStatusesTranslator->translate($lang);
    }

    public function translateCompaniesList(): array
    {
        return $this->citiesListDataTranslator->translate();
    }

}
