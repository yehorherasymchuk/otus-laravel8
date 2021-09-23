<?php

namespace App\Http\Controllers\Cms\Countries;

use App;
use App\Http\Controllers\Cms\Countries\Requests\StoreCountryRequest;
use App\Http\Controllers\Cms\Countries\Requests\UpdateCountryRequest;
use App\Policies\Permission;
use App\Services\Countries\Jobs\CreateCountryJob;
use App\Services\Routes\Providers\CMS\CMSRoutes;
use View;
use App\Models\Country;
use App\Services\Countries\CountriesService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CmsCountriesController extends Controller
{

    private function getCountriesService(): CountriesService
    {
        return app(CountriesService::class);
    }


    public function index(Request $request)
    {
//        $this->authorize(Permission::VIEW_ANY, Country::class);

        info('test CmsCountriesController');
        View::share([
            'countries' => Country::paginate(20),
        ]);

        return view('countries.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $this->authorize(Permission::CREATE, Country::class);
        return view('countries.create');
    }

    /**
     * @param StoreCountryRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreCountryRequest $request)
    {
        $data = $request->getFormData();

        $this->getCountriesService()->storeCountry($data);

        return redirect(
            route(CMSRoutes::CMS_COUNTRIES_INDEX, [
                'locale' => App::getLocale(),
            ]),
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return view('countries.edit', [
            'country' => $country,
        ]);
    }

    /**
     * @param UpdateCountryRequest $request
     * @param Country $country
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(UpdateCountryRequest $request, Country $country, ?int $city = null)
    {
        $this->authorize(Abilities::UPDATE, $country);

        $this->getCountriesService()->updateCountry($country, $request->all());
        $country->update($request->all());

        return redirect(route('cms.countries.index'));
    }

    /**
     * @param Country $country
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Country $country)
    {
//        $this->authorize(Abilities::VIEW, $country);

        return view('countries.show', [
            'country' => $country,
            'cities' => $country->cities()->paginate(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        //
    }
}
