<?php
/**
 * Description of TranslateCitiesListData.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Egor Gerasimchuk <egor@mister.am>
 */

namespace App\Services\Companies\Translators;


use App\Models\City;
use App\Models\Country;
use App\Services\Countries\CountriesService;

class CitiesListDataTranslator
{

    private CountriesService $countriesService;

    public function __construct(
        CountriesService $countriesService
    )
    {
        $this->countriesService = $countriesService;
    }

    public function translate()
    {
        $data = [];
        $countries = $this->countriesService->searchCountries();
        $countries->loadMissing('cities');
        foreach ($countries as $country) {
            foreach ($country->cities as $city) {
                $data[$city->id] = $this->formatTitle($country, $city);
            }
        }
        return $data;
    }

    private function formatTitle(Country $country, City $city)
    {
        return $country->name . ' - ' . $city->name;
    }

}
