<?php

namespace App\Http\Controllers\Cms\Companies;

use App;
use App\Http\Controllers\Cms\CmsBaseController;
use App\Http\Controllers\Cms\Companies\Requests\CmsCompaniesStoreRequest;
use App\Models\Company;
use App\Models\Country;
use App\Services\Companies\CompaniesService;
use App\Services\Routes\Providers\CMS\CMSRoutes;
use Illuminate\Http\Request;
use View;

class CmsCompaniesController extends CmsBaseController
{

    private CompaniesService $companiesService;

    public function __construct(
        CompaniesService $companiesService
    )
    {
        $this->companiesService = $companiesService;
    }

    public function index(Request $request)
    {
        View::share([
            'companies' => $this->companiesService->searchCompanies(
                $request->get('q') ?? '',
                50,
                0
            ),
        ]);

        return view('cms.companies.index');
    }

    public function create()
    {
        $citiesData = $this->getCitiesData();
        $statuses = $this->getStatuses();

        View::share([
            'citiesData' => $citiesData,
            'statuses' => $statuses,
        ]);
        return view('cms.companies.create');
    }

    public function store(CmsCompaniesStoreRequest $request)
    {
        $this->companiesService->createCompany($request->generateCreateCompanyDTO());

        return redirect()->route(CMSRoutes::CMS_COMPANIES_INDEX);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $this->getDataFromCompany($company);
    }

    private function getDataFromCompany(Company $company)
    {
        return [
            'id' => $company->id,
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }

    /**
     * @todo move to repository
     * @return array
     */
    private function getCitiesData(): array
    {
        return $this->companiesService->translateCompaniesList();
    }

    /**
     * @move to translators
     * @return array
     */
    private function getStatuses(): array
    {
        return $this->companiesService->translateStatuses(App::getLocale());
    }
}
