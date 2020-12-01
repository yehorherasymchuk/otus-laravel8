<?php
/**
 * Description of CmsCountriesControllerIndexTest.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Egor Gerasimchuk <egor@mister.am>
 */

namespace Tests\Feature\Http\Controllers\CMS\Countries;


use App\Models\User;
use App\Services\Countries\Repositories\EloquentCountryRepository;
use App\Services\Routes\Providers\CMS\CMSRoutes;
use Tests\Generators\CountriesGenerator;
use Tests\Generators\UsersGenerator;
use Tests\TestCase;

class CmsCountriesControllerUpdateTest extends TestCase
{

    private function getEloquentCountryRepository(): EloquentCountryRepository
    {
        return app(EloquentCountryRepository::class);
    }

    /**
     * @group cms
     * @group update
     */
    public function testRedirectsNotAuthenticatedUsers()
    {
        $country = CountriesGenerator::generateRussia();
        $response = $this->patch(
            route(CMSRoutes::CMS_COUNTRIES_UPDATE, [
                'country' => $country->id,
            ]),
        );

        $response->assertStatus(302)
            ->assertRedirect('login');
    }

    /**
     * @group cms
     * @group update
     */
    public function testUpdateContinentName()
    {
        $user = UsersGenerator::generateAdmin();
        $country = CountriesGenerator::generateRussia();
        $data = [
            'name' => 'Russia',
            'continent_name' => 'Europe 2 ',
        ];
        $this->actingAs($user)->patch(
            route(CMSRoutes::CMS_COUNTRIES_UPDATE, [
                'country' => $country->id,
            ]),
            $data,
        );
        $updatedCountry = $this->getEloquentCountryRepository()->find($country->id);
        $this->assertEquals($country->continent_name, $updatedCountry->continent_name);
    }

    /**
     * @group cms
     * @group update
     */
    public function testUpdateName()
    {
        $user = UsersGenerator::generateAdmin();
        $country = CountriesGenerator::generateRussia();
        $data = [
            'name' => 'Russia3',
            'continent_name' => 'Europe',
        ];
        $this->actingAs($user)->patch(
            route(CMSRoutes::CMS_COUNTRIES_UPDATE, [
                'country' => $country->id,
            ]),
            $data,
        );
        $updatedCountry = $this->getEloquentCountryRepository()->find($country->id);
        $this->assertEquals($country->name, $updatedCountry->name);
    }

    /**
     * @group cms
     * @group update
     */
    public function testUpdateReturnsErrorIfNoName()
    {
        $user = UsersGenerator::generateAdmin();
        $country = CountriesGenerator::generateRussia();
        $data = [
            'continent_name' => 'Europe',
        ];
        $this->actingAs($user)->patch(
            route(CMSRoutes::CMS_COUNTRIES_UPDATE, [
                'country' => $country->id,
            ]),
            $data,
        )->assertStatus(302)->assertSessionHasErrors([
            'name',
        ]);
    }


}
