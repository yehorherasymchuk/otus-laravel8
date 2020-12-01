<?php

namespace Tests\Feature\Http\Controllers\Api\Countries;

use App\Models\Country;
use App\Services\Routes\Providers\Api\ApiRoutes;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Generators\CountriesGenerator;
use Tests\TestCase;

class ApiCountriesControllerIndexTest extends TestCase
{
    /**
     * @group http
     * @group api
     * @group countries
     */
    public function testReturns200()
    {
        $response = $this->get(
            route(ApiRoutes::API_COUNTRIES_INDEX),
        );

        $response->assertStatus(200);
    }

    /**
     * @group http
     * @group api
     * @group countries
     */
    public function testReturnCountries()
    {
        CountriesGenerator::generateRussia();
        $response = $this->get(
            route(ApiRoutes::API_COUNTRIES_INDEX),
        );
        $response->assertJsonCount(1);
    }

    /**
     * @group http
     * @group api
     * @group countries
     */
    public function testReturnCountriesData()
    {
        $country = CountriesGenerator::generateRussia();
        $response = $this->get(
            route(ApiRoutes::API_COUNTRIES_INDEX),
        );
        $response->assertJson([
            'id' => $country->id,
            'name' => $country->name,
            'continent_name' => $country->continent_name,
            'created_at' => $country->created_at->toAtomString(),
            'updated_at' => $country->updated_at->toAtomString(),
        ]);
    }
}
